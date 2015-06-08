<?php

class NotasController extends Controller
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
				'actions'=>array('index','view','subir_notas','guardarnotas','validar_edicion'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','subir_notas','guardarnotas','validar_edicion'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','subir_notas','guardarnotas','validar_edicion'),
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
		$model=new Notas;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['Notas'])) {
			$model->attributes=$_POST['Notas'];
			if ($model->save()) {
				$this->redirect(array('view','id'=>$model->not_id));
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

		if (isset($_POST['Notas'])) {
			$model->attributes=$_POST['Notas'];
			if ($model->save()) {
				$this->redirect(array('view','id'=>$model->not_id));
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
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Notas');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Notas('search');
		$model->unsetAttributes();  // clear any default values
		if (isset($_GET['Notas'])) {
			$model->attributes=$_GET['Notas'];
		}

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Notas the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Notas::model()->findByPk($id);
		if ($model===null) {
			throw new CHttpException(404,'The requested page does not exist.');
		}
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Notas $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax']==='notas-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionSubir_notas(){
		if(isset($_POST['curso_notas'])){
			$notas_curso = $_POST['curso_notas'];
			$alu_notas = array();

			foreach($notas_curso as $key => $alumno){ //  se recorre cada alumno 
				$id_notas = $alumno[0];
				$model=$this->loadModel($id_notas);
				$notas = $alumno[1];

				$this->Guardarnotas($model,$notas);
			}
		}
	}

	public function Guardarnotas($model, $notas){

		while (count($notas) < 30 ) {
			array_push($notas,"0");
		}
		
		$model->not_01 = $notas[0]; 
		$model->not_02 = $notas[1]; 
		$model->not_03 = $notas[2]; 
		$model->not_04 = $notas[3]; 
		$model->not_05 = $notas[4]; 
		$model->not_06 = $notas[5]; 
		$model->not_07 = $notas[6]; 
		$model->not_08 = $notas[7]; 
		$model->not_09 = $notas[8]; 
		$model->not_10 = $notas[9]; 
		$model->not_11 = $notas[10]; 
		$model->not_12 = $notas[11]; 
		$model->not_13 = $notas[12]; 
		$model->not_14 = $notas[13]; 
		$model->not_15 = $notas[14]; 
		$model->not_16 = $notas[15]; 
		$model->not_17 = $notas[16]; 
		$model->not_18 = $notas[17]; 
		$model->not_19 = $notas[18]; 
		$model->not_20 = $notas[19]; 
		$model->not_21 = $notas[20]; 
		$model->not_22 = $notas[21]; 
		$model->not_23 = $notas[22]; 
		$model->not_24 = $notas[23]; 
		$model->not_25 = $notas[24]; 
		$model->not_26 = $notas[25]; 
		$model->not_27 = $notas[26]; 
		$model->not_28 = $notas[27]; 
		$model->not_29 = $notas[28]; 
		$model->not_30 = $notas[29]; 

		if( $model->save() ){
			return true;
		}

		return false;
	}


	public function actionValidar_Edicion(){

		if(isset($_POST['pass']) && isset($_POST['id_asi'])){
			$p = $_POST['pass'];
			$id_asi = $_POST['id_asi'];
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
			 	// se busca si existe la asignatura
			 	$existe = AAsignatura::model()->findByAttributes(array('aa_asignatura' => $id_asi, 'aa_curso' => $curso ));
			 	$usu = Usuario::model()->findByAttributes(array('usu_iduser' => Yii::app()->user->id));
			 	
			 	// existe la asignatura
			 	if( $existe ){
			 		// si el profesor es el que hace la aignatura
			 		if( $usu->usu_id == $existe['aa_docente'] ){
				 		if( $usuario->password == $p){
				 			echo json_encode(1);
				 			return;
						}else {
					 		echo json_encode(0);
					 		return;
					 	}
				 	}
					// si no  es el profesor que hace la asignatura se ve si es el profe jefe del curso
			 		$curso = Curso::model()->findByPk($existe['aa_curso']);

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
			}
			echo json_encode(2);
			return;	
		}	
	}

}