<?php

class EvaHogarController extends Controller
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
				'actions'=>array('index','view','evaluar','lista_alumnos','mostrar_informe','validar_edicion','subir_notas'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','evaluar','lista_alumnos','mostrar_informe','validar_edicion','subir_notas'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','evaluar','lista_alumnos','mostrar_informe','validar_edicion','subir_notas'),
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
		$model=new EvaHogar;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['EvaHogar'])) {
			$model->attributes=$_POST['EvaHogar'];
			if ($model->save()) {
				$this->redirect(array('view','id'=>$model->eh_id));
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

		if (isset($_POST['EvaHogar'])) {
			$model->attributes=$_POST['EvaHogar'];
			if ($model->save()) {
				$this->redirect(array('view','id'=>$model->eh_id));
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
		$dataProvider=new CActiveDataProvider('EvaHogar');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new EvaHogar('search');
		$model->unsetAttributes();  // clear any default values
		if (isset($_GET['EvaHogar'])) {
			$model->attributes=$_GET['EvaHogar'];
		}

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return EvaHogar the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=EvaHogar::model()->findByPk($id);
		if ($model===null) {
			throw new CHttpException(404,'The requested page does not exist.');
		}
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param EvaHogar $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax']==='eva-hogar-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

 	//funcion para determinar el año sobre el que se trabaja
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

	public function actionLista_pre_cursos(){
        $ano = $this->actionAnoactual();

        $nivel = CHtml::listData(Parametro::model()->findAll(array('condition'=>'par_item="prenivel"')),'par_id','par_descripcion');
        $letra = CHtml::listData(Parametro::model()->findAll(array('condition'=>'par_item="letra"')),'par_id','par_descripcion');

        $pre_cursos = PreCurso::model()->findAll(array('condition' => 'pre_ano=:x', 'params' => array(':x' => $ano)));

        $cursos = array();
        if( $pre_cursos ){
	        foreach ($pre_cursos as $key => $p) {
	            $cursos[$p->pre_id] = $nivel[$p->pre_nivel]." ".$letra[$p->pre_letra];
	        }
    	}
        return $cursos;
    }


    public function actionEvaluar(){
    	$cursos = $this->actionLista_pre_cursos();

    	$this->render('evaluar',array(
    								'cursos'	=> $cursos,
    				));
    }

    public function actionLista_alumnos(){
    	if( isset($_POST['id_curso']) ){
    		$lista_eva = EvaHogar::model()->findAll(array('condition' => 'eh_curso=:x', 'params' => array(':x' => $_POST['id_curso'])));

   			$lista = array();
    		foreach ($lista_eva as $key => $v) {
    			$mat = Matricula::model()->findByPk($v->eh_matricula);
    			$alu = Alumno::model()->findByPk($mat->mat_alu_id);

    			$lista[] = array(
    				'nombre' => $alu->Nombre_completo_2,
    				'id' => $v->eh_matricula
    				);
    		}
    		if( $lista != null ){
				$alumnos = array_unique($lista, SORT_REGULAR);

	    		foreach ($alumnos as $key => $e) {
	    			echo CHtml::tag('option', array('value' => $e['id']), CHtml::encode($e['nombre']), true);
	    		}
    		} else{
    			echo CHtml::tag('option', array('value' => 0), CHtml::encode('sin alumnos'), true);
    		}
    	}
    }

    public function actionMostrar_informe(){
    	if( isset($_POST['id']) ){
    		$id_mat = $_POST['id'];
    		$id_curso = $_POST['curso'];

    		if( $id_mat != 0 ){

    			$cur = PreCurso::model()->findByPk($id_curso);

    			$areas = AreaHogar::model()->findAll(array('condition' => 'ah_inf_hogar=:x', 'params' => array(':x' => $cur->pre_inf)));
    			$are = array();
    			foreach ($areas as $key => $area) {

    				$con = ConceptoHogar::model()->findAll(array('condition' => 'ch_area_hogar=:x' , 'params' => array(':x' => $area->ah_id)));
    				$concepto = array();
    				foreach ($con as $key => $c) {
    					$eva = EvaHogar::model()->findByAttributes(array('eh_concepto' => $c->ch_id, 'eh_matricula' => $id_mat, 'eh_curso' => $id_curso));

    					if( $eva->eh_eva1 != null ){
    						$nota1 = Parametro::model()->findByPk($eva->eh_eva1)->par_descripcion;
    					}else{
    						$nota1 = "";
    					}
    					if( $eva->eh_eva2 != null ){
    						$nota2 = Parametro::model()->findByPk($eva->eh_eva2)->par_descripcion;
    					}else{
    						$nota2 = "";
    					}
    					if( $eva->eh_eva3 != null ){
    						$nota3 = Parametro::model()->findByPk($eva->eh_eva3)->par_descripcion;
    					}else{
    						$nota3 = "";
    					}

    					$concepto[] = array(
    							'id_eva'		=> $eva->eh_id,
    							'nombre_con' 	=> $c->ch_descripcion,
    							'nota1'			=> $nota1,
    							'nota2'			=> $nota2,
    							'nota3'			=> $nota3,
    						);
    				}
    				$are[] = array(
    						'nombre_area' 	=> $area->ah_descripcion,
    						'id_area'		=> $area->ah_id,	
    						'area_con'		=> $concepto, 
    					);

    			}
    			$inf = InformeHogar::model()->findByPk($cur->pre_inf);
    			$escala = Parametro::model()->findAll(array('condition'=>'par_item="ESCALA_HOGAR"'));
    			$mat = Matricula::model()->findByPk($id_mat);

    			$this->renderPartial('eva_informe',array(
    												'asi' 		=> $mat->mat_asistencia_1,
    												'areas' 	=> $are,
    												'nombre'	=> $inf->ih_descripcion,
    												'escala'	=> $escala,
    								));

    			
			}
    	}
    }

    public function actionValidar_edicion(){
    	if( isset($_POST['pass']) ){
    		$p = $_POST['pass'];

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

			echo json_encode(2);
			return;		
    	}
    }

    public function actionSubir_notas(){
    	if( isset($_POST['lista']) ){
    		$lista = $_POST['lista'];
    		$asi = $_POST['asi'];
    		$mat = $_POST['mat'];
    		$a = Matricula::model()->findByPk($mat);
    		$a->mat_asistencia_1 = $asi;
    		$a->update();

    		foreach ($lista as $key => $l) {
    			$eva = EvaHogar::model()->findByPk($l['eva_id']);
    			if( $l['nota1'] != "" ){
    				$eva->eh_eva1 = Parametro::model()->findByAttributes(array('par_descripcion' => $l['nota1']))->par_id;
    			} else{
    				$eva->eh_eva1 = null;
    			}
    			if( $l['nota2'] != "" ){
    				$eva->eh_eva2 = Parametro::model()->findByAttributes(array('par_descripcion' => $l['nota2']))->par_id;
    			} else{
    				$eva->eh_eva2 = null;
    			}
    			if( $l['nota3'] != "" ){
    				$eva->eh_eva3 = Parametro::model()->findByAttributes(array('par_descripcion' => $l['nota3']))->par_id;
    			} else{
    				$eva->eh_eva3 = null;
    			}
    			$eva->update();
    		}

    	}
    }

}