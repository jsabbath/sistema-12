<?php

class MatriculaController extends Controller
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
				'actions'=>array('index','view','retirar','buscar_alum','buscar_rut','retirar','addcurso','infoCurso'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','retirar','buscar_alum','buscar_rut','retirar','addcurso','infoCurso'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','retirar','buscar_alum','buscar_rut','retirar','addcurso','infoCurso'),
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
		$model = new Matricula;
        $alumno = new Alumno;

        
        //HAY QUE HACERLO EN AJAX PARA ACTUALIZAR AUTOMATICAMENTE   
        $region = CHtml::listData(Region::model()->findAll(), 'reg_id', 'reg_descripcion');

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        if (isset($_POST['Matricula'], $_POST['Alumno'])) {
            $model->attributes = $_POST['Matricula'];
            $alumno->attributes = $_POST['Alumno'];
            $model->mat_alu_id = 1;
            $model->mat_ano = date('Y');
            $model->mat_fingreso = date('Y-m-d');
            $valid = $model->validate();
            $valid = $alumno->validate() && $valid;
            if ($valid){
                if($alumno->save()){
                    $model->mat_alu_id = $alumno->alum_id;
                    if ($model->save()) {
                        $this->redirect(array('addcurso', 'id' => $model->mat_id));  
                    }
                }
            } else {   
                Yii::app()->user->setFlash('error', "error!");
            }
        } 
        $this->render('create', array(
            'model' => $model,
            'alumno' => $alumno,
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
		$model = $this->loadModel($id);
        $alumno = new Alumno;
        $region = CHtml::listData(Region::model()->findAll(), 'reg_id', 'reg_descripcion');
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        if (isset($_POST['Matricula'],$_POST['Alumno'])) {
            $model->attributes = $_POST['Matricula'];
            $alumno->attributes = $_POST['Alumno'];
            $model->mat_alu_id = 1;
            $model->mat_ano = date('Y');
            $model->mat_fingreso = date('Y-m-d');
            $valid = $model->validate();
            $valid = $alumno->validate() && $valid;
            if ($valid){
                if($alumno->save()){
                    $model->mat_alu_id = $alumno->alum_id;
                    if ($model->save()) {
                        $this->redirect(array('view', 'id' => $model->mat_id));

                    }
                }
            }
        }
        $this->render('update', array(
            'model' => $model,
            'alumno' => $alumno,
            'region'=>$region,
        ));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id) {
        $this->loadModel($id)->delete();
        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Matricula');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }
    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Matricula('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Matricula']))
            $model->attributes = $_GET['Matricula'];
        $this->render('admin', array(
            'model' => $model,
        ));
    }
    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Matricula the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Matricula::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }
    /**
     * Performs the AJAX validation.
     * @param Matricula $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'matricula-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
    
    
    public function actionBuscar_Alum()
    {
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
                //'id_cruge' => $item->usu_iduser,
                'id'        => $item->alum_id,
                'nombres'   => $item->alum_nombres,
                'apellido'  => $item->alum_apepat,
                'rut'       => $item->alum_rut,
                'apellido2' => $item->alum_apemat,
            );
        }

        
    }
    
    public function actionBuscar_rut()
    {
        $criterio = new CDbCriteria;
        $cdtns = array();
        $resultado = array();

        if(empty($_GET['term'])) return $resultado;
        
        $cdtns[] = "LOWER(alum_rut) like LOWER(:busq)";
        
        $criterio->condition = implode(' OR ', $cdtns);
        $criterio->params = array(':busq' => '%' . $_GET['term'] . '%');
        $criterio->limit = 10;

        $data = Alumno::model()->findAll($criterio);
        
                
        foreach($data as $item) {  
            $resultado[] = array (
                //'id_cruge' => $item->usu_iduser,
                'id'        => $item->alum_id,
                'nombres'   => $item->alum_nombres,
                'apellido'  => $item->alum_apepat,
                'rut'       => $item->alum_rut,
                'apellido2' => $item->alum_apemat,
            );
        }

        echo CJSON::encode($resultado);
    }

     public function actionRetirar() {
        $ano = $this->actionAnoactual();

        // ID DEL ALUMNO
        if(isset($_POST['fecha'])){
            $fecha_retiro = $_POST['fecha'];
            $id_alum = $_POST['id'];

            // se obtiene matricula del alumno
            $matricula = Matricula::model()->findByAttributes(array('mat_alu_id' => $id_alum, 'mat_ano' => $ano));

            if($matricula){
                $matricula->mat_fretiro = $fecha_retiro;
                if($matricula->save()){
                    $alumno = Alumno::model()->findByAttributes(array('alum_id' => $id_alum ));
                    $alumno->alum_estado = 0;//RETIRADO
                    if($alumno->save()){
                         Yii::app()->user->setFlash('success', "Alumno Retirado con Exito!");
                    }
                }
            }else{
                Yii::app()->user->setFlash('error', "El alumno esta matriculado  en otro año!");
            }

        }else{
            Yii::app()->user->setFlash('notice', "Ingrese Fecha de retiro!");
        }      
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


    public function actionAddcurso($id){
        //echo "asd";
        $cur = $this->actionCursoAnoActual();
        $ano = $this->actionAnoactual();

        $evaluacion = new Evaluacion;
        $informe = CHtml::listData(InformeDesarrollo::model()->findAll(),'id_id','id_descripcion');

        if(isset($_POST['id_curso'])){
            $id_curso = $_POST['id_curso'];

            // busca todas las asignaturas asignadas al curso
            $asignadas = AAsignatura::model()->findAll(array('condition' => 'aa_curso=:x', 'params' => array(':x' => $id_curso )));
            if($asignadas){
                $esta_matriculado = Notas::model()->findAll(array('condition' => 'not_mat=:x', 'params' => array(':x' => $id )));

                if( !$esta_matriculado ){
                    $curso = Curso::model()->findByPk($id_curso);
                    $tipo_periodo = Parametro::model()->findByPk($curso->cur_tperiodo);

                    // SEMESTRE (SACADO  DE LA TABLA PARAMETRO NO CAMBIAR) ;
                    if( $tipo_periodo->par_descripcion == 'SEMESTRE' ){
                        for ($i=1; $i <= 2 ; $i++) {
                            foreach ( $asignadas as $p ){
                                $nota = new Notas;
                                $nota->not_asig = $p->aa_asignatura;
                                $nota->not_mat = $id;
                                $nota->not_ano = $ano;
                                $nota->not_periodo = $i;
                                $nota->insert();
                            }
                        }
                        // TRIMESTRE (NO CAMBIAR EN PARAMETRO)
                    } elseif ($tipo_periodo->par_descripcion == 'TRIMESTRE') {
                        for ($i=1; $i <= 3; $i++) { 
                            foreach ( $asignadas as $p ){
                                $nota = new Notas;
                                $nota->not_asig = $p->aa_asignatura;
                                $nota->not_mat = $id;
                                $nota->not_ano = $ano;
                                $nota->not_periodo = $i;
                                $nota->insert();
                            }
                        }
                    }

                    $evaluacion->eva_infd = $curso->cur_infd;
                    $evaluacion->eva_matricula = $id;
                    $evaluacion->eva_ano = $curso->cur_ano;
                    $evaluacion->save();
                }else{
                    Yii::app()->user->setFlash('error', "Este Alumno ya esta Matriculado!");
                    $this->refresh();
                }
            } else {
                Yii::app()->user->setFlash('error', "Este curso no Tiene Asignaturas!");
                $this->refresh();
            }

            $this->redirect(array('view', 'id' => $id));  
        }

        $this->render('cur_link', array(
            'cur' => $cur,
            'informe' => $informe,
        ));
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

    public function actionInfoCurso(){
        if(isset($_POST['id_curso'])){
            $idcurso = $_POST['id_curso'];

            $curso = Curso::model()->findAll(array('condition'=>'cur_id="2"'));
            $nivel = CHtml::listData(Parametro::model()->findAll(array('condition'=>'par_item="nivel"')),'par_id','par_descripcion');
            $letra = CHtml::listData(Parametro::model()->findAll(array('condition'=>'par_item="letra"')),'par_id','par_descripcion');
            $profesor = CHtml::listData(Usuario::model()->findAll(),'usu_iduser','NombreCorto');
            $infd = CHtml::listData(InformeDesarrollo::model()->findAll(),'id_id','id_descripcion');

            $informacion = array();
            $informacion['nivel'] = $nivel[$curso[0]->cur_nivel];
            $informacion['letra'] = $letra[$curso[0]->cur_letra];
            $informacion['profesor'] = $profesor[$curso[0]->cur_pjefe];
            $informacion['informe'] = $infd[$curso[0]->cur_infd];

            $this->renderPartial('info_curso', array('informacion' => $informacion));

        }else{
            throw new CHttpException(404, 'The requested page does not exist.');
        }

    }

}