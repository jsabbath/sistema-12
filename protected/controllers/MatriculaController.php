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
				'actions'=>array('index','view','retirar','buscar_alum','buscar_rut','retirar','addcurso','infoCurso','listaCompleta', 'menu'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','retirar','buscar_alum','buscar_rut','retirar','addcurso','infoCurso','listaCompleta', 'menu'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','retirar','buscar_alum','buscar_rut','retirar','addcurso','infoCurso','listaCompleta', 'menu'),
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

    public function actionMenu(){
        $this->render('menu');
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
        $genero = CHtml::listData(Parametro::model()->findAll(array('condition'=>'par_item="SEXO"')), 'par_id', 'par_descripcion');
        $estado = Parametro::model()->findAll(array('condition'=>'par_item="ESTADO" AND par_descripcion="ACTIVO"'));

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        if (isset($_POST['Matricula'], $_POST['Alumno'])) {
            $model->attributes = $_POST['Matricula'];
            $alumno->attributes = $_POST['Alumno'];
            $model->mat_alu_id = 1; //el 1 esta por que debe haber un registro previo para ingresar una foreign key
            $model->mat_ano = date('Y');
            $model->mat_fingreso = date('Y-m-d');
            $valid = $model->validate();
            $valid = $alumno->validate() && $valid;
            if ($valid){
                if($alumno->save()){
                    $model->mat_alu_id = $alumno->alum_id; //aqui se actualiza la foreign key
                    $model->mat_estado = $estado[0]->par_id;
                    if ($model->save()) {
                        $this->redirect(array('addcurso', 'id' => $model->mat_id));  
                    }
                }
            }
        } 
        $this->render('create', array(
            'model' => $model,
            'alumno' => $alumno,
            'region'=>$region,
            'genero'=>$genero,
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
        $alumno = Alumno::model()->findByPk($model->mat_alu_id);
        $region = CHtml::listData(Region::model()->findAll(), 'reg_id', 'reg_descripcion');
        $genero = CHtml::listData(Parametro::model()->findAll(array('condition'=>'par_item="SEXO"')), 'par_id', 'par_descripcion');
        $estado = CHtml::listData(Parametro::model()->findAll(array('condition'=>'par_item="ESTADO"')),'par_id','par_descripcion');
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        if (isset($_POST['Matricula'], $_POST['Alumno'])) {
            $model->attributes = $_POST['Matricula'];
            $alumno->attributes = $_POST['Alumno'];
            $valid = $model->validate();
            $valid = $alumno->validate() && $valid;
            if ($valid){
                if($alumno->save()){
                    if ($model->save()) {
                        $this->redirect(array('addcurso', 'id' => $model->mat_id));  
                    }
                }
            } else {   
                Yii::app()->user->setFlash('error', "error!");
            }
        } 
        $this->render('update', array(
            'model' => $model,
            'alumno' => $alumno,
            'region'=>$region,
            'genero'=>$genero,
            'estado'=>$estado,
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

        echo CJSON::encode($resultado);
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
        if(isset($_POST['id'])){

            if( !isset($_POST['fecha']) ){
                $fecha_retiro = date("Y-m-d");
            }else{
                $fecha_retiro = $_POST['fecha'];
            }
           
            $id_alum = $_POST['id'];

            // se obtiene matricula del alumno
            $matricula = Matricula::model()->findByAttributes(array('mat_alu_id' => $id_alum, 'mat_ano' => $ano));
            $estado = Parametro::model()->findAll(array('condition'=>'par_item="ESTADO" AND par_descripcion="RETIRADO"'));

            if($matricula){
                $matricula->mat_fretiro = $fecha_retiro;
                $matricula->mat_estado = $estado[0]->par_id;

                if($matricula->save()){
                    Yii::app()->user->setFlash('success', "Alumno Retirado con Exito!");
                    
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

    //funcion para asignar un alumno a un curso y ademas asignarle las notas y las asignaturas asociadas al curso
    public function actionAddcurso($id){

        $cur = $this->actionCursoAnoActual();
        $ano = $this->actionAnoactual();

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
                    $id_inf = $curso->cur_infd;

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



                    //  se cuenta el numero de alumnos que tiene el curso
                    $numero_alumnos = ListaCurso::model()->countByAttributes(array('list_curso_id' => $id_curso));

                    $lista_alumnos = new ListaCurso;
                    $lista_alumnos->list_curso_id = $id_curso;
                    $lista_alumnos->list_mat_id = $id;
                    $lista_alumnos->list_posicion = $numero_alumnos + 1;
                    $lista_alumnos->insert();

                    //asignar informe de desarrollo
                    $criteria = new CDbCriteria();
                    $criteria->join = 'LEFT JOIN area ON area.are_id = t.con_area';
                    $criteria->condition = 'area.are_infd=:value';
                    $criteria->params = array(":value"=>$id_inf);
                    $con = Concepto::model()->findAll($criteria);
                    foreach ($con as $n) {
                        $evaluacion = new Evaluacion;
                        $evaluacion->eva_concepto = $n->con_id;
                        $evaluacion->eva_matricula = $id;
                        $evaluacion->eva_ano = $curso->cur_ano;
                        $evaluacion->save();
                    }
                    
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


    //funcion para buscar informacion de un curso cuando se matricula un alumno
    public function actionInfoCurso(){
        if(isset($_POST['id_curso'])){
            $idcurso = $_POST['id_curso'];
            
            $criteria = new CDbCriteria();
            $criteria->condition = 'cur_id=:id';
            $criteria->params = array(':id'=>$idcurso);
            $model = Curso::model()->find($criteria);
            $numero_alumnos = ListaCurso::model()->countByAttributes(array('list_curso_id' => $idcurso));

            $this->renderPartial('info_curso', array('model' => $model, 'numero' => $numero_alumnos));

        }else{
            throw new CHttpException(404, 'The requested page does not exist.');
        }

    }

    public function actionListaCompleta(){
        
        $model = new Matricula('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Matricula'])) $model->attributes = $_GET['Matricula'];
        $this->render('lista', array(
            'model' => $model,
        ));
    }

    //FUNCION PARA PONER UN LABEL PERSONALIZADO CON EL ESTADO DEL ALUMNO EN LA ACCION (MATRICULA/LISTACOMPLETA)    
    public function gridEstado($data,$row){
        
        $estado = $data->matEstado->par_descripcion;

        if($estado=='ACTIVO') return "<label class=\"label label-success\">".$estado."</label>";
        elseif($estado=='RETIRADO') return "<label class=\"label label-important\">".$estado."</label>";
        elseif($estado=='PROMOVIDO') return "<label class=\"label\">".$estado."</label>";
        elseif($estado=='REPITENTE') return "<label class=\"label label-warning\">".$estado."</label>";
        else return "<label class=\"label label-info\">".$estado."</label>";
    }

    public function obtenerCurso($data,$row){
        $curso = ListaCurso::model()->findAll(array('condition'=>'list_mat_id="'.$data->mat_id.'"'));
        if($curso != NULL){
            $nombre = Curso::model()->findByAttributes(array('cur_id'=>$curso[0]->list_curso_id));
            return $nombre->getCurso();
        }else return "SIN CURSO";
    }

    public function actionInforme(){
        $estado = Parametro::model()->findAll(array('condition'=>'par_descripcion="ACTIVO"'));
        $lista = CHtml::listData(ListaCurso::model()->findAll(),'list_mat_id','list_curso_id');
        $ano = $this->actionAnoactual();
        $model = new Matricula('search');
        $model->unsetAttributes();  // clear any default values
        
        if (isset($_GET['Matricula'])) $model->attributes = $_GET['Matricula'];
        $this->render('informe', array(
            'model' => $model,
            'lista' => $lista,
            'estado' => $estado,
            'ano' => $ano,
        ));
    }

    public function actionCertificado($id){
        $model = $this->loadModel($id);

        $mPDF1 = Yii::app()->ePdf->mpdf();
        $mPDF1 = Yii::app()->ePdf->mpdf('', 'A4');

        $mPDF1->SetFooter('San Pedro de la Paz '.date('d-m-Y'));
        $mPDF1->WriteHTML($stylesheet, 2);
        $mPDF1->WriteHTML($this->renderPartial('certificado', array('model'=>$model), true));
        $mPDF1->Output();
    }
}