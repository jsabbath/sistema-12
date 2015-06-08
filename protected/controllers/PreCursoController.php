<?php

class PreCursoController extends Controller
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
		$model=new PreCurso;
		$ano = date('Y');
		$nivel = CHtml::listData(Parametro::model()->findAll(array('condition'=>'par_item="PRENIVEL"')),'par_id','par_descripcion');
		$letra = CHtml::listData(Parametro::model()->findAll(array('condition'=>'par_item="LETRA"')),'par_id','par_descripcion');
		$jornada = CHtml::listData(Parametro::model()->findAll(array('condition'=>'par_item="JORNADA"')),'par_id','par_descripcion');

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['PreCurso']))
		{
			$model->attributes=$_POST['PreCurso'];
			$model->pre_ano = $ano;
			if($model->save()){
				Yii::app()->user->setFlash('success', "Curso creado con Exito!");
				$this->redirect(array('admin'));
			}
		}

		$this->render('create',array(
			'model'=>$model,
			'ano'=>$ano,
			'nivel'=>$nivel,
			'letra'=>$letra,
			'jornada'=>$jornada,
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
		$ano = date('Y');
		$nivel = CHtml::listData(Parametro::model()->findAll(array('condition'=>'par_item="PRENIVEL"')),'par_id','par_descripcion');
		$letra = CHtml::listData(Parametro::model()->findAll(array('condition'=>'par_item="LETRA"')),'par_id','par_descripcion');
		$jornada = CHtml::listData(Parametro::model()->findAll(array('condition'=>'par_item="JORNADA"')),'par_id','par_descripcion');

		$profe = Usuario::model()->findByAttributes(array('usu_iduser' => $model->pre_pjefe));
        $nom_p = $profe->usu_nombre1 ." ". $profe->usu_nombre2;
        $ape_p = $profe->usu_apepat ." ". $profe->usu_apemat;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['PreCurso']))
		{
			$model->attributes=$_POST['PreCurso'];
			$model->pre_ano = $ano;
			if($model->save()){
				Yii::app()->user->setFlash('success', "Curso actualizada con Exito!");
				$this->redirect(array('admin'));
			}
		}

		$this->render('update',array(
			'model'=>$model,
			'ano'=>$ano,
			'nivel'=>$nivel,
			'letra'=>$letra,
			'jornada'=>$jornada,
			'nom_p' => $nom_p,
			'ape_p'	=> $ape_p,
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
		if(!isset($_GET['ajax'])){
			Yii::app()->user->setFlash('success', "area eliminada con Exito!");
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('PreCurso');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new PreCurso('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['PreCurso']))
			$model->attributes=$_GET['PreCurso'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return PreCurso the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=PreCurso::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param PreCurso $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='pre-curso-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
