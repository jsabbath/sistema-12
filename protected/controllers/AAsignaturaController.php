<?php

class AAsignaturaController extends Controller
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
				'actions'=>array('index','view','Buscar_asignatura','CursoAnoActual'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','Buscar_asignatura','CursoAnoActual'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','Buscar_asignatura','CursoAnoActual'),
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

		$model=new AAsignatura;
		$cursos = $this->actionCursoanoactual();
		//if(isset($_POST['id_curso'])) $id_curso = $_POST['id_curso'];

		if(isset($_POST['AAsignatura']))
		{
			$model->attributes=$_POST['AAsignatura'];
			if($model->save())
				$this->redirect(array('//curso/view','id'=>$model->aa_curso));
		}
		$this->renderPartial('_form',array(
			'cursos' => $cursos,
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

		if(isset($_POST['AAsignatura']))
		{
			$model->attributes=$_POST['AAsignatura'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->aa_id));
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
		$dataProvider=new CActiveDataProvider('AAsignatura');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new AAsignatura('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['AAsignatura']))
			$model->attributes=$_GET['AAsignatura'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return AAsignatura the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=AAsignatura::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param AAsignatura $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='aasignatura-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
        public function actionBuscar_prof()
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
                    'id' => $item->usu_id,
                    'nombre'    => $item->usu_nombre1,
                    'apellido' => $item->usu_apepat,
                    'nombre2' => $item->usu_nombre2,
                    'apellido2' => $item->usu_apemat,
                );
            }

            echo CJSON::encode($resultado);
        }
        
        
        public function actionBuscar_asignatura()
        {
            $criterio = new CDbCriteria;
            $cdtns = array();
            $resultado = array();
			$ano = $this->actionAnoactual();

            if(empty($_GET['term'])) return $resultado;

            $cdtns[] = "LOWER(asi_descripcion) like LOWER(:busq) AND asi_ano = :ano";

            $criterio->condition = implode(' OR ', $cdtns);
            $criterio->params = array(':busq' => '%' . $_GET['term'] . '%', ':ano' => $ano);
            $criterio->limit = 10;

            $data = Asignatura::model()->findAll($criterio);
            
            foreach($data as $item) {  
                $resultado[] = array (
                    'id' => $item->asi_id,
                    'nombre'    => $item->asi_descripcion,
                    'corto' => $item->asi_nombrecorto,
                    'codigo' => $item->asi_codigo,
                );
            }

            echo CJSON::encode($resultado);
        }
        
    public function actionCursoAnoActual(){
    	/*
		La funcion devuelve un array con la ID y el nombre completo de los cursos
		ejemplo: array('1'=>'PRIMERO A')
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
}
