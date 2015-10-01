<?php

class ApoderadoController extends Controller
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
		$model=new Apoderado;

		$ano = array();
		for ($i=date('Y'); $i >= (date('Y')-100); $i--) { 
			$ano[] = $i;
		}

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Apoderado']))
		{
			$model->attributes=$_POST['Apoderado'];

			$model->apo_ano = date('Y');
			$matricula = Matricula::model()->findAll(array('condition'=>'mat_alu_id="'.$model->apo_hijo.'"'));
			$model->apo_hijo = $matricula[0]->mat_id;

			$model->apo_nombre1 = mb_strtoupper($model->apo_nombre1,'utf-8');
			$model->apo_nombre2 = mb_strtoupper($model->apo_nombre2,'utf-8');
			$model->apo_apepat = mb_strtoupper($model->apo_apepat,'utf-8');
			$model->apo_apemat = mb_strtoupper($model->apo_apemat,'utf-8');

			if($model->save()){
				Yii::app()->user->setFlash('success', "Apoderado ingresado con Exito!");
				$this->redirect(array('admin'));
			}
		}

		$this->render('create',array(
			'model'=>$model,
			'ano'=>$ano,
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

		$ano = array();
		for ($i=date('Y'); $i >= (date('Y')-100); $i--) { 
			$ano[] = $i;
		}

		$id_matricula = Matricula::model()->findAll(array('condition'=>'mat_id="'.$model->apo_hijo.'"'));
		$alumno = Alumno::model()->findAll(array('condition'=>'alum_id="'.$id_matricula[0]->mat_alu_id.'"'));

		$nom_p = $alumno[0]->alum_nombres;
		$ape_p = $alumno[0]->alum_apepat." ".$alumno[0]->alum_apemat;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Apoderado']))
		{
			$model->attributes=$_POST['Apoderado'];

			$model->apo_nombre1 = mb_strtoupper($model->apo_nombre1,'utf-8');
			$model->apo_nombre2 = mb_strtoupper($model->apo_nombre2,'utf-8');
			$model->apo_apepat = mb_strtoupper($model->apo_apepat,'utf-8');
			$model->apo_apemat = mb_strtoupper($model->apo_apemat,'utf-8');

			if($model->save()){
				Yii::app()->user->setFlash('success', "Apoderado actualizado con Exito!");
				$this->redirect(array('view','id'=>$model->apo_id));
			}
		}

		$this->render('update',array(
			'model'=>$model,
			'ano'=>$ano,
			'nom_p'=>$nom_p,
			'ape_p'=>$ape_p,
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
		$dataProvider=new CActiveDataProvider('Apoderado');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Apoderado('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Apoderado']))
			$model->attributes=$_GET['Apoderado'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Apoderado the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Apoderado::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Apoderado $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='apoderado-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
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

	public function actionHijo(){
		$criterio = new CDbCriteria;
        $cdtns = array();
		$resultado = array();

        if(empty($_GET['term'])) return $resultado;

        $cdtns[] = "LOWER(alum_nombres) like LOWER(:busq)";

        $criterio->condition = implode(' OR ', $cdtns);
        $criterio->params = array(':busq' => '%' . $_GET['term'] . '%');
        $criterio->limit = 10;

        $data = Alumno::model()->findAll($criterio);
        
        foreach($data as $item) {  
            $resultado[] = array (
                'id' => $item->alum_id,
                'id_alumno' => $item->alum_id,
                'nombre' => $item->alum_nombres,
                'apellido' => $item->alum_apepat,
                'apellido2' => $item->alum_apemat,
            );
        }

        echo CJSON::encode($resultado);
	}

	public function actionNotas(){
		$this->render('notas');
	}

	public function actionVernotas(){
		if(isset($_POST['rut_apo']) AND isset($_POST['rut_alum'])){
			$apo = $_POST['rut_apo'];
			$alum = $_POST['rut_alum'];

			$hijo = Apoderado::model()->findAll(array('condition'=>'apo_rut="'.$apo.'"'));

			if($hijo[0]->apoHijo->matAlu->alum_rut == $alum){

				$matricula = $hijo[0]->apoHijo->mat_id;
				$notas_1 = Notas::model()->findAll(array('condition'=>'not_mat="'.$matricula.'" AND not_periodo="1"'));
				$notas_2 = Notas::model()->findAll(array('condition'=>'not_mat="'.$matricula.'" AND not_periodo="2"'));
				$curso = ListaCurso::model()->findByAttributes(array('list_mat_id'=>$matricula));
				$notas_curso = $curso->listCurso->cur_notas_periodo;

				$this->renderPartial('ver',array(
					'notas_1'=>$notas_1,
					'notas_2'=>$notas_2,
					'notas_curso'=>$notas_curso,
				));

			}else echo '<p class="text-error text-center">Ingrese Rut válido<p>';

		}else echo '<p class="text-error text-center">Ingrese Rut válido<p>';
	}
}
