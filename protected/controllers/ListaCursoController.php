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
				'actions'=>array('index','view', 'lista_curso', 'actualizar_lista'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update', 'lista_curso', 'actualizar_lista'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete', 'lista_curso', 'actualizar_lista'),
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

		$cursos = $this->actionCursoAnoActual();

		$this->render('ordenar_lista',array(
    			'cur' => $cursos,
			));
    	
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

		for ($i=0; $i < count($curso); $i++) { 
			$cursos_actuales[$curso[$i]->cur_id] = "".$nivel[$curso[$i]->cur_nivel]." ".$letra[$curso[$i]->cur_letra];
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

			$lista_curso = Listacurso::model()->findAll(array('condition' => 'list_curso_id=:x', 'params' => array(':x' => $id )));
			$lista = array();

			if( !empty($lista_curso) ){
				foreach($lista_curso as $key => $alumno){
					$mat = matricula::model()->findByPk($alumno->list_mat_id);
					$alum = Alumno::model()->findByPk($mat->mat_alu_id);

					// falta ordenar la lista por posicion
					$lista[]=array(
							'nombre'	=> $alum->Nombre_completo,
							'mat_id' 	=> $alumno['list_mat_id'],
							'posicion' 	=> $alumno['list_posicion'],
					);
				}

				//echo json_encode($lista);
				//var_dump($lista);
				$this->renderPartial('lista',array(
					'lista'	=> $lista,
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



}