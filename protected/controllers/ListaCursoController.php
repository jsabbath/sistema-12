<?php

class ListaCursoController extends Controller
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
				'actions'=>array('index','view', 'lista_curso', 'actualizar_lista','subir_orden'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update', 'lista_curso', 'actualizar_lista','subir_orden'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete', 'lista_curso', 'actualizar_lista','subir_orden'),
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
		$model=new ListaCurso;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['ListaCurso'])) {
			$model->attributes=$_POST['ListaCurso'];
			if ($model->save()) {
				$this->redirect(array('view','id'=>$model->list_id));
			}
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

		if (isset($_POST['ListaCurso'])) {
			$model->attributes=$_POST['ListaCurso'];
			if ($model->save()) {
				$this->redirect(array('view','id'=>$model->list_id));
			}
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
		if (Yii::app()->request->isPostRequest) {
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if (!isset($_GET['ajax'])) {
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
			}
		} else {
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		}
	}

	/**
	  Lists all models.
	 */
	public function actionIndex(){

		if(Yii::app()->user->checkAccess('administrador') OR Yii::app()->user->isSuperAdmin){
			$cursos = $this->actionCursoAnoActual();

    		$this->render('ordenar_lista',array(
	    			'cur' => $cursos,
   			));

    	} else if (Yii::app()->user->checkAccess('jefe_utp') OR Yii::app()->user->checkAccess('evaluador') OR
    				Yii::app()->user->checkAccess('director') ){

    		$usuario = Usuario::model()->findByAttributes(array( 'usu_iduser' => Yii::app()->user->id ));
    		$cursos = $this->actionCursoAnoActual();

    		$this->render('ordenar_lista',array(
    				'nombre' => $usuario['Nombrecorto'],
	    			'cur' => $cursos,
   			));

    	} else if( Yii::app()->user->checkAccess('profesor') ){
    		$ano = $this->actionAnoActual();
    		$profe = Usuario::model()->findByAttributes(array( 'usu_iduser' => Yii::app()->user->id ));
    		$id_profe = $profe['usu_id'];


			$es_profe_jefe = Curso::model()->findAll(array('condition' => 'cur_ano=:x AND cur_pjefe=:y',
    														'params'=> array(':x' => $ano, ':y' => Yii::app()->user->id )));

    		$id_cur = array(); //  se arma un array con  los cursos que tiene el profe

    		if( $es_profe_jefe ){
    			// se agregan cursos si  es q es profe jefe
    			foreach ( $es_profe_jefe as $c ){
	                $id_cur[] = $c->cur_id;
	            }
    		} else{
    			$cursos = array(); //  array vacio para decir que no  es profesor jefe de niun curso
    			$this->render('ordenar_lista',array(
    					'cur' => $cursos,
    					'nombre' => $profe['Nombrecorto'],
    				));
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
				asort($cursos);
				$this->render('ordenar_lista',array(
	    			'cur' => $cursos,
	    			'usu' => $id_profe,
	    			'nombre' => $profe['Nombrecorto'],
   				));


    	}

	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new ListaCurso('search');
		$model->unsetAttributes();  // clear any default values
		if (isset($_GET['ListaCurso'])) {
			$model->attributes=$_GET['ListaCurso'];
		}

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return ListaCurso the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=ListaCurso::model()->findByPk($id);
		if ($model===null) {
			throw new CHttpException(404,'The requested page does not exist.');
		}
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param ListaCurso $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax']==='lista-curso-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
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
            throw new CHttpException(666,'$cur es null.  (ListaCurso/cursoAñoActual) : L262');
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


	// id = id curso
	// funcion  para agregar alumnos que no  estaban  en la lista pero si estaban inscritos en la tabla notas.
	public function actionActualizar_lista($id){
		$alumnos = array();
		$asignadas = AAsignatura::model()->find(array('condition' => 'aa_curso=:x', 'params' => array(':x' => $id )));

		if( $asignadas ){//  se ve si  tiene asignaturas
			$esta_matriculado = Notas::model()->findAll(array('condition' => 'not_asig=:x', 'params' => array(':x' => $asignadas['aa_asignatura']) ));

			foreach($esta_matriculado as $key => $alumno){

				if( !in_array($alumno['not_mat'], $alumnos, true) ){

					$alumnos[] = array(
						'mat_id' => $alumno['not_mat'],
						);
				}
			}

			// sirve para sacar los ctm repetios
			$alumnos = array_unique($alumnos, SORT_REGULAR);
			echo json_encode($alumnos);

			foreach ($alumnos as $key => $a) {
				$esta = Listacurso::model()->findByAttributes(array('list_mat_id' => $a['mat_id']));

				if( !$esta ){
				  	$numero_alumnos = ListaCurso::model()->countByAttributes(array('list_curso_id' => $id));
	                $lista_alumnos = new ListaCurso;
	                $lista_alumnos->list_curso_id = $id;
	                $lista_alumnos->list_mat_id = $a['mat_id'];
	                $lista_alumnos->list_posicion = $numero_alumnos + 1;
	                $lista_alumnos->insert();
	            }else{
	            	echo "<br>". $a['mat_id'] . " ya esta inscrito";
	            }
			}
		} else{
			echo "no tiene alumnos";
		}
	}


	// lista los alumnos del curso id = cur_id
	public function actionLista_curso(){

		if( isset($_POST['id']) ){
			$id = $_POST['id'];

			// trae lista del curso ordenada
			$lista_curso = ListaCurso::model()->findAll(array('order'=>'list_posicion','condition' => 'list_curso_id=:x', 'params' => array(':x' => $id )));
			$lista = array();

			if( !empty($lista_curso) ){
				foreach($lista_curso as $key => $alumno){
					$mat = Matricula::model()->findByPk($alumno->list_mat_id);
					$alum = Alumno::model()->findByPk($mat->mat_alu_id);
					$par = Parametro::model()->findByPk($mat->mat_estado);
					if( $par->par_descripcion == "RETIRADO" ){
						$kk = $par->par_descripcion;
					} else{
						$kk = "";
					}
					// falta ordenar la lista por posicion
					$lista[]=array(
							'nombre'	=> $alum->Nombre_completo_2,
							'mat_id' 	=> $alumno['list_mat_id'],
							'posicion' 	=> $alumno['list_posicion'],
							'list_id'	=> $alumno['list_id'],
							'estado'	=> $kk,
					);
				}

				//echo json_encode($lista);
				//var_dump($lista);
				$this->renderPartial('lista',array(
					'lista'	=> $lista,
					'curso' => $id,
				));

			} else{
				// no tiene alumnos en la lista
				$this->renderPartial('lista',array(
					'lista'	=> $lista,
					'mensaje' 	=> "no tiene alumnos en la lista"
				));
			}
		}
	}

	public function actionSubir_orden(){
		if(isset($_POST['curso_lista'])){
			$lista = $_POST['curso_lista'];
			$id_curso = $_POST['curso'];

			foreach ($lista as $key => $alum) {
				$nu_po = $key + 1;
				$lista_curso = $this->loadModel($alum['id_list']);
				if( $lista_curso->list_posicion != $nu_po ){
					$lista_curso->list_posicion = $nu_po;
					$lista_curso->update();

				}
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

			// si  es jefe utp o director o evaluador pueden  cambiar notas tambien

			if( Yii::app()->user->checkAccess('profesor')  ){

				// si no  es el profesor que hace la asignatura se ve si es el profe jefe del curso
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



}
