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
				'actions'=>array('index','view','retirar','buscar_alum','buscar_rut','retirar',
                                'addcurso','infoCurso','listaCompleta', 'menu','subir_xml','subir_archivo',
                                'informe_notas_par','informe','curso_par','cur_not','menu_2'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','retirar','buscar_alum','buscar_rut','retirar',
                                'addcurso','infoCurso','listaCompleta', 'menu','subir_xml','subir_archivo',
                                'informe_manual','informe_notas_par','informe','curso_par','cur_not','menu_2'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','retirar','buscar_alum','buscar_rut','retirar','addcurso',
                                'infoCurso','listaCompleta', 'menu','subir_xml','subir_archivo','informe_notas_par',
                                'informe','curso_par','cur_not','menu_2'),
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
        $notas1 = Notas::model()->findAll(array('condition'=>'not_mat=:x AND not_periodo=1','params'=>array(':x'=>$id)));
        $notas2 = Notas::model()->findAll(array('condition'=>'not_mat=:x AND not_periodo=2','params'=>array(':x'=>$id)));
        $curso = ListaCurso::model()->findByAttributes(array('list_mat_id'=>$id));

		$this->render('view',array(
			'model'=>$this->loadModel($id),
            'notas1'=>$notas1,
            'notas2'=>$notas2,
            'curso'=>$curso,
		));
	}

    public function actionMenu(){
        $this->render('menu');
    }
    public function actionMenu_2(){
        $this->render('menu_2');
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
        $religion = CHtml::listData(Parametro::model()->findAll(array('condition'=>'par_item="religion_alum"')), 'par_id', 'par_descripcion');
        $trans = CHtml::listData(Parametro::model()->findAll(array('condition'=>'par_item="TRANSPORTE_ALUM"')), 'par_id', 'par_descripcion');
        $otro = Parametro::model()->find(array('condition'=>'par_item="TRANSPORTE_ALUM" AND par_descripcion="otro"'));
        $estado = Parametro::model()->findAll(array('condition'=>'par_item="ESTADO" AND par_descripcion="ACTIVO"'));
        $vivienda = CHtml::listData(Parametro::model()->findAll(array('condition'=>'par_item="vivienda_alum"')), 'par_id', 'par_descripcion');
        $constru = CHtml::listData(Parametro::model()->findAll(array('condition'=>'par_item="constru_alum"')), 'par_id', 'par_descripcion');
        $baño_tipo = CHtml::listData(Parametro::model()->findAll(array('condition'=>'par_item="baño_alum"')), 'par_id', 'par_descripcion');
        $nivel_edu = CHtml::listData(Parametro::model()->findAll(array('condition'=>'par_item="edu_nivel"')), 'par_id', 'par_descripcion');
		$vive_con = CHtml::listData(Parametro::model()->findAll(array('condition'=>'par_item="alum_vive"')), 'par_id', 'par_descripcion');
		$otro_vive = Parametro::model()->find(array('condition'=>'par_item="alum_vive" AND par_descripcion="otro"'));


        if (isset($_POST['Matricula'], $_POST['Alumno'])) {
            $model->attributes = $_POST['Matricula'];
            $alumno->attributes = $_POST['Alumno'];
            if( $alumno->alum_id ){ // el alumno ya existe por lo q se actualiza su tupla existente
                $old_alum = Alumno::model()->findByPk($alumno->alum_id);
                $old_alum->attributes = $alumno->attributes;
            }
            $model->mat_alu_id = 1; //el 1 esta por que debe haber un registro previo para ingresar una foreign key
            $model->mat_ano = date('Y');
			$model->mat_documentos = mb_strtoupper($model->mat_documentos,'utf-8');
            if( !isset($model->mat_fingreso) ) $model->mat_fingreso = date('Y-m-d');
            $valid = $model->validate();
            $valid = $alumno->validate() && $valid;
            if ($valid){
                //todo los textos a mayuscula
				$alumno->alum_nombres = mb_strtoupper($alumno->alum_nombres,'utf-8');
                $alumno->alum_apepat = mb_strtoupper($alumno->alum_apepat,'utf-8');
                $alumno->alum_apemat = mb_strtoupper($alumno->alum_apemat,'utf-8');
                $alumno->alum_direccion = mb_strtoupper($alumno->alum_direccion,'utf-8');
                $alumno->alum_salud = mb_strtoupper($alumno->alum_salud,'utf-8');
                $alumno->alum_medicamentos = mb_strtoupper($alumno->alum_medicamentos,'utf-8');
                $alumno->alum_enfermedad = mb_strtoupper($alumno->alum_enfermedad,'utf-8');
                $alumno->alum_aprendizaje = mb_strtoupper($alumno->alum_aprendizaje,'utf-8');
				$alumno->alum_fonos_emergencia = mb_strtoupper($alumno->alum_fonos_emergencia,'utf-8');
				$alumno->alum_madre_nombre = mb_strtoupper($alumno->alum_madre_nombre,'utf-8');
				$alumno->alum_madre_actividad = mb_strtoupper($alumno->alum_madre_actividad,'utf-8');
				$alumno->alum_madre_act_tipo = mb_strtoupper($alumno->alum_madre_act_tipo,'utf-8');
				$alumno->alum_padre_nombre = mb_strtoupper($alumno->alum_padre_nombre,'utf-8');
				$alumno->alum_padre_rut = mb_strtoupper($alumno->alum_padre_rut,'utf-8');
				$alumno->alum_padre_actividad = mb_strtoupper($alumno->alum_padre_actividad,'utf-8');
				$alumno->alum_padre_act_tipo = mb_strtoupper($alumno->alum_padre_act_tipo,'utf-8');
				$alumno->alum_apo1_nombre = mb_strtoupper($alumno->alum_apo1_nombre,'utf-8');
				$alumno->alum_apo2_nombre = mb_strtoupper($alumno->alum_apo2_nombre,'utf-8');
				$alumno->alum_fam1_actividad = mb_strtoupper($alumno->alum_fam1_actividad,'utf-8');
				$alumno->alum_fam1_lugar = mb_strtoupper($alumno->alum_fam1_lugar,'utf-8');
				$alumno->alum_fam2_actividad = mb_strtoupper($alumno->alum_fam2_actividad,'utf-8');
				$alumno->alum_fam2_lugar = mb_strtoupper($alumno->alum_fam2_lugar,'utf-8');

                if( !$alumno->alum_id  ){ // si la id no viene, osea es una alumno nuevo
                    if($alumno->save()){ // alumno Nuevo, no  tenia datos existentes
                        $model->mat_alu_id = $alumno->alum_id; //aqui se actualiza la foreign key
                        $model->mat_estado = $estado[0]->par_id;
                        if ($model->save()) {
                            $this->redirect(array('addcurso', 'id' => $model->mat_id));
                        }
                    }
                } else{
                     if($old_alum->update()){ // alumno Viejo, tenia datos existentes
                        $model->mat_alu_id = $old_alum->alum_id; //aqui se actualiza la foreign key
                        $model->mat_estado = $estado[0]->par_id;
                        if ($model->save()) {
                            $this->redirect(array('addcurso', 'id' => $model->mat_id));
                        }

                    }
                }


            }
        }

        $this->render('create', array(
            'model' => $model,
            'alumno' => $alumno,
            'region'=>$region,
            'religion' => $religion,
            'otro' => $otro,
            'trans' => $trans,
            'genero'=>$genero,
            'vivienda' => $vivienda,
            'constru' => $constru,
            'baño_tipo' => $baño_tipo,
            'nivel_edu' => $nivel_edu,
			'vive_con'	=> $vive_con,
			'otro_vive'	=> $otro_vive,
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
        $religion = CHtml::listData(Parametro::model()->findAll(array('condition'=>'par_item="religion_alum"')), 'par_id', 'par_descripcion');
        $region = CHtml::listData(Region::model()->findAll(), 'reg_id', 'reg_descripcion');
        $ciudad = CHtml::listData(Ciudad::model()->findAll('ciu_reg=:id', array(':id' => $alumno->alum_region)), 'ciu_id', 'ciu_descripcion');
        $comuna = CHtml::listData(Comuna::model()->findAll('com_ciu=:id', array(':id' => $alumno->alum_ciudad)), 'com_id', 'com_descripcion');
        $genero = CHtml::listData(Parametro::model()->findAll(array('condition'=>'par_item="SEXO"')), 'par_id', 'par_descripcion');
        $estado = CHtml::listData(Parametro::model()->findAll(array('condition'=>'par_item="ESTADO"')),'par_id','par_descripcion');
        $trans = CHtml::listData(Parametro::model()->findAll(array('condition'=>'par_item="TRANSPORTE_ALUM"')), 'par_id', 'par_descripcion');
        $otro = Parametro::model()->find(array('condition'=>'par_item="TRANSPORTE_ALUM" AND par_descripcion="otro"'));
        $vivienda = CHtml::listData(Parametro::model()->findAll(array('condition'=>'par_item="vivienda_alum"')), 'par_id', 'par_descripcion');
        $constru = CHtml::listData(Parametro::model()->findAll(array('condition'=>'par_item="constru_alum"')), 'par_id', 'par_descripcion');
        $baño_tipo = CHtml::listData(Parametro::model()->findAll(array('condition'=>'par_item="baño_alum"')), 'par_id', 'par_descripcion');
        $nivel_edu = CHtml::listData(Parametro::model()->findAll(array('condition'=>'par_item="edu_nivel"')), 'par_id', 'par_descripcion');
		$vive_con = CHtml::listData(Parametro::model()->findAll(array('condition'=>'par_item="alum_vive"')), 'par_id', 'par_descripcion');
        $otro_vive = Parametro::model()->find(array('condition'=>'par_item="alum_vive" AND par_descripcion="otro"'));

        if (isset($_POST['Matricula'], $_POST['Alumno'])) {
            $model->attributes = $_POST['Matricula'];
            $alumno->attributes = $_POST['Alumno'];
			$model->mat_documentos = mb_strtoupper($model->mat_documentos,'utf-8');

            $valid = $model->validate();
            $valid = $alumno->validate() && $valid;
            if ($valid){

                $alumno->alum_nombres = mb_strtoupper($alumno->alum_nombres,'utf-8');
                $alumno->alum_apepat = mb_strtoupper($alumno->alum_apepat,'utf-8');
                $alumno->alum_apemat = mb_strtoupper($alumno->alum_apemat,'utf-8');
                $alumno->alum_direccion = mb_strtoupper($alumno->alum_direccion,'utf-8');
                $alumno->alum_salud = mb_strtoupper($alumno->alum_salud,'utf-8');
                $alumno->alum_medicamentos = mb_strtoupper($alumno->alum_medicamentos,'utf-8');
                $alumno->alum_enfermedad = mb_strtoupper($alumno->alum_enfermedad,'utf-8');
                $alumno->alum_aprendizaje = mb_strtoupper($alumno->alum_aprendizaje,'utf-8');
				$alumno->alum_fonos_emergencia = mb_strtoupper($alumno->alum_fonos_emergencia,'utf-8');
				$alumno->alum_madre_nombre = mb_strtoupper($alumno->alum_madre_nombre,'utf-8');
				$alumno->alum_madre_actividad = mb_strtoupper($alumno->alum_madre_actividad,'utf-8');
				$alumno->alum_madre_act_tipo = mb_strtoupper($alumno->alum_madre_act_tipo,'utf-8');
				$alumno->alum_padre_nombre = mb_strtoupper($alumno->alum_padre_nombre,'utf-8');
				$alumno->alum_padre_rut = mb_strtoupper($alumno->alum_padre_rut,'utf-8');
				$alumno->alum_padre_actividad = mb_strtoupper($alumno->alum_padre_actividad,'utf-8');
				$alumno->alum_padre_act_tipo = mb_strtoupper($alumno->alum_padre_act_tipo,'utf-8');
				$alumno->alum_apo1_nombre = mb_strtoupper($alumno->alum_apo1_nombre,'utf-8');
				$alumno->alum_apo2_nombre = mb_strtoupper($alumno->alum_apo2_nombre,'utf-8');
				$alumno->alum_fam1_actividad = mb_strtoupper($alumno->alum_fam1_actividad,'utf-8');
				$alumno->alum_fam1_lugar = mb_strtoupper($alumno->alum_fam1_lugar,'utf-8');
				$alumno->alum_fam2_actividad = mb_strtoupper($alumno->alum_fam2_actividad,'utf-8');
				$alumno->alum_fam2_lugar = mb_strtoupper($alumno->alum_fam2_lugar,'utf-8');

                if($alumno->save()){
                    if ($model->save()) {
                        $this->redirect(array('listaCompleta'));
                    }
                }
            } else {
                //Yii::app()->user->setFlash('error', "error!");
            }
        }
        $this->render('update', array(
                        'model' => $model,
                        'alumno' => $alumno,
                        'religion' => $religion,
                        'region'=>$region,
                        'genero'=>$genero,
                        'estado'=>$estado,
                        'comuna'=>$comuna,
                        'ciudad'=>$ciudad,
                        'trans' => $trans,
                        'otro' => $otro,
                        'vivienda' => $vivienda,
                        'constru' => $constru,
                        'baño_tipo' => $baño_tipo,
                        'nivel_edu' => $nivel_edu,
						'vive_con'	=> $vive_con,
						'otro_vive'	=> $otro_vive,

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

        if( !empty($cur) ){
            sort($cur);
        } else{
            throw new CHttpException(666,'$cur es null.  (Matricula/cursoAñoActual) : L338');
            return;
        }

        $cursos_actuales = array();
        foreach ($cur as $key => $c) {
            $cursos_actuales[$c['cur_id']] = $c['cur_nivel']." ".$c['cur_letra'];
        }

        return $cursos_actuales;


    }

    //funcion para asignar un alumno a un curso y ademas asignarle las notas y las asignaturas asociadas al curso
    public function actionAddcurso($id){


        if(isset($_POST['id_curso'])){
            $id_curso = $_POST['id_curso'];

            $ano = $this->actionAnoactual();
            $cursos = $this->actionCursoAnoActual();

            $informe = CHtml::listData(InformeDesarrollo::model()->findAll(),'id_id','id_descripcion');

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
                    $this->redirect(array('menu'));

                }else{
                    Yii::app()->user->setFlash('error', "Este Alumno ya esta Matriculado!");
                  $this->refresh();
                }
            } else {
                Yii::app()->user->setFlash('error', "Este curso no Tiene Asignaturas!");
               $this->refresh();
            }

        }


        $this->render('link_selec', array(
            'id_mat' => $id,
        ));



    }

    // muestra la lista de cursos como kinder y pre_kinder
    public function actionPre_link(){
        $ano = $this->actionAnoactual();
        $id = $_POST['id']; //  id de la matricula del alumno

        $nivel = CHtml::listData(Parametro::model()->findAll(array('condition'=>'par_item="prenivel"')),'par_id','par_descripcion');
        $letra = CHtml::listData(Parametro::model()->findAll(array('condition'=>'par_item="letra"')),'par_id','par_descripcion');

        $pre_cursos = PreCurso::model()->findAll(array('condition' => 'pre_ano=:x', 'params' => array(':x' => $ano)));

        $cursos = array();

        foreach ($pre_cursos as $key => $p) {
            $cursos[$p->pre_id] = $nivel[$p->pre_nivel]." ".$letra[$p->pre_letra];
        }



        $this->renderPartial('pre_link', array(
                'id' => $id,
                'cur' => $cursos,
        ));
    }

    public function actionPre_agregar_inf($id){
        $id_curso  = $_POST['id_curso'];

        $pre_curso = PreCurso::model()->findByPk($id_curso);
        if( $pre_curso->pre_inf != null  ){
            $esta = EvaHogar::model()->findByAttributes(array('eh_matricula' => $id));
            //asignar informe de desarrollo
            if( !$esta){
                $criteria = new CDbCriteria();
                $criteria->join = 'LEFT JOIN area_hogar ON area_hogar.ah_id = t.ch_area_hogar';
                $criteria->condition = 'area_hogar.ah_inf_hogar=:value';
                $criteria->params = array(":value"=>$pre_curso->pre_inf);
                $con = ConceptoHogar::model()->findAll($criteria);
                foreach ($con as $n) {
                    $evaluacion = new EvaHogar;
                    $evaluacion->eh_concepto = $n->ch_id;
                    $evaluacion->eh_matricula = $id;
                    $evaluacion->eh_curso = $id_curso;
                    $evaluacion->save();
                }

                Yii::app()->user->setFlash(TbHtml::ALERT_COLOR_SUCCESS, "Alumno ingresado");
                $this->redirect(array('menu'));
            }else{
                Yii::app()->user->setFlash('error', "Este Alumno ya esta Matriculado!");
                $this->render('link_selec', array(
                    'id_mat' => $id,
                ));
            }
        } else{
                Yii::app()->user->setFlash('error', "Este curso no tiene informe asignado!");
                $this->render('link_selec', array(
                    'id_mat' => $id,
                ));
        }
    }


    // muestra la lista de cursos 1 a 8 disponibles para matricular al alumno.
    public function actionCur_link(){

        $ano = $this->actionAnoactual();
        $cursos = $this->actionCursoAnoActual();

        //$informe = CHtml::listData(InformeDesarrollo::model()->findAll(),'id_id','id_descripcion');
        $id = $_POST['id']; //  id de la matricula del alumno

        if(Yii::app()->user->checkAccess('administrador') OR Yii::app()->user->isSuperAdmin){
             $this->renderPartial('cur_link', array(
                    'id' => $id,
                    'cur' => $cursos,
                    //'informe' => $informe,
            ));

        } else if (Yii::app()->user->checkAccess('jefe_utp') OR Yii::app()->user->checkAccess('evaluador') OR
                    Yii::app()->user->checkAccess('director') ){

            $usuario = Usuario::model()->findByAttributes(array( 'usu_iduser' => Yii::app()->user->id ));


              $this->renderPartial('cur_link', array(
                    //'nombre' => $usuario['Nombrecorto'],
                    'id' => $id,
                    'cur' => $cursos,
                    //'informe' => $informe,
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
				asort($cursos);
                $this->renderPartial('cur_link', array(
                    'id' => $id,
                    'cur' => $cursos,
                    //'informe' => $informe,
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
        $cursos = $this->actionCursoAnoActual();
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Matricula'])) $model->attributes = $_GET['Matricula'];
        $this->render('lista', array(
            'cursos' => $cursos,
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
        $pre_curso = EvaHogar::model()->findByAttributes(array('eh_matricula' => $data->mat_id));
        if($curso ){
            $nombre = Curso::model()->findByAttributes(array('cur_id'=>$curso[0]->list_curso_id));
            return $nombre->getCurso();
        }
        if( $pre_curso ){
            $nombre = PreCurso::model()->findByPk($pre_curso->eh_curso);
            return $nombre->getCurso();
        }

        return "SIN CURSO";
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
        $cole = Colegio::model()->find();
        //$colegio = Colegio::model()->findByAttributes(array('col_nombre_colegio'=>'COLEGIO ALBORADA'));
        $lista = ListaCurso::model()->findByAttributes(array('list_mat_id'=>$id));
        //$usuario = Usuario::model()->findByAttributes(array('usu_id'=>$cole->col_nombre_director));

        $director = Usuario::model()->findByPk($cole->col_nombre_director);
        //$director = $usuario->getNombreCompleto();
        //$curso = $lista->listCurso->getNombrecurso();
        $curso  = Curso::model()->findByPk($lista->list_curso_id);
        $nivel = Parametro::model()->findByPk($curso->cur_nivel)->par_descripcion;
        $letra = Parametro::model()->findByPk($curso->cur_letra)->par_descripcion;

        $mPDF1 = Yii::app()->ePdf->mpdf();
        $mPDF1 = Yii::app()->ePdf->mpdf('', 'A4');

        $mPDF1->SetHeader('San Pedro de la Paz '.Fecha::fecha_actual());
        $mPDF1->WriteHTML($stylesheet, 2);
        $mPDF1->WriteHTML($this->renderPartial('certificado', array(
                                'model'         =>$model,
                                'cole'          => $cole,
                                'nom_director'  => $director->nombreCompleto,
                                'firma_dir'     => $director->usu_firma,
                                'curso_nombre'  => $nivel. " ". $letra,
            ), true));
        $mPDF1->Output();
    }

    public function actionPromedio_curso_asig($id_curso,$id_asig,$p){
        $lista = ListaCurso::model()->findAll(array('condition' => 'list_curso_id=:x','params' =>  array( ':x' => $id_curso)));
        $prom_curso = 0;
        $prom_count = 0;
        $final = 0;
        $precision = 1;

        foreach ($lista as $key => $id_alum){  // se recorren los alumnos del curso para obtener su promedio

            $n = Notas::model()->findByAttributes(array('not_mat' => $id_alum->list_mat_id, 'not_asig'=> $id_asig, 'not_periodo' => $p ));

            if( $n->not_prom > 0 ){
                $prom_curso += $n->not_prom;
                $prom_count++;
            }

        }

        if( $prom_count != 0 ){
            $final = $prom_curso/$prom_count;

            if( strlen($final) == 1 ){
                $final = $final .".0";
            }else{

                $final = number_format((float) $final, $precision, '.', '');
            }
        }

        return $final;
    }


    public function actionCertificado_nota_par($id, $p){
        $model = $this->loadModel($id);
        $notas = array();

        $evaluaciones = Notas::model()->findAll(array('condition' => 'not_mat=:x AND not_periodo=:y','params' =>  array( ':x' => $id, ':y' => $p )));

        if( empty($evaluaciones) ){
           throw new CHttpException(404, 'Alumno sin Curso.');
        }

        //$c = AAsignatura::model()->findByAttributes(array('aa_asignatura' => $evaluaciones[0]['not_asig']));
        $cur_list = ListaCurso::model()->findByAttributes(array('list_mat_id' => $id));

        $ano = $evaluaciones[0]['not_ano'];
        $curso  = Curso::model()->findByPk($cur_list->list_curso_id);

        foreach ($evaluaciones as $key => $alum) { // tabla notas

            $asi = Asignatura::model()->findByPk($alum->not_asig);
            $prom = $this->actionPromedio_curso_asig($curso->cur_id,$asi->asi_id,$p);


            $notas[$asi->asi_orden] = array(
                  'nota'    => $alum->notas,
                  'prom_alu'=> $alum->not_prom,
                  'nom_asi' => $asi->asi_descripcion,
                  'prom_asi'=> $prom,
                );

        }
        ksort($notas); // se ordena por asignatura

        $alumnos = array_unique($notas, SORT_REGULAR);
        //var_dump($alumnos);

        if( $p == 1 ){
            $asi_alu = $model->mat_asistencia_1;
        }else if( $p == 2 ){
            $asi_alu = $model->mat_asistencia_2;
        }else if( $p == 3 ){
            $asi_alu = $model->mat_asistencia_3;
        }


        $profe = Usuario::model()->findByAttributes(array('usu_iduser' => $curso->cur_pjefe));
        $notas_periodo = $curso->cur_notas_periodo;
        $nivel = Parametro::model()->findByPk($curso->cur_nivel)->par_descripcion;
        $letra = Parametro::model()->findByPk($curso->cur_letra)->par_descripcion;
        $cole = Colegio::model()->find();
        $nombre_dir = Usuario::model()->findByPk($cole->col_nombre_director);

        $mPDF1 = Yii::app()->ePdf->mpdf('', 'A4');



        $mPDF1->SetHeader('Fecha de emisión '.date('d-m-Y'));
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
                                                                'asi_alu'       => $asi_alu,
                        ), true));
        $mPDF1->Output();


        $nombre_alu = $model->matAlu->alum_nombres." ".$model->matAlu->alum_apepat." ".$model->matAlu->alum_apemat;
        $p = Usuario::model()->findByAttributes(array('usu_iduser' => Yii::app()->user->id));
            if( $p ){
                $nombre = $p->NombreCompleto;
            } else{
                $nombre = "admin";
            }
        RegistroLog::registroInformeNotasAlumno($nombre_alu, $nombre);
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

        // id = curso , p = periodo
    public function actionCur_not(){
        if( isset($_POST['id_cur'],$_POST['id_p']) ){

            // llamada funcion  para mostrar informe anual estudio
            if( $_POST['id_p'] == 5 ){
                $this->actionInf_anual_cur($_POST['id_cur']);
                return;
            }

            $id = $_POST['id_cur'];
            $p = $_POST['id_p'];
            $curso = Curso::model()->findByPk($id);
            $cole = Colegio::model()->find();


            $lista = ListaCurso::model()->findAll(array('order'=>'list_posicion','condition' => 'list_curso_id=:x','params' =>array(':x' => $id)));

            $alumnos = array();

            //$mPDF1 = Yii::app()->ePdf->mpdf();
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

            $mPDF1->SetHeader('Fecha de emisión '.date('d-m-Y'));

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
                                                                    'id_cur'        => $curso->cur_id,
                            ), true));

            $mPDF1->Output();

            $pro = Usuario::model()->findByAttributes(array('usu_iduser' => Yii::app()->user->id));
                if( $pro ){
                    $nombre = $pro->NombreCompleto;
                } else{
                    $nombre = "admin";
                }
            RegistroLog::registroInformeNotasCurso($nivel." ".$letra, $nombre, $p);


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

            if($xml_string == NULL  ){
                throw new CHttpException(55, 'suba archivo (actionSubir_archivo) MatriculaController::947 ');
                return;
            }

            foreach ($xml_string as $key => $a) {

                foreach ($a as $key1 => $l) {

                if( $key1 == "tipo_ensenanza" ){
                    foreach ($l as $key2 => $curso) {    //todos los cursos---$xml_string
                        $nivel = (integer) $curso['grado'];
                        $letra = (string) $curso['letra'];

                        foreach ($curso as $key3 => $alu) { // todos alumnos--$xml_string

                            if( $key3 == 'alumno'){

                                //$niv = $this->nivelCurso($nivel); // en caso de usar niveles como palabra

                                $id_niv = Parametro::model()->findByAttributes(array('par_item' => 'NIVEL',
                                                                                    'par_descripcion' => $nivel ));
                                $id_let = Parametro::model()->findByAttributes(array('par_item' => 'LETRA',
                                                                                    'par_descripcion' => $letra ));


                                $cu = Curso::model()->findByAttributes(array('cur_nivel'=> $id_niv["par_id"],
                                                                            'cur_letra'=> $id_let["par_id"]));


                                if( $alu['genero'] == "M" ){
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
                                    echo $rut."-alumno ya en sistema<br>";
                                }



                            }
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

                    //echo "good<br>";

                } else{
                    //echo "matricula-unsave <br>";
                }

            } else{

                //echo "alum-unsave<br>";

            }
        } else{
            //echo "matricula-invalida <br>";
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

    // id = matricula id
    public function actionInf_anual_alum($id){
        $mat = $this->loadModel($id);
        $notas = array();

        $evaluaciones = Notas::model()->findAll(array('condition' => 'not_mat=:x AND not_periodo=:y','params' =>  array( ':x' => $id, ':y' => 1 )));
        $evaluaciones2 = Notas::model()->findAll(array('condition' => 'not_mat=:x AND not_periodo=:y','params' =>  array( ':x' => $id, ':y' => 2 )));

        if( empty($evaluaciones) OR empty($evaluaciones2)){
           throw new CHttpException(404, 'Alumno sin Curso.');
        }

        //$c = AAsignatura::model()->findByAttributes(array('aa_asignatura' => $evaluaciones[0]['not_asig']));
        $cur_list = ListaCurso::model()->findByAttributes(array('list_mat_id' => $id));

        $ano = $evaluaciones[0]['not_ano'];
        $curso  = Curso::model()->findByPk($cur_list->list_curso_id);

        foreach ($evaluaciones as $key => $alum) { // tabla notas
            $final = 0;

            $asi = Asignatura::model()->findByPk($alum->not_asig);
            $n2 = $evaluaciones2[$key]['notas'];
            $prom2 = $evaluaciones2[$key]['not_prom'];
            if( $prom2 > 0 AND $alum->not_prom > 0 ){
                $final = ($alum->not_prom + $prom2)/2;
            } else{
                if( $prom2 > 0 ){
                    $final = $prom2;
                }
                if( $alum->not_prom > 0){
                    $final = $alum->not_prom;
                }
            }


            if( strlen($final) == 1 ){
                $final = $final .".0";
            }else{
                $precision = 1;
                $final = number_format((float) $final, $precision, '.', '');
            }

            $notas[$asi->asi_orden] = array(
                  'nota1'   => $alum->notas,
                  'nota2'   => $n2,
                  'prom_alu'=> $alum->not_prom,
                  'prom_alu2'=>$prom2,
                  'nom_asi' => $asi->asi_descripcion,
                  'prom_f'  => $final,
                );

        }
        ksort($notas); // se ordena por asignatura

        $alumnos = array_unique($notas, SORT_REGULAR);


        $profe = Usuario::model()->findByAttributes(array('usu_iduser' => $curso->cur_pjefe));
        $notas_periodo = $curso->cur_notas_periodo;
        $nivel = Parametro::model()->findByPk($curso->cur_nivel)->par_descripcion;
        $letra = Parametro::model()->findByPk($curso->cur_letra)->par_descripcion;
        $cole = Colegio::model()->find();
        $nombre_dir = Usuario::model()->findByPk($cole->col_nombre_director);

        $mPDF1 = Yii::app()->ePdf->mpdf('', 'Legal-L');



        $mPDF1->SetHeader('Fecha de emisión '.date('d-m-Y'));
        $mPDF1->WriteHTML($stylesheet, 2);
        $mPDF1->WriteHTML($this->renderPartial('inf_anual_alum', array(
                                                                'model'         => $mat,
                                                                'notas'         => $alumnos,
                                                                'curso_nombre'  => $nivel. " ". $letra,
                                                                'max_not'       => $notas_periodo,
                                                               // 'periodo'       => $p,
                                                                'profe'         => $profe->NombreCompleto,
                                                                'ano'           => $ano,
                                                                'nom_director'  => $nombre_dir->nombreCompleto,
                                                                'firma_profe'   => $profe->usu_firma,
                                                                'firma_dir'     => $nombre_dir->usu_firma,
                                                                'cole'          => $cole,
                                                                //'asi_alu'       => $asi_alu,
                        ), true));
        $mPDF1->Output();

    }

    // id_cur = id curso;
    public function actionInf_anual_cur($id_cur){

        $lista = ListaCurso::model()->findAll(array('order'=>'list_posicion','condition' => 'list_curso_id=:x','params' =>array(':x' => $id_cur)));

        $alumnos = array();
        foreach ($lista as $key => $alum) {
            $alumnos[] = array('id' => $alum->list_mat_id);
        }




        $curso  = Curso::model()->findByPk($id_cur);



        $profe = Usuario::model()->findByAttributes(array('usu_iduser' => $curso->cur_pjefe));
        $notas_periodo = $curso->cur_notas_periodo;
        $nivel = Parametro::model()->findByPk($curso->cur_nivel)->par_descripcion;
        $letra = Parametro::model()->findByPk($curso->cur_letra)->par_descripcion;
        $cole = Colegio::model()->find();
        $nombre_dir = Usuario::model()->findByPk($cole->col_nombre_director);

        $mPDF1 = Yii::app()->ePdf->mpdf('', 'Legal-L');



        $mPDF1->SetHeader('Fecha de emisión '.date('d-m-Y'));
        $mPDF1->WriteHTML($stylesheet, 2);
        $mPDF1->WriteHTML($this->renderPartial('inf_anual_cur', array(
                                                                'alu_list'       => $alumnos,
                                                                //'notas'         => $alumnos,
                                                                'curso_nombre'  => $nivel. " ". $letra,
                                                                'max_not'       => $notas_periodo,
                                                               // 'periodo'       => $p,
                                                                'profe'         => $profe->NombreCompleto,
                                                                //'ano'           => $ano,
                                                                'nom_director'  => $nombre_dir->nombreCompleto,
                                                                'firma_profe'   => $profe->usu_firma,
                                                                'firma_dir'     => $nombre_dir->usu_firma,
                                                                'cole'          => $cole,
                                                                //'asi_alu'       => $asi_alu,
                        ), true));
        $mPDF1->Output();

    }


    public function ActionCertificado_anual(){
        $estado = Parametro::model()->findAll(array('condition'=>'par_descripcion="ACTIVO"'));
        $lista = CHtml::listData(ListaCurso::model()->findAll(),'list_mat_id','list_curso_id');
        $ano = $this->actionAnoactual();
        $model = new Matricula('search');
        $model->unsetAttributes();  // clear any default values

        $cole = Colegio::model()->find();
        $per = Parametro::model()->findByPk($cole->col_periodo);

        if (isset($_GET['Matricula'])) $model->attributes = $_GET['Matricula'];


        $cursos = $this->actionCursoAnoActual();
        $this->render('cert_anual_alum', array(
            'model' => $model,
            'lista' => $lista,
            'estado' => $estado,
            'cursos' => $cursos,
            'ano' => $ano,
        ));


    }


	public function ActionFicha(){
		$estado = Parametro::model()->findAll(array('condition'=>'par_descripcion="ACTIVO"'));
		$lista = CHtml::listData(ListaCurso::model()->findAll(),'list_mat_id','list_curso_id');
		$ano = $this->actionAnoactual();
		$model = new Matricula('search');
		$model->unsetAttributes();  // clear any default values

		$cole = Colegio::model()->find();
		$per = Parametro::model()->findByPk($cole->col_periodo);

		if (isset($_GET['Matricula'])) $model->attributes = $_GET['Matricula'];


		$cursos = $this->actionCursoAnoActual();
		$this->render('ficha', array(
			'model' => $model,
			'lista' => $lista,
			'estado' => $estado,
			'cursos' => $cursos,
			'ano' => $ano,
		));


	}

	public function actionFicha_alum($id_mat){
		$matricula = Matricula::model()->findByPk($id_mat);
		$alumno = Alumno::model()->findByPk($matricula->mat_alu_id);

		$cur_list = ListaCurso::model()->findByAttributes(array('list_mat_id' => $id_mat));

		$curso  = Curso::model()->findByPk($cur_list->list_curso_id);
		$nivel = Parametro::model()->findByPk($curso->cur_nivel)->par_descripcion;
    	$letra = Parametro::model()->findByPk($curso->cur_letra)->par_descripcion;
        $cole = Colegio::model()->find();
        $ano = $this->actionAnoactual();

 		$mPDF1 = Yii::app()->ePdf->mpdf('', 'A4');

 		$mPDF1->SetHeader('Fecha de emisión '.date('d-m-Y'));
        $mPDF1->WriteHTML($stylesheet, 2);
        $mPDF1->WriteHTML($this->renderPartial('ficha_alu', array(
                                                                'curso_nombre'	=> $nivel . $letra,
                                                                'alum'   		=> $alumno,
                                                                'cole'          => $cole,
                                                                'ano'			=> $ano,
                                                                'mat'           => $matricula,

                        ), true));
        $mPDF1->Output();
	}


	public function actionFicha_curso(){
		if( isset($_POST['id_curso']) ){
            $id_curso = $_POST['id_curso'];

            $lista =  ListaCurso::model()->findAll(array('order'=>'list_posicion',
                                                            'condition' => 'list_curso_id=:x',
                                                            'params' =>array(':x' => $id_curso)));
            foreach ($lista as $key => $alum) {
                $alumnos[] = array('id' => $alum->list_mat_id);
            }


            $curso  = Curso::model()->findByPk($id_curso);
            $nivel = Parametro::model()->findByPk($curso->cur_nivel)->par_descripcion;
            $letra = Parametro::model()->findByPk($curso->cur_letra)->par_descripcion;
            $cole = Colegio::model()->find();
            $ano = $this->actionAnoactual();

            $mPDF1 = Yii::app()->ePdf->mpdf('', 'A4');

            $mPDF1->SetHeader('Fecha de emisión '.date('d-m-Y'));
            $mPDF1->WriteHTML($stylesheet, 2);
            $mPDF1->WriteHTML($this->renderPartial('ficha_cur', array(
                                                        'curso_nombre'  => $nivel . $letra,
                                                        //'alum'          => $alumno,
                                                        'cole'          => $cole,
                                                        'ano'           => $ano,
                                                        'mat'           => $matricula,
                                                        'lista'         => $alumnos,

                            ), true));
            $mPDF1->Output();
		}
	}



}
