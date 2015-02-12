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
				'actions'=>array('index','view','recieveValue','buscar_prof'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','recieveValue','buscar_prof'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','recieveValue','buscar_prof'),
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
                        var_dump($model->cur_ano);
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

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Curso']))
		{
			$model->attributes=$_POST['Curso'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->cur_id));
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
			$dataProvider=new CActiveDataProvider('Curso', array(
			'criteria' => $criteria
		));
			$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
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

            //if(empty($_GET['term'])) return $resultado;

            $cdtns[] = "LOWER(usu_nombre1) like LOWER(:busq)";

            $criterio->condition = implode(' OR ', $cdtns);
            $criterio->params = array(':busq' => '%' . $_GET['term'] . '%');
            $criterio->limit = 10;

            $data = Usuario::model()->findAll($criterio);
            
            foreach($data as $item) {  
                $resultado[] = array (
                    'id' => $item->usu_id,
                    'nombre'    => $item->usu_nombre1,
                    'apellido' => $item->usu_apepat,
                    'nombre2' => $item->usu_nombre2,
                    'apellido2' => $item->usu_apemat,
                );
            }

            echo CJSON::encode($resultado);
        }
}


