<?php

class ConceptoController extends Controller
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
				'actions'=>array('index','view','conceptos','nuevo','buscar_concepto'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','conceptos','nuevo','buscar_concepto'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','conceptos','nuevo','buscar_concepto'),
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
		$model=new Concepto;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Concepto']))
		{
			$model->attributes=$_POST['Concepto'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->con_id));
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

		if(isset($_POST['Concepto']))
		{
			$model->attributes=$_POST['Concepto'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->con_id));
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
		$dataProvider=new CActiveDataProvider('Concepto');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Concepto('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Concepto']))
			$model->attributes=$_GET['Concepto'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Concepto the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Concepto::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Concepto $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='concepto-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionNuevo($id)
	{
		$model=new Concepto;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		$inf = Area::model()->findAll(array('select'=>'are_infd','condition'=>'are_id="'.$id.'"'));

		$criteria = new CDbCriteria;
		$criteria->condition = 'con_area="'.$id.'"';
		$concepto = new CActiveDataProvider('Concepto',array('criteria'=>$criteria));

		if(isset($_POST['Concepto']))
		{
			$model->attributes=$_POST['Concepto'];
			$model->con_area = $id;
			if($model->save())
				$this->refresh();
		}

		$this->render('nuevo',array(
			'model'=>$model,
			'concepto'=>$concepto,
			'inf'=>$inf,
		));
	}

	public function actionBuscar_concepto(){
		$criterio = new CDbCriteria;
        $cdtns = array();
        $resultado = array();

        if(empty($_GET['term'])) return $resultado;

        $cdtns[] = "LOWER(con_descripcion) like LOWER(:busq)";

        $criterio->distinct = true;
        $criterio->condition = implode(' OR ', $cdtns);
        $criterio->params = array(':busq' => '%' . $_GET['term'] . '%');
        $criterio->select = 'con_descripcion';
        $criterio->limit = 10;

        $data = Concepto::model()->findAll($criterio);
        
        foreach($data as $item) {  
            $resultado[] = array (
                'id' => $item->con_id,
                'nombre'=>$item->con_descripcion,
            );
        }

        echo CJSON::encode($resultado);
	}
}
