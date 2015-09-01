<?php

class EvaluacionController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
   {
      return array(array('CrugeAccessControlFilter'));
   }
	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','curso_lista','evalua_manual','subir_eva'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','curso_lista','evalua_manual','subir_eva'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','curso_lista','evalua_manual','subir_eva'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Evaluacion;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Evaluacion']))
		{
			$model->attributes=$_POST['Evaluacion'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->eva_id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Evaluacion']))
		{
			$model->attributes=$_POST['Evaluacion'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->eva_id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	  Lists all models.
	 */
	public function actionIndex()
	{
		$cursos = $this->actionCursoAnoActual();

		if(Yii::app()->user->checkAccess('administrador') OR Yii::app()->user->isSuperAdmin){
			$this->render('evaluar_curso',array(
	    			'cur' => $cursos,
				));

		} else if (Yii::app()->user->checkAccess('jefe_utp') OR Yii::app()->user->checkAccess('evaluador') OR
    				Yii::app()->user->checkAccess('director') ){

    		$usuario = Usuario::model()->findByAttributes(array( 'usu_iduser' => Yii::app()->user->id ));
    		$cursos = $this->actionCursoAnoActual();

			$this->render('evaluar_curso',array(
					'nombre' => $usuario['Nombrecorto'],
	    			'cur' => $cursos,
				));

		} else if( Yii::app()->user->checkAccess('profesor') ){
			$ano = $this->actionAnoActual();
			$profe = Usuario::model()->findByAttributes(array( 'usu_iduser' => Yii::app()->user->id ));
    		$id_profe = $profe['usu_id'];
    		$cursos = $this->actionCursoAnoActual();

    		$es_profe_jefe = Curso::model()->findAll(array('condition' => 'cur_ano=:x AND cur_pjefe=:y',
    														'params'=> array(':x' => $ano, ':y' => Yii::app()->user->id )));

    		$id_cur = array(); //  se arma un array con  los cursos que tiene el profe

    		 if( $es_profe_jefe ){
    			// se agregan cursos si  es q es profe jefe
    			foreach ( $es_profe_jefe as $c ){
	                $id_cur[] = $c->cur_id;
	            }
    		} else {
    			throw new CHttpException(404,'Usted no tiene Cursos.');
    			return;
    		}

    			$nivel = CHtml::listData(Parametro::model()->findAll(array('condition'=>'par_item="nivel"')),'par_id','par_descripcion');
				$letra = CHtml::listData(Parametro::model()->findAll(array('condition'=>'par_item="letra"')),'par_id','par_descripcion');

				$criteria = new CDbCriteria();
	            $criteria->addInCondition('cur_id', $id_cur, 'OR');
	            $cur = Curso::model()->findAll($criteria);
	 			// se filtran los cursos por el año  seleccionado
	 			$cursos = array();
	 			for ($i=0; $i < count($cur); $i++) { 
	 				if($cur[$i]->cur_ano == $ano ){
						$cursos[$cur[$i]->cur_id] = "".$nivel[$cur[$i]->cur_nivel]." ".$letra[$cur[$i]->cur_letra];
					}
				}


			$this->render('evaluar_curso',array(
					'nombre' => $profe['Nombrecorto'],
	    			'cur' => $cursos,
	    			'usu' => $id_profe,
				));


		} else {
				throw new CHttpException(404,'Usted no tiene permisos');
    			return;
		}
		
    	
	}

	public function actionCursoAnoActual(){
    	/*
		La funcion devuelve un array con la ID y el nombre completo de los cursos
		ejemplo: array('id_curso'=>'PRIMERO A')
    	*/
		$ano = $this->actionAnoactual();
    	//$ano = implode(CHtml::listData(Parametro::model()->findAll(array('select'=>'par_descripcion','condition'=>'par_item="ano_activo"')),'par_id','par_descripcion'));
		$curso = Curso::model()->findAll(array('condition'=>'cur_ano="'.$ano.'"'));
		$nivel = CHtml::listData(Parametro::model()->findAll(array('condition'=>'par_item="nivel"')),'par_id','par_descripcion');
		$letra = CHtml::listData(Parametro::model()->findAll(array('condition'=>'par_item="letra"')),'par_id','par_descripcion');

		foreach ($curso as $key => $c) {
            $cur[] = array(
                   'cur_nivel' => $nivel[$c->cur_nivel],
                    'cur_id' => $c->cur_id,
                    'cur_letra' => $letra[$c->cur_letra],
                );
        }

        if( !empty($cur) ){
            sort($cur);
        } else{
            throw new CHttpException(666,'$cur es null.  (evaluacion/cursoAñoActual) : L338');
            return;
        }


        $cursos_actuales = array();
        foreach ($cur as $key => $c) {
            $cursos_actuales[$c['cur_id']] = $c['cur_nivel']." ".$c['cur_letra'];
        }

        return $cursos_actuales;
    }

    public function actionAnoactual(){
        $par = Parametro::model()->findByAttributes(array('par_item'=>'ano_activo'));
        $temp = Temp::model()->findByAttributes(array('temp_iduser'=>Yii::app()->user->id));
                
                // La variable es array por que criteria lo pide.
        if ( $temp->temp_ano != 0 ){
            $ano = $temp->temp_ano;
        } else {
            $ano = $par->par_descripcion;
        }

        return $ano;
    }

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Evaluacion('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Evaluacion']))
			$model->attributes=$_GET['Evaluacion'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Evaluacion the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Evaluacion::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Evaluacion $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='evaluacion-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	/**
	LISTA DEL CURSO CON EL INFORME DE PERSONALIDAD Y SUS EVALUACIONES ASOCIADAS; 

	*/

	public function actionCurso_lista(){

		if( isset($_POST['id']) ){
			$id_curso = $_POST['id'];

			$lista_curso = ListaCurso::model()->findAll(array('order'=>'list_posicion', 
														'condition' => 'list_curso_id=:x', 'params' => array(':x' => $id_curso )));
			
			$curso = Curso::model()->findByPk($id_curso);
			$informe = InformeDesarrollo::model()->findByPk($curso->cur_infd);
			$areas = Area::model()->findAll(array('condition' => 'are_infd=:x', 'params' => array(':x' => $curso->cur_infd)));

			$alumnos = array();
			$lista = array();
			$inf = array();
			$are = array();
			
			foreach ($areas as $key => $a) {
				$con = array();
				$conceptos = Concepto::model()->findAll(array('condition' => 'con_area=:x', 'params' => array(':x' => $a->are_id)));

				foreach ($conceptos as $key => $c) {
					$con[] = array(
						'con_id' 	=> $c->con_id,
						'texto' 	=> $c->con_descripcion
					);
				}

				$are[] = array(
						'are_id' 	=> $a->are_id,
						'texto' 	=> $a->are_descripcion,
						'are_con' 	=> $con,
					);
			}
			
			$inf[] = array(
					'titulo' 	=> $informe->id_descripcion,
					'areas' 	=> $are,
				);
			
			foreach ($lista_curso as $key => $alumno) {
				$notas = array();
				$evalu = Evaluacion::model()->findAll(array('condition' => 'eva_matricula=:x', 'params' => array(':x' => $alumno->list_mat_id )));

				foreach ($evalu as $key => $e) {
					$notas[] = array(
							'eva_nota' 	=> $e->eva_nota,
							'eva_id' 	=> $e->eva_id,
							'id_con'	=> $e->eva_concepto,   
						);
				}

				$mat  = Matricula::model()->findByPk($alumno->list_mat_id); 
	        	$alum = Alumno::model()->findByPk($mat->mat_alu_id);

				$alumnos[] = array(
					'nombre' 	=> $alum->getNombre_completo_2(),
					'mat_id' 	=> $alumno->list_mat_id,
					'notas_alu'		=> $notas,
				);
			}
				
			$lista[] = array(
					'informe' => $inf,
					'alumnos' => $alumnos,
				);		
			//echo json_encode($lista);
			

			$escala = CHtml::listData(Parametro::model()->findAll(array('condition'=>'par_item="EVA_ESCALA"')),'par_id','par_descripcion');
			
			$this->renderPartial('evaluar_conceptos',array(
				'lista'		=> $lista,
				'escala' 	=> $escala,
				'cur'		=> $id_curso,
			));
		}

	}


	// agrega manual mente a los alumnos a evaluacion de informe, id = id_curso
	public function actionEvalua_manual($id){

		$lista_curso = Listacurso::model()->findAll(array('order'=>'list_posicion', 
													'condition' => 'list_curso_id=:x', 'params' => array(':x' => $id )));
			
		$curso = Curso::model()->findByPk($id);
		$id_inf = $curso->cur_infd;

		foreach ($lista_curso as $key => $alumno) {
			$tiene_eva = Evaluacion::model()->findAll(array('condition' => 'eva_matricula=:x',
																	'params' => array( ':x' => $alumno->list_mat_id )));		
			if( empty($tiene_eva)){
		        $criteria = new CDbCriteria();
		        $criteria->join = 'LEFT JOIN area ON area.are_id = t.con_area';
		        $criteria->condition = 'area.are_infd=:value';
		        $criteria->params = array(":value"=>$id_inf);
		        $con = Concepto::model()->findAll($criteria);
		        foreach ($con as $n) {
		            $evaluacion = new Evaluacion;
		            $evaluacion->eva_concepto = $n->con_id;
		            $evaluacion->eva_matricula = $alumno->list_mat_id;
		            $evaluacion->eva_ano = $curso->cur_ano;
		            $evaluacion->save();
		        }

		        echo $alumno->list_mat_id . " agregado <br>";
			}else{
				echo $alumno->list_mat_id . " ya esta <br>";
			}
        }

	}

	public function actionValidar_edicion(){
		if(isset($_POST['pass']) ){
			$p = $_POST['pass'];
			$curso = $_POST['cur'];

			//  se obtienen todos los datos del usuario  de yii
		 	$usuario = Yii::app()->user->um->loadUserById(Yii::app()->user->id, true);

		 	// se ve si  es admin o director para editar
		 	if (Yii::app()->user->checkAccess('director') OR Yii::app()->user->checkAccess('administrador') OR Yii::app()->user->isSuperAdmin ){
			 	if($usuario->password == $p){
			 		 echo json_encode(1);
			 		 return;
			 	} else {
			 		echo json_encode(0);
			 		return;
			 	}
			}


			if( Yii::app()->user->checkAccess('profesor')  ){
				$curso = Curso::model()->findByPk($curso);
			 		if( $curso->cur_pjefe == Yii::app()->user->id ){
			 			
			 			if( $usuario->password == $p){
					 		echo json_encode(1);
					 		return;
				 		}else{
				 			echo json_encode(0);
				 			return;
				 		}
			 		}
			}
		echo json_encode(2);
		return;	
		}
		
	}

	public function actionSubir_eva(){
		if(isset($_POST['notas'])){
			$notas = $_POST['notas'];
			foreach ($notas as $key => $n) {
				$model = Evaluacion::model()->findByPk($n['eva_id']);
				$model->eva_nota = $n['nota'];
				$model->save();
			}
		}	
	}

    public function obtenerCurso($data,$row){
        $curso = ListaCurso::model()->findAll(array('condition'=>'list_mat_id="'.$data->mat_id.'"'));
        if($curso != NULL){
            $nombre = Curso::model()->findByAttributes(array('cur_id'=>$curso[0]->list_curso_id));
            return $nombre->getCurso();
        }else return "SIN CURSO";
    }


	public function actionLista_alumnos_eva(){
		$estado = Parametro::model()->findAll(array('condition'=>'par_descripcion="ACTIVO"'));
        $lista = CHtml::listData(ListaCurso::model()->findAll(),'list_mat_id','list_curso_id');
        $ano = $this->actionAnoactual();
        $model = new Matricula('search');
        $model->unsetAttributes();  // clear any default values

     	$cole = Colegio::model()->find();
        $per = Parametro::model()->findByPk($cole->col_periodo);
        
        if (isset($_GET['Matricula'])) $model->attributes = $_GET['Matricula'];
        $this->render('informe_per_lista', array(
            'model' => $model,
            'lista' => $lista,
            'estado' => $estado,
            'p'	=> $per->par_descripcion,
            'ano' => $ano,
        ));
	}


	// id = matricula , p = periodo
	public function actionCertificado_perso_alu($id,$p){

		$matricula = Matricula::model()->findByPk($id);

        $mPDF1 = Yii::app()->ePdf->mpdf();
        $mPDF1 = Yii::app()->ePdf->mpdf('', 'A4');

        $mPDF1->SetFooter('San Pedro de la Paz '.date('d-m-Y'));
        $mPDF1->WriteHTML($stylesheet, 2);


        $cur_list = ListaCurso::model()->findByAttributes(array('list_mat_id' => $id));

        $ano = $this->actionAnoactual();
        $curso  = Curso::model()->findByPk($cur_list->list_curso_id);
        $profe = Usuario::model()->findByAttributes(array('usu_iduser' => $curso->cur_pjefe));

        $nivel = Parametro::model()->findByPk($curso->cur_nivel)->par_descripcion;
        $letra = Parametro::model()->findByPk($curso->cur_letra)->par_descripcion;
        $cole = Colegio::model()->find();
        $nombre_dir = Usuario::model()->findByPk($cole->col_nombre_director);

     
  $inf = array(); 

		
	$area = array();
    	$informe = InformeDesarrollo::model()->findByPk($curso->cur_infd);
		$areas = Area::model()->findAll(array('condition' => 'are_infd=:x', 'params' => array(':x' => $curso->cur_infd)));

		$evalu = Evaluacion::model()->findAll(array('condition' => 'eva_matricula=:x', 'params' => array(':x' => $id )));
		foreach ($areas as $key => $a) {
		  
			$evalu = Evaluacion::model()->findAll(array('condition' => 'eva_matricula=:x', 'params' => array(':x' => $id )));

		  	$notas = array();
			foreach ($evalu as $key => $ev) {
					
				$con = Concepto::model()->findByPk($ev->eva_concepto);
				if( $con->con_area == $a->are_id ){
					$notas[] = array(
							'eva_nota' 		=> $ev->eva_nota,
							'eva_nombre'	=> $con->con_descripcion,
						);
				}
			}

			$area[] = array(
				'are_nombre' 	=> $a->are_descripcion,
				'are_nota'		=> $notas,
			); 
		}

		$inf[] = array(
					'areas' => $area,

				);

        $mPDF1->WriteHTML($this->renderPartial('informe_perso_alu', array( 
        														'model'         => $matricula,
                                                                //'notas'         => $alumnos,
                                                                'curso_nombre'  => $nivel. " ". $letra,
                                                               // 'max_not'       => $notas_periodo,
                                                                'periodo'       => $p,
                                                                'profe'         => $profe->NombreCompleto,
                                                                'ano'           => $ano,
                                                                'nom_director'  => $nombre_dir->nombreCompleto,
                                                                'firma_profe'   => $profe->usu_firma,
                                                                'firma_dir'     => $nombre_dir->usu_firma,
                                                                'cole'          => $cole,
                                                                'inf'			=> $inf,
                                                                'nombre_inf'	=> $informe->id_descripcion,
                                            ), true));
        $mPDF1->Output();
    }
	

}
