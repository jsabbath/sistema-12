<?php

class AreaHogarController extends Controller
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
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
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
		$model=new AreaHogar;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['AreaHogar']))
		{
			$model->attributes=$_POST['AreaHogar'];
			$model->ah_descripcion = mb_strtoupper($model->ah_descripcion,'utf-8');
			if($model->save())
				$this->redirect(array('view','id'=>$model->ah_id));
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

		if(isset($_POST['AreaHogar']))
		{
			$model->attributes=$_POST['AreaHogar'];
			$model->ah_descripcion = mb_strtoupper($model->ah_descripcion,'utf-8');
			if($model->save())
				$this->redirect(array('view','id'=>$model->ah_id));
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
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('AreaHogar');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new AreaHogar('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['AreaHogar']))
			$model->attributes=$_GET['AreaHogar'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return AreaHogar the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=AreaHogar::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param AreaHogar $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='area-hogar-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionNuevo($id){
		$model=new AreaHogar;
		// $area = Area::model()->findAll(array('condition'=>'are_infd="'.$id.'"'));
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		$criteria = new CDbCriteria;
		$criteria->condition = 'ah_inf_hogar="'.$id.'"';
		$area = new CActiveDataProvider('AreaHogar',array('criteria'=>$criteria));

		if(isset($_POST['AreaHogar']))
		{
			$model->attributes=$_POST['AreaHogar'];
			$model->ah_inf_hogar=$id;
			$model->ah_descripcion = strtoupper($model->ah_descripcion);
			if($model->save()){
				Yii::app()->user->setFlash('success', "area creada con Exito!");
				$this->refresh();
			}
		}

		$this->render('nuevo',array(
			'model'=>$model,
			'id'=>$id,
			'area'=>$area,
		));
	}

	public function actionBuscar_area(){
		$criterio = new CDbCriteria;
        $cdtns = array();
        $resultado = array();

        if(empty($_GET['term'])) return $resultado;

        $cdtns[] = "LOWER(ah_descripcion) like LOWER(:busq)";

        $criterio->distinct = true;
        $criterio->condition = implode(' OR ', $cdtns);
        $criterio->params = array(':busq' => '%' . $_GET['term'] . '%');
        $criterio->select = 'ah_descripcion';
        $criterio->limit = 10;

        $data = AreaHogar::model()->findAll($criterio);
        
        foreach($data as $item) {  
            $resultado[] = array (
                'id' => $item->ah_id,
                'nombre'=>$item->ah_descripcion,
            );
        }

        echo CJSON::encode($resultado);
	}
}
