<?php

class CursoController extends Controller
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
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
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
				'actions'=>array('index','view','recieveValue','buscar_prof','bcxn','buscar_notas',
									'reload_asi','poner_notas','listar_alumnos','buscar_asistencia','poner_asistencia'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','recieveValue','buscar_prof','bcxn','buscar_notas',
									'reload_asi','poner_notas','listar_alumnos','buscar_asistencia','poner_asistencia'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','recieveValue','buscar_prof','bcxn','buscar_notas',
									'reload_asi','poner_notas','listar_alumnos','buscar_asistencia','poner_asistencia'),
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
            $id_asig = array();
            $id_prof = array();
         	$cur = $this->loadModel($id);

 	    	$asignadas = AAsignatura::model()->findAll(array('condition' => 'aa_curso=:x', 'params' => array(':x' => $id )));

         
            foreach ( $asignadas as $p ){
                $id_asig[] = $p->aa_asignatura;
                $id_prof[] = $p->aa_docente;
                //array_push($id_asig, $p->aa_asignatura);
            }
            
            $criteria = new CDbCriteria();
            $criteria->addInCondition('asi_id', $id_asig, 'OR');
            $asig = CHtml::listData(Asignatura::model()->findAll($criteria),'asi_id','asi_descripcion');

            //$asignaturas=new CActiveDataProvider('Asignatura', array('criteria' => $criteria));//  hay  q borrarlo

            $criteria_doc = new CDbCriteria();
            $criteria_doc->addInCondition('usu_id', $id_prof, 'OR');
            $profesores = CHtml::listData(Usuario::model()->findAll($criteria_doc),'usu_id','Nombrecorto');
	       	

   

        	$niv = Parametro::model()->findByAttributes(array('par_id'=>$cur->cur_nivel));
    		$letra = Parametro::model()->findByAttributes(array('par_id'=>$cur->cur_letra));


		$this->render('view',array(
			'model'=>$cur,
            //'asig' => $asignaturas,
            'asignacion' => $asignadas,
            'asignatura' => $asig,
            'prof' => $profesores,
            'niv' => $niv->par_descripcion,
            'letra' => $letra->par_descripcion,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Curso;
                $par = Parametro::model()->findByAttributes(array('par_item'=>'ano_activo'));
		$temp = Temp::model()->findByAttributes(array('temp_iduser'=>Yii::app()->user->id));
		
                //  Se obtienen los niveles disponibles primero segundo...
                $para = Parametro::Model()->findall(array('condition' => 'par_item=:x', 'params' => array(':x' => 'nivel')));
                $niveles = CHtml::listData($para, 'par_id', 'par_descripcion');
		
                if ( $temp->temp_ano != 0 ){
			$ano = $temp->temp_ano;
		} else {
			$ano = $par->par_descripcion;
		}
                
                // Tipo  de periodo disponible
                $tperiodo = Parametro::Model()->findall(array('condition' => 'par_item=:x', 'params' => array(':x' => 'tperiodo')));
                $tp = CHtml::listData($tperiodo, 'par_id', 'par_descripcion');

                // Se obtienen las jornadas 
                $jor = Parametro::Model()->findall(array('condition' => 'par_item=:x', 'params' => array(':x' => 'jornada')));
                $jornada = CHtml::listData($jor, 'par_id', 'par_descripcion');
                
                //  Se obtienen las letras para los cursos
                $l = Parametro::Model()->findall(array('condition' => 'par_item=:x', 'params' => array(':x' => 'letra')));
                $letra = CHtml::listData($l, 'par_id', 'par_descripcion');
                
                
		if(isset($_POST['Curso']))
		{
			$model->attributes=$_POST['Curso'];
            $model->cur_ano = (int)$ano;

			if($model->save())
				$this->redirect(array('view','id'=>$model->cur_id));
		}

		$this->render('create',array(
			'model'=>$model,
                        'niveles' => $niveles,
                        'ano' => $ano,
                        'tp' => $tp,
                        'jornada' => $jornada,
                        'letra'  => $letra,
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

                             $par = Parametro::model()->findByAttributes(array('par_item'=>'ano_activo'));
		$temp = Temp::model()->findByAttributes(array('temp_iduser'=>Yii::app()->user->id));
		
                //  Se obtienen los niveles disponibles primero segundo...
                $para = Parametro::Model()->findall(array('condition' => 'par_item=:x', 'params' => array(':x' => 'nivel')));
                $niveles = CHtml::listData($para, 'par_id', 'par_descripcion');
		
                if ( $temp->temp_ano != 0 ){
			$ano = $temp->temp_ano;
		} else {
			$ano = $par->par_descripcion;
		}
                
                // Tipo  de periodo disponible
                $tperiodo = Parametro::Model()->findall(array('condition' => 'par_item=:x', 'params' => array(':x' => 'tperiodo')));
                $tp = CHtml::listData($tperiodo, 'par_id', 'par_descripcion');

                // Se obtienen las jornadas 
                $jor = Parametro::Model()->findall(array('condition' => 'par_item=:x', 'params' => array(':x' => 'jornada')));
                $jornada = CHtml::listData($jor, 'par_id', 'par_descripcion');
                
                //  Se obtienen las letras para los cursos
                $l = Parametro::Model()->findall(array('condition' => 'par_item=:x', 'params' => array(':x' => 'letra')));
                $letra = CHtml::listData($l, 'par_id', 'par_descripcion');
                

		if(isset($_POST['Curso']))
		{
			$model->attributes=$_POST['Curso'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->cur_id));
		}

		$this->render('update',array(
                                'model'=>$model,
                                'niveles' => $niveles,
                                'ano' => $ano,
                                'tp' => $tp,
                                'jornada' => $jornada,
                                'letra'  => $letra,
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
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$par = Parametro::model()->findByAttributes(array('par_item'=>'ano_activo'));
		$temp = Temp::model()->findByAttributes(array('temp_iduser'=>Yii::app()->user->id));
                
                // La variable es array por que criteria lo pide.
		if ( $temp->temp_ano != 0 ){
			$ano = array($temp->temp_ano);
		} else {
			$ano = array($par->par_descripcion);
		}
                
                $criteria = new CDbCriteria();
                $criteria->addInCondition('cur_ano', $ano, 'or');
                $dataProvider=new CActiveDataProvider('Curso', array('criteria' => $criteria));
			
                $this->render('index',array('dataProvider'=>$dataProvider,));
                
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Curso('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Curso']))
			$model->attributes=$_GET['Curso'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Curso the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Curso::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Curso $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='curso-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	//Esta funcion actualiza el año actual de los cursos
	public function actionRecieveValue(){
		$tempid = $_POST['tempid'];
		$anio = $_POST['ano'];
		$temp = Temp::model()->findByAttributes(array('temp_id'=>$tempid));
		$temp->temp_ano = $anio;
		$temp->update();
	}
        
                
    public function actionBuscar_prof()
    {
        $criterio = new CDbCriteria;
        $cdtns = array();
        $resultado = array();

        if(empty($_GET['term'])) return $resultado;

        $cdtns[] = "LOWER(usu_nombre1) like LOWER(:busq)";

        $criterio->condition = implode(' OR ', $cdtns);
        $criterio->params = array(':busq' => '%' . $_GET['term'] . '%');
        $criterio->limit = 10;

        $data = Usuario::model()->findAll($criterio);
        
        foreach($data as $item) {  
            $resultado[] = array (
                'id_cruge' => $item->usu_iduser,
                'id' => $item->usu_id,
                'nombre'    => $item->usu_nombre1,
                'apellido' => $item->usu_apepat,
                'nombre2' => $item->usu_nombre2,
                'apellido2' => $item->usu_apemat,
            );
        }

        echo CJSON::encode($resultado);
    }
        
        // BUSCAR CURSOS POR NOMBRE
    public function actionBcxn(){
        if( !isset($_POST['nombre']) ) {
            echo "Ingrese un nombre";
            return;
        }
            $par = Parametro::model()->findByAttributes(array('par_item'=>'ano_activo'));
	$temp = Temp::model()->findByAttributes(array('temp_iduser'=>Yii::app()->user->id));
            
            // La variable es array por que criteria lo pide.
	if ( $temp->temp_ano != 0 ){
		$ano = array($temp->temp_ano);
	} else {
		$ano = array($par->par_descripcion);
	}
                      
        echo "<h4>Cursos de: " . $_POST['nombre']."</h4>";
        echo "<br><br>";
        
        $id_cruge = array($_POST['id']); 
        
            $criteria = new CDbCriteria();
            $criteria->addInCondition('cur_ano', $ano, 'AND');
            $criteria->addInCondition('cur_pjefe', $id_cruge, 'AND' );
            $dataProvider=new CActiveDataProvider('Curso', array('criteria' => $criteria));
		
        $this->renderPartial('index_cursos',array('dataProvider'=>$dataProvider,));   
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

		for ($i=0; $i < count($curso); $i++) { 
			$cursos_actuales[$curso[$i]->cur_id] = "".$nivel[$curso[$i]->cur_nivel]." ".$letra[$curso[$i]->cur_letra];
		}

		return $cursos_actuales;
    }

      // id de cruge para buscar los cursos del profesor
    public function actionBuscar_notas(){

    	if(Yii::app()->user->checkAccess('admin')){
			$cursos = $this->actionCursoAnoActual();

    		$this->render('buscar_notas',array(
	    			'cur' => $cursos,
   			));
    	
    	} else if (Yii::app()->user->checkAccess('jefe_utp') || Yii::app()->user->checkAccess('evaluador') ||
    				Yii::app()->user->checkAccess('director') ){

    		$usuario = Usuario::model()->findByAttributes(array( 'usu_iduser' => Yii::app()->user->id ));
    		$cursos = $this->actionCursoAnoActual();

    		$this->render('buscar_notas',array(
    				'nombre' => $usuario['Nombrecorto'],
	    			'cur' => $cursos,
   			));

    	} else if( Yii::app()->user->checkAccess('profesor') ){
    		$ano = $this->actionAnoActual();
    		$profe = Usuario::model()->findByAttributes(array( 'usu_iduser' => Yii::app()->user->id ));
    		$id_profe = $profe['usu_id'];


 			$tiene_asignaturas = AAsignatura::model()->findAll(array('condition' => 'aa_docente=:y','params' => array(':y' => $id_profe)));
    		
    		$es_profe_jefe = Curso::model()->findAll(array('condition' => 'cur_ano=:x AND cur_pjefe=:y',
    														'params'=> array(':x' => $ano, ':y' => Yii::app()->user->id )));
    		
    		$id_cur = array(); //  se arma un array con  los cursos que tiene el profe
    		
    		if( $tiene_asignaturas ){
    			foreach ( $tiene_asignaturas as $p ){
	                $id_cur[] = $p->aa_curso;
	            }
	        }
	        if( $es_profe_jefe ){
    			// se agregan cursos si  es q es profe jefe
    			foreach ( $es_profe_jefe as $c ){
	                $id_cur[] = $c->cur_id;
	            }
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

				$this->render('buscar_notas',array(
	    			'cur' => $cursos,
	    			'usu' => $id_profe,
	    			'nombre' => $profe['Nombrecorto'],
   				));


    	} 
    		
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

    // se buscan las asignaturas del cursos seleccionado, pero solo las que dicta el profesor que las busca
    public function actionReload_asi(){
    	$id_asig = array();

		if(isset($_POST['dropdown'])){
			$id_curso 	= $_POST['dropdown'];

			//  se ve si  tiene alguno de los roles que pueden  acceder a todas las asignaturas
			if( Yii::app()->user->checkAccess('admin') || Yii::app()->user->checkAccess('jefe_utp') ||
				Yii::app()->user->checkAccess('evaluador') || Yii::app()->user->checkAccess('director')){  

				$asignacion = AAsignatura::model()->findAll(array('condition' => 'aa_curso=:x', 
	 																'params' => array(':x' => $id_curso)));

			}else if( Yii::app()->user->checkAccess('profesor') ){ // se pregunta si  es profesor para cargar solo sus asignaturas
				$docente    = Usuario::model()->findByAttributes(array( 'usu_iduser' => Yii::app()->user->id ));
	
	 			$asignacion = AAsignatura::model()->findAll(array('condition' => 'aa_curso=:x AND aa_docente=:y', 
	 																'params' => array(':x' => $id_curso, ':y' => $docente['usu_id'])));

	 			// si el profesor no hace clases en niuna asignatura, entonces es el profesor jefe del curso 
	 			// por lo  que puede ver todas las asignaturas
	 			if( empty($asignacion) ){ 
	 				$asignacion = AAsignatura::model()->findAll(array('condition' => 'aa_curso=:x', 
	 																'params' => array(':x' => $id_curso)));
	 			}    
			}


		    $curso  = Curso::model()->findByPk($id_curso);
			$tipo_periodo = Parametro::model()->findByPk($curso->cur_tperiodo);


		  	foreach ( $asignacion as $p ){
                $id_asig[] = $p->aa_asignatura;
            }

            $criteria = new CDbCriteria();
            $criteria->addInCondition('asi_id', $id_asig, 'OR');
            $asig = Asignatura::model()->findAll($criteria);


    		$this->renderPartial('asign_notas',array(
    			'asig' 		=> $asig,
    			'periodo' 	=> $tipo_periodo->par_descripcion,
    			'cur_id'    => $curso->cur_id,
    		));
    	}
    }

    // carga la tabla con la lista de alumnos de la asignatura seleccionada para ponerles notas
    // [id_asignatura;tipo_periodo;id_curso]
    public function actionPoner_notas($a,$b,$c){

    	$id_asig = $a;
    	$tipo_periodo = $b;
    	$alumnos = array();

    	// se cargan todas las notas de la asigntura por periodo
		$notas = Notas::model()->findAll(array('condition' => 'not_asig=:x AND not_periodo=:y', 
												'params' => array(':x' => $id_asig, ':y' => $tipo_periodo )));

		$asignatura = Asignatura::model()->findByPk($id_asig);
		//para verificar que el profesor que edite las notas sea el que dicta la asignatura
		$asig = AAsignatura::model()->findByAttributes(array('aa_asignatura' => $id_asig, 'aa_curso' => $c));
		//$usuario = Usuario::model()->findByAttributes(array('usu_iduser' => yii::app()->user->id));



			// se recorren todas las notas encontradas, y se busca al alumno al  que les pertenecen
	        foreach ($notas as $key => $n) {
	        	$mat  = Matricula::model()->findByPk($n->not_mat); 
	        	$alum = Alumno::model()->findByPk($mat->mat_alu_id);

	        	$alumnos[] = array(
	    			//'mat_id' => $mat->mat_id, // id de la matricula del alumno
	    			'not_id' => $n->not_id, //  id de la tabla notas
	    			'nombre' => $alum->getNombre_completo(),
	    			'notas'  => $n->notas, // array con todas las notas
	        	);
	        }

			$curso  = Curso::model()->findByPk($c);
			$notas_periodo = $curso->cur_notas_periodo;
			$nivel = Parametro::model()->findByPk($curso->cur_nivel)->par_descripcion;
			$letra = Parametro::model()->findByPk($curso->cur_letra)->par_descripcion;

			$this->render('editar',array(
							'nombre_asignatura' => $asignatura->asi_descripcion,
							'asi_id'			=> $asignatura->asi_id,
							'cur_id'			=> $curso->cur_id,
							'periodo'           => $tipo_periodo,
							'nombre_curso'      => $nivel." ".$letra,
							'notas_p' 			=> $notas_periodo,
							'alumnos' 			=> $alumnos,
			 ));
		

	}

	// se le entrega id_curso y devuelve una lista con todos los alumnos + id_matricula
	public function actionListar_alumnos($id){
		$tiene_asignatura = AAsignatura::model()->findByAttributes(array('aa_curso' => $id ));

		if( $tiene_asignatura ){

			$ano = $this->actionAnoactual();
            $notas = Notas::model()->findall(array( 'condition' => 'not_asig=:x AND not_ano=:y', 
            										'params' => array(':x' => $tiene_asignatura['aa_asignatura'], ':y' => $ano )));
           	if( $notas ){
	            $mat_id = array();
	            foreach ($notas as $key => $nota) { // se obtienen todas las id de los alumnos de una asignatura
	            	$mat_id[] = $nota->not_mat;
	            }

	            $criteria = new CDbCriteria();
	            $criteria->addInCondition('mat_id', $mat_id, 'OR');
	            $matriculas = Matricula::model()->findAll($criteria);

	            $lista_alumnos = array();
            	$curso = Curso::model()->findByPk($id);
            	$tipo_periodo = Parametro::model()->findByPk($curso->cur_tperiodo);


            	if($tipo_periodo->par_descripcion == 'SEMESTRE' ){
	            	foreach ($matriculas as $key => $alumno) { // se recorre cada matricula y  se obtiene el nombre del alumno
	            		$mat_id = $alumno['mat_alu_id'];
	            		$alumno = Alumno::model()->findByPk($mat_id);
	            		$matri 	= Matricula::model()->findByPk($mat_id);
	            		
	            		$lista_alumnos[] = array(
	            					'mat_id'	=> $mat_id,
	            					'nombre'	=> $alumno->getNombre_completo(),
	            					'asi_1'		=> $matri['mat_asistencia_1'],
	            					'asi_2'		=> $matri['mat_asistencia_2'],
	            				);
	            		
	            	}
	            }else if($tipo_periodo->par_descripcion == 'TRIMESTRE' ){
	            	foreach ($matriculas as $key => $alumno) { // se recorre cada matricula y  se obtiene el nombre del alumno
	            		$mat_id = $alumno['mat_alu_id'];
	            		$alumno = Alumno::model()->findByPk($mat_id);
	            		$matri 	= Matricula::model()->findByPk($mat_id);

	            		$lista_alumnos[] = array(
	            					'mat_id'	=> $mat_id,
	            					'nombre'	=> $alumno->getNombre_completo(),
	            					'asi_1'		=> $matri->mat_asistencia_1,
	            					'asi_2'		=> $matri->mat_asistencia_2,
	            					'asi_3'		=> $matri->mat_asistencia_3,
	            				);
	            		
	            	}
	            }
            	//echo CJSON::encode($lista_alumnos);
            	return $lista_alumnos; // se retorna la lista
	            
			}else{
				//echo "no tiene alumnos";
				return 0;
			}

		} else{
			//echo "no tiene asignaturas";
			return null; //  si  el curso no  tiene asignaturas se retorna -1
		}

	}

	//  el profesor jefe puede ver todos sus cursos, 
	// selecciona uno y entra a la seccion  donde se pone la asistencia
	public function actionBuscar_asistencia(){
    	if(Yii::app()->user->checkAccess('admin') ){
			$cursos = $this->actionCursoAnoActual();

    		$this->render('buscar_asistencia',array(
	    			'cur' => $cursos,
   			));
    	
    	} else if (Yii::app()->user->checkAccess('jefe_utp') || Yii::app()->user->checkAccess('evaluador') ||
    				Yii::app()->user->checkAccess('director') ){

    		$usuario = Usuario::model()->findByAttributes(array( 'usu_iduser' => Yii::app()->user->id ));
    		$cursos = $this->actionCursoAnoActual();

    		$this->render('buscar_asistencia',array(
    				'nombre' => $usuario['Nombrecorto'],
	    			'cur' => $cursos,
   			));

    	} else if( Yii::app()->user->checkAccess('profesor')){
    		$id_cur = array();
    		$ano = $this->actionAnoActual();

			$es_profe_jefe = Curso::model()->findAll(array('condition' => 'cur_ano=:x AND cur_pjefe=:y',
    														'params'=> array(':x' => $ano, ':y' => Yii::app()->user->id )));
		

			if( $es_profe_jefe ){
    			// se agregan cursos si  es q es profe jefe
    			foreach ( $es_profe_jefe as $c ){
	                $id_cur[] = $c->cur_id;
	            }
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

			$this->render('buscar_asistencia',array(
	    			'cur' => $cursos,
	    			'usu' => $id_profe,
	    			'nombre' => $profe['Nombrecorto'],
   				));

		}
	}

	// llega la id del curso  al  que se le quiere poner la asistencia
	public function actionPoner_asistencia(){
		
		if( isset($_POST['id_cur'] )){
			$id = $_POST['id_cur'];
		
		$lista = $this->actionListar_alumnos($id); // se obtiene la lista de alumnos

		$curso = Curso::model()->findByPk($id);
        $tipo_periodo = Parametro::model()->findByPk($curso->cur_tperiodo);
        


		$this->renderPartial('editar_asistencia',array(
					'lista' 	=> $lista,
					'id_c'		=> $id,
					'tperiodo'	=> $tipo_periodo->par_descripcion,
				));
		}
	}


}

