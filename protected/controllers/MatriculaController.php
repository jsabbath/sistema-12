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
				'actions'=>array('index','view','retirar','buscar_alum','buscar_rut','retirar','addcurso','infoCurso','listaCompleta', 'menu','subir_xml','subir_archivo','informe_notas_par','informe','curso_par','cur_not'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','retirar','buscar_alum','buscar_rut','retirar','addcurso','infoCurso','listaCompleta', 'menu','subir_xml','subir_archivo','informe_manual','informe_notas_par','informe','curso_par','cur_not'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','retirar','buscar_alum','buscar_rut','retirar','addcurso','infoCurso','listaCompleta', 'menu','subir_xml','subir_archivo','informe_notas_par','informe','curso_par','cur_not'),
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

                //todo los textos a mayuscula
                $alumno->alum_nombres = strtoupper($alumno->alum_nombres);
                $alumno->alum_apepat = strtoupper($alumno->alum_apepat);
                $alumno->alum_apemat = strtoupper($alumno->alum_apemat);
                $alumno->alum_direccion = strtoupper($alumno->alum_direccion);
                $alumno->alum_salud = strtoupper($alumno->alum_salud);

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
        $ciudad = CHtml::listData(Ciudad::model()->findAll('ciu_reg=:id', array(':id' => $alumno->alum_region)), 'ciu_id', 'ciu_descripcion');
        $comuna = CHtml::listData(Comuna::model()->findAll('com_ciu=:id', array(':id' => $alumno->alum_ciudad)), 'com_id', 'com_descripcion');


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
                        $this->redirect(array('listaCompleta'));  
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
            'comuna'=>$comuna,
            'ciudad'=>$ciudad,
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

       
        foreach ($curso as $key => $c) {
            $cur[] = array(
                   'cur_nivel' => $nivel[$c->cur_nivel],
                    'cur_id' => $c->cur_id,
                    'cur_letra' => $letra[$c->cur_letra],
                );
        }

        sort($cur);

        $cursos_actuales = array();
        foreach ($cur as $key => $c) {
            $cursos_actuales[$c['cur_id']] = $c['cur_nivel']." ".$c['cur_letra'];
        }

        return $cursos_actuales;


    }

    //funcion para asignar un alumno a un curso y ademas asignarle las notas y las asignaturas asociadas al curso
    public function actionAddcurso($id){

        $ano = $this->actionAnoactual();
        $cursos = $this->actionCursoAnoActual();

        $informe = CHtml::listData(InformeDesarrollo::model()->findAll(),'id_id','id_descripcion');

        if(isset($_POST['id_curso'])){
            $id_curso = $_POST['id_curso'];
           

            // busca todas las asignaturas asignadas al curso
            $asignadas = AAsignatura::model()->findAll(array('condition' => 'aa_curso=:x', 'params' => array(':x' => $id_curso )));
            if($asignadas){
                $esta_matriculado = Notas::model()->findAll(array('condition' => 'not_mat=:x', 'params' => array(':x' => $id )));

                if( !$esta_matriculado ){
                    $curso = Curso::model()->findByPk($id_curso);
                    $cole = Colegio::model()->find();
                    $tipo_periodo = Parametro::model()->findByPk($cole->col_periodo);
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

                    Yii::app()->user->setFlash(TbHtml::ALERT_COLOR_SUCCESS, "Alumno ingresado");
                    $this->refresh(); 
                    
                }else{
                    Yii::app()->user->setFlash('error', "Este Alumno ya esta Matriculado!");
                  $this->refresh(); 
                }
            } else {
                Yii::app()->user->setFlash('error', "Este curso no Tiene Asignaturas!");
               $this->refresh(); 
            }
          
        }
        




        /**

        */


        if(Yii::app()->user->checkAccess('administrador') OR Yii::app()->user->isSuperAdmin){
             $this->render('cur_link', array(
                    'cur' => $cursos,
                    'informe' => $informe,
            ));

        } else if (Yii::app()->user->checkAccess('jefe_utp') OR Yii::app()->user->checkAccess('evaluador') OR
                    Yii::app()->user->checkAccess('director') ){

            $usuario = Usuario::model()->findByAttributes(array( 'usu_iduser' => Yii::app()->user->id ));


              $this->render('cur_link', array(
                    //'nombre' => $usuario['Nombrecorto'],
                    'cur' => $cursos,
                    'informe' => $informe,
                ));

        } else if( Yii::app()->user->checkAccess('profesor') ){
            $profe = Usuario::model()->findByAttributes(array( 'usu_iduser' => Yii::app()->user->id ));
            $id_profe = $profe['usu_id'];

            $es_profe_jefe = Curso::model()->findAll(array('condition' => 'cur_ano=:x AND cur_pjefe=:y',
                                                            'params'=> array(':x' => $ano, ':y' => Yii::app()->user->id )));

            $id_cur = array(); //  se arma un array con  los cursos que tiene el profe

             if( $es_profe_jefe ){
                // se agregan cursos si  es q es profe jefe
                foreach ( $es_profe_jefe as $c ){
                    $id_cur[] = $c->cur_id;
                }
            } else {
                throw new CHttpException(404,'Usted no tiene Cursos.');
                return;
            }

                $nivel = CHtml::listData(Parametro::model()->findAll(array('condition'=>'par_item="nivel"')),'par_id','par_descripcion');
                $letra = CHtml::listData(Parametro::model()->findAll(array('condition'=>'par_item="letra"')),'par_id','par_descripcion');

                $criteria = new CDbCriteria();
                $criteria->addInCondition('cur_id', $id_cur, 'OR');
                $cur = Curso::model()->findAll($criteria);
                // se filtran los cursos por el año  seleccionado
                $cursos = array();
                for ($i=0; $i < count($cur); $i++) { 
                    if($cur[$i]->cur_ano == $ano ){
                        $cursos[$cur[$i]->cur_id] = "".$nivel[$cur[$i]->cur_nivel]." ".$letra[$cur[$i]->cur_letra];
                    }
                }

                $this->render('cur_link', array(
                    'cur' => $cursos,
                    'informe' => $informe,
                ));
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


    public function actionCertificado_nota_par($id, $p){
        $model = $this->loadModel($id);
        $notas = array();

        $evaluaciones = Notas::model()->findAll(array('condition' => 'not_mat=:x AND not_periodo=:y','params' =>  array( ':x' => $id, ':y' => $p )));

        if( empty($evaluaciones) ){
           throw new CHttpException(404, 'Alumno sin Curso.');
        }
        foreach ($evaluaciones as $key => $alum) {

            $asi = Asignatura::model()->findByPk($alum->not_asig);

            $notas[] = array(
                  'nota'    => $alum->notas,
                  'nom_asi' => $asi->asi_descripcion,
                );

        }
        $alumnos = array_unique($notas, SORT_REGULAR);

        //$c = AAsignatura::model()->findByAttributes(array('aa_asignatura' => $evaluaciones[0]['not_asig']));
        $cur_list = ListaCurso::model()->findByAttributes(array('list_mat_id' => $id));

        $ano = $evaluaciones[0]['not_ano'];
        $curso  = Curso::model()->findByPk($cur_list->list_curso_id);
        $profe = Usuario::model()->findByAttributes(array('usu_iduser' => $curso->cur_pjefe));
        $notas_periodo = $curso->cur_notas_periodo;
        $nivel = Parametro::model()->findByPk($curso->cur_nivel)->par_descripcion;
        $letra = Parametro::model()->findByPk($curso->cur_letra)->par_descripcion;
        $cole = Colegio::model()->find();
        $nombre_dir = Usuario::model()->findByPk($cole->col_nombre_director);

        $mPDF1 = Yii::app()->ePdf->mpdf();
        $mPDF1 = Yii::app()->ePdf->mpdf('', 'A4');

        $mPDF1->SetFooter('San Pedro de la Paz '.date('d-m-Y'));
        $mPDF1->WriteHTML($stylesheet, 2);
        $mPDF1->WriteHTML($this->renderPartial('inf_not_par', array(
                                                                'model'         => $model,
                                                                'notas'         => $alumnos,
                                                                'curso_nombre'  => $nivel. " ". $letra,
                                                                'max_not'       => $notas_periodo,
                                                                'periodo'       => $p,
                                                                'profe'         => $profe->NombreCompleto,
                                                                'ano'           => $ano,
                                                                'nom_director'  => $nombre_dir->nombreCompleto,
                                                                'firma_profe'   => $profe->usu_firma,
                                                                'firma_dir'     => $nombre_dir->usu_firma,
                                                                'cole'          => $cole,
                        ), true));
        $mPDF1->Output();        

    }

    public function actionCurso_par(){
        $curso = $this->actionCursoAnoActual();

        $cole = Colegio::model()->find();
        $per = Parametro::model()->findByPk($cole->col_periodo);


        $this->render('cur_per',array(
                        'cursos' => $curso,
                        'per' => $per->par_descripcion,
                    ));
   
        
    }

        // id = alumno , p = periodo
    public function actionCur_not(){
        if( isset($_POST['id_cur'],$_POST['id_p']) ){

            $id = $_POST['id_cur'];
            $p = $_POST['id_p'];
            $curso = Curso::model()->findByPk($id);
            $cole = Colegio::model()->find();

           
            $lista = ListaCurso::model()->findAll(array('condition' => 'list_curso_id=:x','params' =>array(':x' => $id)));

            $alumnos = array();

             $mPDF1 = Yii::app()->ePdf->mpdf();
            $mPDF1 = Yii::app()->ePdf->mpdf('', 'A4');

            foreach ($lista as $key => $alum) {
                $alumnos[] = array('id' => $alum->list_mat_id);
                // $mPDF1->AddPage();
                // $this->actionCertificado_nota_par_cur($alum->list_mat_id, 1);
            }
       


            //$c = AAsignatura::model()->findByAttributes(array('aa_asignatura' => $evaluaciones[0]['not_asig']));
            // $ano = $evaluaciones[0]['not_ano'];            
            $profe = Usuario::model()->findByAttributes(array('usu_iduser' => $curso->cur_pjefe));
            $notas_periodo = $curso->cur_notas_periodo;
            $nivel = Parametro::model()->findByPk($curso->cur_nivel)->par_descripcion;
            $letra = Parametro::model()->findByPk($curso->cur_letra)->par_descripcion;
           
            $nombre_dir = Usuario::model()->findByPk($cole->col_nombre_director);

            $mPDF1->SetFooter('San Pedro de la Paz '.date('d-m-Y'));
            
            $mPDF1->WriteHTML($stylesheet, 2);
            $mPDF1->WriteHTML($this->renderPartial('inf_not_par_cur', array(
                                                                    'lista_alu'     => $alumnos,
                                                                    //'model'         => $model,
                                                                    //'notas'         => $alumnos,
                                                                    'curso_nombre'  => $nivel. " ". $letra,
                                                                    'max_not'       => $notas_periodo,
                                                                    'periodo'       => $p,
                                                                    'profe'         => $profe->NombreCompleto,
                                                                    // 'ano'           => $ano,
                                                                    'nom_director'  => $nombre_dir->nombreCompleto,
                                                                    'firma_profe'   => $profe->usu_firma,
                                                                    'firma_dir'     => $nombre_dir->usu_firma,
                                                                    'cole'          => $cole,
                            ), true));

            $mPDF1->Output();  

        }else{
        	 Yii::app()->user->setFlash('error', "seleccion un Periodo!");

        	  $curso = $this->actionCursoAnoActual();
        	  $this->render('cur_per',array(
                        'cursos' => $curso,
                    ));
        }
    }

    public function actionInforme_notas_par(){
        $estado = Parametro::model()->findAll(array('condition'=>'par_descripcion="ACTIVO"'));
        $lista = CHtml::listData(ListaCurso::model()->findAll(),'list_mat_id','list_curso_id');
        $ano = $this->actionAnoactual();
        $model = new Matricula('search');
        $model->unsetAttributes();  // clear any default values

     	$cole = Colegio::model()->find();
        $per = Parametro::model()->findByPk($cole->col_periodo);
        
        if (isset($_GET['Matricula'])) $model->attributes = $_GET['Matricula'];
        $this->render('informe_not_par', array(
            'model' => $model,
            'lista' => $lista,
            'estado' => $estado,
            'p'	=> $per->par_descripcion,
            'ano' => $ano,
        ));
    }


    public function actionSubir_xml(){
        $this->render('subir_xml');

    }

    public function actionSubir_archivo(){
        if( isset( $_FILES['xmlfile']) ){

            $upload = (object) $_FILES['xmlfile'];
            $xml_string = $upload->error ? NULL : simplexml_load_file($upload->tmp_name);
            
            //$xml = simplexml_load_string($xml_string);
            $json = json_encode($xml_string);
            $año = json_decode($json,TRUE);
            

            //echo $json;
            foreach ($año as $key => $a) {
                foreach ($a as $key => $l) {
                if( $key == "tipo_ensenanza" ){
                    foreach ($l as $key => $k) {
                    foreach ($k as $key => $value) { // todos los cursos
                        if( $key != "codigo" OR $key == "0"){
                            $nivel = $value['@attributes']['grado'];
                            $letra = $value['@attributes']['letra'];

                            foreach ($value as $key => $curso) {
                            if( $key == 'alumno' ){
                                foreach ($curso as $key => $alumno) {
                                    $alu = $alumno['@attributes'];
                                    $niv = $this->nivelCurso($nivel);

                            
                                    $id_niv = Parametro::model()->findByAttributes(array('par_item' => 'nivel',
                                                                                        'par_descripcion' => $niv ));
                                    $id_let = Parametro::model()->findByAttributes(array('par_item' => 'letra',
                                                                                        'par_descripcion' => $letra ));
                                    

                                    $cu = Curso::model()->findByAttributes(array('cur_nivel'=> $id_niv->par_id,
                                                                                 'cur_letra'=> $id_let->par_id));

                                
                                    if( $alu['genero'] = "M" ){
                                        $gene = Parametro::model()->find(array('condition'=>'par_item="SEXO" AND par_descripcion="MASCULINO"'));
                                    } else{
                                        $gene = Parametro::model()->find(array('condition'=>'par_item="SEXO" AND par_descripcion="FEMENINO"'));
                                    }
                                    
                                    $rut =  $alu['run']."-". $alu['digito_ve'];


                                    $existe_alumno = Alumno::model()->findByAttributes(array('alum_rut' => $rut));
                                    if(!$existe_alumno){
                                        
                                        $id_curso = $cu->cur_id;
                                       
                                        $nombres =  $alu['nombres'];
                                        $genero = $gene->par_id;
                                        $ape_pa = $alu['ape_paterno'];
                                        $ape_mat = $alu['ape_materno'];
                                        $dir = $alu['direccion'];
                                        $f_naci = $alu['fecha_nacimiento'];
                                        $f_incri = $alu['fecha_incorporacion_curso'];
                                        $comuna = $alu['comuna_residencia'];
                                        echo $nombres."<br>";
                                        $this->matricular_alumno($id_curso,$rut,$nombres,
                                                                        $genero,$ape_pa,$ape_mat,$dir,
                                                                        $f_naci,$f_incri,$comuna);
                                    } else{
                                        echo "-alumno ya en sistema<br>";
                                    }
                                            
                                       
                                
                            }}}}
                               

                           
                        }
                    }
                    }
                }
                 
               
            }

            $this->render('menu');

        }
    }


    function nivelCurso($nivel){
        if( $nivel == 1 ){
            return "PRIMERO";
        }
        if( $nivel == 2 ){
            return "SEGUNDO";
        } 
        if( $nivel == 3 ){
            return "TERCERO";
        } 
        if( $nivel == 4 ){
            return "CUARTO";
        } 
        if( $nivel == 5 ){
            return "QUINTO";
        } 
        if( $nivel == 6 ){
            return "SEXTO";
        } 
        if( $nivel == 7 ){
            return "SEPTIMO";
        } 
        if( $nivel == 8 ){
            return "OCTAVO";
        }
        RETURN;
    }

    function matricular_alumno( $id_curso,$rut,$nombres,$genero,$ape_pa,
                                    $ape_mat,$dir,$f_naci,$f_incri,$comuna ){

        set_time_limit(30);
        $matricula = new Matricula;
        $alumno = new Alumno;
        $estado = Parametro::model()->find(array('condition'=>'par_item="ESTADO" AND par_descripcion="ACTIVO"'));

        $matricula->mat_estado = $estado->par_id; 
        $matricula->mat_alu_id = 1; //el 1 esta por que debe haber un registro previo para ingresar una foreign key
        $matricula->mat_ano = date('Y');
        $matricula->mat_fingreso = $f_incri;
        
        if ($matricula->validate()){

            //todo los textos a mayuscula
            $alumno->alum_nombres = strtoupper($nombres);
            $alumno->alum_apepat = strtoupper($ape_pa);
            $alumno->alum_apemat = strtoupper($ape_mat);
            $alumno->alum_direccion = strtoupper($dir);
            $alumno->alum_rut = $rut;
            $alumno->alum_genero = $genero;
            $alumno->alum_f_nac = $f_naci;


            if($alumno->insert()){
                $matricula->mat_alu_id = $alumno->alum_id; //aqui se actualiza la foreign key
                if ($matricula->insert()) {

                    $asignadas = AAsignatura::model()->findAll(array('condition' => 'aa_curso=:x', 'params' => array(':x' => $id_curso )));
                    $curso = Curso::model()->findByPk($id_curso);
                    $cole = Colegio::model()->find();
                    $tipo_periodo = Parametro::model()->findByPk($cole->col_periodo);
                    $id_inf = $curso->cur_infd;

                    // SEMESTRE (SACADO  DE LA TABLA PARAMETRO NO CAMBIAR) ;
                    if( $tipo_periodo->par_descripcion == 'SEMESTRE' ){
                        for ($i=1; $i <= 2 ; $i++) {
                            foreach ( $asignadas as $p ){
                                $nota = new Notas;
                                $nota->not_asig = $p->aa_asignatura;
                                $nota->not_mat = $matricula->mat_id;
                                $nota->not_ano = date('Y');
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
                                $nota->not_mat = $matricula->mat_id;
                                $nota->not_ano = date('Y');
                                $nota->not_periodo = $i;
                                $nota->insert();
                            }
                        }
                    }

                    //  se cuenta el numero de alumnos que tiene el curso
                    $numero_alumnos = ListaCurso::model()->countByAttributes(array('list_curso_id' => $id_curso));

                    $lista_alumnos = new ListaCurso;
                    $lista_alumnos->list_curso_id = $id_curso;
                    $lista_alumnos->list_mat_id = $matricula->mat_id;
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
                        $evaluacion->eva_matricula = $matricula->mat_id;
                        $evaluacion->eva_ano = $curso->cur_ano;
                        $evaluacion->save();
                    }

                    echo "good<br>";

                } else{
                    echo "matricula-unsave <br>";
                }
                  
            } else{

                echo "alum-unsave<br>";
           
            }
        } else{
            echo "matricula-invalida <br>";
        }
         
    }

    // function para agregar los alumnos al informe de personalidad manualmente
    public function actionInforme_manual(){
        $ano = $this->actionAnoactual();
        $count = 0;
       

          $matriculas = Matricula::model()->findAll(array('condition' => 'mat_ano = "'.$ano.'"'));
          foreach ($matriculas as $key => $m) {
          	 //set_time_limit(30);
                $tiene_ev = Evaluacion::model()->findByAttributes(array('eva_matricula' => $m->mat_id));

                if( !$tiene_ev ){
                    $cur_list = ListaCurso::model()->findByAttributes(array('list_mat_id' => $m->mat_id));
                    //$aa = AAsignatura::model()->findByAttributes(array('aa_asignatura' => $notas->not_asig));
                    $curso = Curso::model()->findByPk($cur_list->list_curso_id);

                    //asignar informe de desarrollo
                    $criteria = new CDbCriteria();
                    $criteria->join = 'LEFT JOIN area ON area.are_id = t.con_area';
                    $criteria->condition = 'area.are_infd=:value';
                    $criteria->params = array(":value"=>$curso->cur_infd);
                    $con = Concepto::model()->findAll($criteria);
                    foreach ($con as $n) {
                        $evaluacion = new Evaluacion;
                        $evaluacion->eva_concepto = $n->con_id;
                        $evaluacion->eva_matricula = $m->mat_id;
                        $evaluacion->eva_ano = $curso->cur_ano;
                        $evaluacion->save();
                    }
                    $count++;


                } else{
                    echo "ya tiene eva";
                }

          }

            echo $count;  

    }

}