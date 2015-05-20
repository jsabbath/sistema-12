<?php

class ConceptoHogarController extends Controller
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
		$model=new ConceptoHogar;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ConceptoHogar']))
		{
			$model->attributes=$_POST['ConceptoHogar'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->ch_id));
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

		if(isset($_POST['ConceptoHogar']))
		{
			$model->attributes=$_POST['ConceptoHogar'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->ch_id));
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
		$dataProvider=new CActiveDataProvider('ConceptoHogar');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new ConceptoHogar('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ConceptoHogar']))
			$model->attributes=$_GET['ConceptoHogar'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return ConceptoHogar the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=ConceptoHogar::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param ConceptoHogar $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='concepto-hogar-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionNuevo($id)
	{
		$model=new ConceptoHogar;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		$inf = AreaHogar::model()->findAll(array('select'=>'ah_inf_hogar','condition'=>'ah_id="'.$id.'"'));

		$criteria = new CDbCriteria;
		$criteria->condition = 'ch_area_hogar="'.$id.'"';
		$concepto = new CActiveDataProvider('ConceptoHogar',array('criteria'=>$criteria));

		if(isset($_POST['ConceptoHogar']))
		{
			$model->attributes=$_POST['ConceptoHogar'];
			$model->ch_area_hogar = $id;
			$model->ch_descripcion = strtoupper($model->ch_descripcion);
			if($model->save()){
				Yii::app()->user->setFlash('success', "Concepto creado con Exito!");
				$this->refresh();
			}
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

        $cdtns[] = "LOWER(ch_descripcion) like LOWER(:busq)";

        $criterio->distinct = true;
        $criterio->condition = implode(' OR ', $cdtns);
        $criterio->params = array(':busq' => '%' . $_GET['term'] . '%');
        $criterio->select = 'ch_descripcion';
        $criterio->limit = 10;

        $data = Concepto::model()->findAll($criterio);
        
        foreach($data as $item) {  
            $resultado[] = array (
                'id' => $item->ch_id,
                'nombre'=>$item->ch_descripcion,
            );
        }

        echo CJSON::encode($resultado);
	}
}
