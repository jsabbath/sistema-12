<?php

class AlumnoController extends Controller
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
				'actions'=>array('index','view','regiones','ciudades'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','regiones','ciudades'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','regiones','ciudades'),
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
		$model=new Alumno;
		$matricula = new Matricula;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		$region = CHtml::listData(Region::model()->findAll(), 'reg_id', 'reg_descripcion');

		if (isset($_POST['Alumno'])) {
			$matricula->attributes = $_POST['Matricula'];
            $matricula->mat_fingreso = date('d-m-Y');
			$model->attributes=$_POST['Alumno'];
			if ($model->save()) {
				$matricula->save();
				$this->redirect(array('view','id'=>$model->alum_id));
			}
		}

		$this->render('create',array(
			'model'=>$model,
			'matricula'=>$matricula,
			'region'=>$region,
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

		if (isset($_POST['Alumno'])) {
			$model->attributes=$_POST['Alumno'];
			if ($model->save()) {
				$this->redirect(array('view','id'=>$model->alum_id));
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
		$dataProvider=new CActiveDataProvider('Alumno');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Alumno('search');
		$model->unsetAttributes();  // clear any default values
		if (isset($_GET['Alumno'])) {
			$model->attributes=$_GET['Alumno'];
		}

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Alumno the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Alumno::model()->findByPk($id);
		if ($model===null) {
			throw new CHttpException(404,'The requested page does not exist.');
		}
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Alumno $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax']==='alumno-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionRegiones() {
        $districts = Ciudad::model()->findAll('ciu_reg=:id', array(':id' => $_POST['id_region']));
        $return = CHtml::listData($districts, 'ciu_id', 'ciu_descripcion');
        echo CHtml::tag('option', array('value' => 0), CHtml::encode('Seleccione ciudad'), true);
        foreach ($return as $districtId => $districtName) {
        	echo CHtml::tag('option', array('value' => $districtId), CHtml::encode($districtName), true);
    	}

    }

    public function actionCiudades() {
        $districts = Comuna::model()->findAll('com_ciu=:id', array(':id' => $_POST['id_ciudad']));
        $return = CHtml::listData($districts, 'com_id', 'com_descripcion');
        echo CHtml::tag('option', array('value' => 0), CHtml::encode('Seleccione comuna'), true);
        foreach ($return as $districtId => $districtName) {
        echo CHtml::tag('option', array('value' => $districtId), CHtml::encode($districtName), true);
    	}
    }
}