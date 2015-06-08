<?php

class ColegioController extends Controller
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
				'actions'=>array('index','view','buscar_dir'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','buscar_dir'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','buscar_dir'),
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
		$model = $this->loadModel($id);
		$nombre_dir = Usuario::model()->findByPk($model->col_nombre_director);

		$this->render('view',array(
			'model'			=> $model,
			'nombre_dir'	=>	$nombre_dir->nombreCompleto,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Colegio;
		$actual = date('Y');
		for($i=$actual;$i>=($actual-100);$i--){
			$anos[$i] = $i; 
		}
		$periodo = CHtml::listData(Parametro::model()->findAll(array('condition'=>'par_item="tperiodo"')),'par_id','par_descripcion');
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Colegio']))
		{
			$model->attributes=$_POST['Colegio'];
			$images_path = realpath(Yii::app()->basePath . '/../images');
			$model->col_nombre_director = strtoupper($model->col_nombre_director);
			
            $model->col_logo=CUploadedFile::getInstance($model,'col_logo');
            if($model->save())
            {
            	if( $model->col_logo != null ){
                	$model->col_logo->saveAs($images_path . '/' .$model->col_logo);
                }
                $this->redirect(array('admin'));
            }
 
		}

		$this->render('create',array(
			'model'=>$model,
			'anos' => $anos,
			'periodo' => $periodo,
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

		$actual = date('Y');
		for($i=$actual;$i>=($actual-100);$i--){
			$anos[$i] = $i; 
		}
		$periodo = CHtml::listData(Parametro::model()->findAll(array('condition'=>'par_item="tperiodo"')),'par_id','par_descripcion');

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Colegio']))
		{
			$model->attributes=$_POST['Colegio'];
			$images_path = realpath(Yii::app()->basePath . '/../images');
            $model->col_logo=CUploadedFile::getInstance($model,'col_logo');
			if($model->save()){
				if( $model->col_logo != null ){
					$model->col_logo->saveAs($images_path . '/' .$model->col_logo);
				}
				$this->redirect(array('view','id'=>$model->col_id));
			}
		}

		$this->render('update',array(
			'model'=>$model,
			'anos' => $anos,
			'periodo' => $periodo,
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
		$dataProvider=new CActiveDataProvider('Colegio');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Colegio('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Colegio']))
			$model->attributes=$_GET['Colegio'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Colegio the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Colegio::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Colegio $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='colegio-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	 public function actionBuscar_dir()
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
                'id_usu' => $item->usu_id,
                'nombre'    => $item->usu_nombre1,
                'apellido' => $item->usu_apepat,
                'nombre2' => $item->usu_nombre2,
                'apellido2' => $item->usu_apemat,
            );
        }

        echo CJSON::encode($resultado);
    }



}
