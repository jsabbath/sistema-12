<?php

class NotasController extends Controller
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
				'actions'=>array('index','view','subir_notas','guardarnotas','validar_edicion'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','subir_notas','guardarnotas','validar_edicion'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','subir_notas','guardarnotas','validar_edicion'),
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
		$model=new Notas;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['Notas'])) {
			$model->attributes=$_POST['Notas'];
			if ($model->save()) {
				$this->redirect(array('view','id'=>$model->not_id));
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

		if (isset($_POST['Notas'])) {
			$model->attributes=$_POST['Notas'];
			if ($model->save()) {
				$this->redirect(array('view','id'=>$model->not_id));
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
		$dataProvider=new CActiveDataProvider('Notas');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Notas('search');
		$model->unsetAttributes();  // clear any default values
		if (isset($_GET['Notas'])) {
			$model->attributes=$_GET['Notas'];
		}

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Notas the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Notas::model()->findByPk($id);
		if ($model===null) {
			throw new CHttpException(404,'The requested page does not exist.');
		}
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Notas $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax']==='notas-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionSubir_notas(){
		if(isset($_POST['curso_notas'])){
			$notas_curso = $_POST['curso_notas'];
			$nom_cur = $_POST['nom_cur'];
			$nom_asi = $_POST['nom_asi'];
			$p = $_POST['per'];
			$alu_notas = array();

			foreach($notas_curso as $key => $alumno){ //  se recorre cada alumno
				$id_notas = $alumno[0];
				$model=$this->loadModel($id_notas);
				$notas = $alumno[1];
				$prom = $alumno[2];

				$this->Guardarnotas($model,$notas, $prom);
			}

			$profe = Usuario::model()->findByAttributes(array('usu_iduser' => Yii::app()->user->id));
			if( $profe ){
				$nombre = $profe->NombreCompleto;
			} else{
				$nombre = "admin";
			}
			RegistroLog::registroNotasCurso($nombre,$nom_cur,$nom_asi,$p);
		}
	}

	public function Guardarnotas($model, $notas, $p){

		while (count($notas) < 12 ) {
			array_push($notas,"0");
		}

		$model->not_01 = $notas[0];
		$model->not_02 = $notas[1];
		$model->not_03 = $notas[2];
		$model->not_04 = $notas[3];
		$model->not_05 = $notas[4];
		$model->not_06 = $notas[5];
		$model->not_07 = $notas[6];
		$model->not_08 = $notas[7];
		$model->not_09 = $notas[8];
		$model->not_10 = $notas[9];
		$model->not_11 = $notas[10];
		$model->not_12 = $notas[11];
		$model->not_prom = $p;


		if( $model->save() ){


			return true;
		}

		return false;
	}


	public function actionValidar_Edicion(){

		if(isset($_POST['pass']) && isset($_POST['id_asi'])){
			$p = $_POST['pass'];
			$id_asi = $_POST['id_asi'];
			$curso = $_POST['cur'];

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

			// si  es jefe utp o director o evaluador pueden  cambiar notas tambien

			if( Yii::app()->user->checkAccess('profesor')  ){
			 	// se busca si existe la asignatura
			 	$existe = AAsignatura::model()->findByAttributes(array('aa_asignatura' => $id_asi, 'aa_curso' => $curso ));
			 	$usu = Usuario::model()->findByAttributes(array('usu_iduser' => Yii::app()->user->id));

			 	// existe la asignatura
			 	if( $existe ){
			 		// si el profesor es el que hace la aignatura
			 		if( $usu->usu_id == $existe['aa_docente'] ){
				 		if( $usuario->password == $p){
				 			echo json_encode(1);
				 			return;
						}else {
					 		echo json_encode(0);
					 		return;
					 	}
				 	}
					// si no  es el profesor que hace la asignatura se ve si es el profe jefe del curso
			 		$curso = Curso::model()->findByPk($existe['aa_curso']);

			 		if( $curso->cur_pjefe == Yii::app()->user->id ){

			 			if( $usuario->password == $p){
					 		echo json_encode(1);
					 		return;
				 		}else{
				 			echo json_encode(0);
				 			return;
				 		}
			 		}
				}
			}
			echo json_encode(2);
			return;
		}
	}

	//estadisticas asignatura
	//inicio de las funciones para las estadisticas asignaturas
	public function actionMis_Asignaturas(){
		$usuario = Usuario::model()->findByAttributes(array('usu_iduser'=>Yii::app()->user->id));
		$asignaturas = AAsignatura::model()->findAll(array('condition'=>'aa_docente=:x','params'=>array(':x'=>$usuario->usu_id)));

		$this->render('asignaturas',array(
			'usuario'=>$usuario,
			'asignaturas'=>$asignaturas,
		));
	}

	public function actionAsignatura($a,$c,$p){
		$usuario = Usuario::model()->findByAttributes(array('usu_iduser'=>Yii::app()->user->id));
		$alumnos = ListaCurso::model()->findAll(array('condition'=>'list_curso_id=:x','params'=>array(':x'=>$c)));
		$asignatura = Asignatura::model()->findByAttributes(array('asi_id'=>$a));
		$lista = array();
		$nombres = array();
		$promedios = array();
		$aux = array();

		foreach ($alumnos as $alumno) {
			$matricula = Matricula::model()->findByAttributes(array('mat_id'=>$alumno->list_mat_id));
			if ($matricula->matEstado->par_descripcion == 'ACTIVO') {
				$nota = Notas::model()->findByAttributes(array('not_mat'=>$alumno->list_mat_id,'not_asig'=>$a,'not_periodo'=>$p));
				$aux['promedio'] = $nota->not_prom;
				$aux['nombre'] = $matricula->matAlu->getNombre_completo_3();
				array_push($lista, $aux);
				array_push($nombres, $matricula->matAlu->alum_apepat);
				array_push($promedios, $nota->not_prom);
			}
		}

		$bajos = Merge::array_msort($lista, array('promedio'=>SORT_ASC));
		$altos = Merge::array_msort($lista, array('promedio'=>SORT_DESC));

		$this->render('asig',array(
			'lista'=>$lista,
			'nombres'=>$nombres,
			'promedios'=>$promedios,
			'bajos'=>$bajos,
			'altos'=>$altos,
			'asignatura'=>$asignatura,
			'usuario'=>$usuario,
		));
	}
	//fin de las funciones para estadisticas de asignaturas

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



	public function actionList_cur(){
		$curso = $this->actionCursoAnoActual();

		$this->render('cur_conso',array(
                        'cursos' => $curso,

                    ));



	}

	public function actionConsolidado(){
		if( isset($_POST['id_cur']) ){
			$id_curso = $_POST['id_cur'];
			$estado = Parametro::model()->find(array('condition'=>'par_item="ESTADO" AND par_descripcion="RETIRADO"'));

			$curso = Curso::model()->findByPk($id_curso);
			$lista = ListaCurso::model()->findAll(array('order'=>'list_posicion','condition' => 'list_curso_id=:x','params' => array(':x' => $id_curso)));

			$precision = 1;
			//$curso = array();
			$pos = 0;
			$asigs = array();

			$asignaturas = AAsignatura::model()->findAll(array('condition' => 'aa_curso=:x', 'params' => array(':x' => $id_curso)));

			foreach ($asignaturas as $key => $value) {
				$id = $value->aa_asignatura;
				$asi = Asignatura::model()->findByPk($id);
				$asigs[$asi->asi_orden] = array(
							'id' 	=> $id,
							'nom'	=> $asi->asi_nombrecorto,
							'n'		=> $asi->asi_descripcion,
							'prom'	=> $this->actionPromedio_curso_asig($id_curso,$id),
					);
			}

			ksort($asigs);

			$alumno = array();
            foreach ($lista as $key => $alum) {
            	$final_alu = 0;
                $id_mat = array('id' => $alum->list_mat_id);
                $mat = Matricula::model()->findByPk($id_mat); // asistencia, estado , etc
                $alum = Alumno::model()->findByPk($mat->mat_alu_id); // nombre,rut,etc
                $pos++;

              	$notas = array();
                foreach ($asigs as $key => $asi) {
                	$asi_id = $asi['id'];

                	// primer semestre
                	$notas_1_sem = Notas::model()->findByAttributes(array('not_mat' => $id_mat,'not_periodo' => 1,'not_asig' => $asi_id));

                	// segundo semestre
                	$notas_2_sem = Notas::model()->findByAttributes(array('not_mat' => $id_mat,'not_periodo' => 2,'not_asig' => $asi_id));
					$prom1 = 0;
                	$prom2 = 0;
                	$final_alu = 0;
                	if( $notas_1_sem->not_prom > 0 AND $notas_2_sem->not_prom > 0 ){
                		$prom1 = $notas_1_sem->not_prom;
	                	$prom2 = $notas_2_sem->not_prom;
	                	$final_alu = ($prom1 + $prom2)/2;
                	} else{
                		if( $notas_1_sem->not_prom > 0 ){
                			$final_alu = $notas_1_sem->not_prom;
                		}
                		if( $notas_2_sem->not_prom > 0 ){
                			$final_alu = $notas_2_sem->not_prom;
                		}
                	}


                	if( $asi['n'] == "RELIGION" ){
                		if( $final_alu >= 6  ) {
                            $final_alu = "MB";
                        }else if( $final_alu < 6 AND $final_alu >= 5  ){
                            $final_alu = "B";
                        }else if( $final_alu < 5 AND $final_alu >= 4 ){
                            $final_alu = "S";
                        }else if( $final_alu < 4 AND $final_alu > 0 ){
                            $final_alu = "I";
                        }
                	} else{
                		if( strlen($final_alu) == 1 ){
			                $final_alu = $final_alu .".0";
			            }else{
			                $final_alu = number_format((float) $final_alu, $precision, '.', '');
			            }
                	}

		            $notas[] = $final_alu;
                }
				$asistencia = 0;
				$asistencia = ($mat->mat_asistencia_1 + $mat->mat_asistencia_2)/2;
				$asistencia = number_format((float) $asistencia, 0, '.', '');
                $alumno[] = array(
                		'nombre' 	=> $alum->Nombre_completo_2,
                		'pos' 		=> $pos,
                		'asistencia'=> $asistencia,
                		'retiro' 	=> $mat->mat_estado,
                		'f_retiro'	=> $mat->mat_fretiro,
                		'notas' 	=> $notas,
            	);


            }

            $nivel = Parametro::model()->findByPk($curso->cur_nivel)->par_descripcion;
        	$letra = Parametro::model()->findByPk($curso->cur_letra)->par_descripcion;

	 		$mPDF1 = Yii::app()->ePdf->mpdf('', 'A4');

	 		$mPDF1->SetHeader('Fecha de emisión '.date('d-m-Y'));
	        $mPDF1->WriteHTML($stylesheet, 2);
	        $mPDF1->WriteHTML($this->renderPartial('inf_consolidado', array(
	                                                                'nombre'	=> $nivel . $letra,
	                                                                'alumnos'   => $alumno,
	                                                                'asigs'		=> $asigs,
	                                                                'id_retiro'	=> $estado->par_id,

	                        ), true));
	        $mPDF1->Output();


		}

	}

	// calculo promedio asignatura anual no toma los alumnos retirados
	public function actionPromedio_curso_asig($id_curso,$id_asig){
		$estado = Parametro::model()->find(array('condition'=>'par_item="ESTADO" AND par_descripcion="RETIRADO"'));

        $lista = ListaCurso::model()->findAll(array('condition' => 'list_curso_id=:x','params' =>  array( ':x' => $id_curso)));
        $prom_curso = 0;
        $prom_count = 0;
        $final_f = 0;
        $precision = 1;

        foreach ($lista as $key => $id_alum){  // se recorren los alumnos del curso para obtener su promedio
        	$final_asi = 0;
            $n1 = Notas::model()->findByAttributes(array('not_mat' => $id_alum->list_mat_id, 'not_asig'=> $id_asig, 'not_periodo' => 1 ));
            $n2 = Notas::model()->findByAttributes(array('not_mat' => $id_alum->list_mat_id, 'not_asig'=> $id_asig, 'not_periodo' => 2 ));
            $mat = Matricula::model()->findByPk($id_alum->list_mat_id);
            if( $mat->mat_estado != $estado->par_id ){
            	if( $n1->not_prom > 0 AND $n2->not_prom > 0 ){
            		$final_asi = ($n1->not_prom + $n2->not_prom)/2;

	        		if( strlen($final_asi) == 1 ){
			                $final_asi = $final_asi .".0";
			            }else{
			                $final_asi = number_format((float) $final_asi, $precision, '.', '');
			            }

	                $prom_curso += $final_asi;
	                $prom_count ++;
            	} else{
	            	if( $n1->not_prom > 0 ){
	            		$prom_curso += $n1->not_prom;
	            		$prom_count++;
	            	}
	            	if( $n2->not_prom > 0 ){
	            		$prom_curso += $n2->not_prom;
	            		$prom_count++;
	            	}
            	}

            }


        }

        if( $prom_count != 0 ){
            $final_f = $prom_curso/$prom_count;

            if( strlen($final_f) == 1 ){
                $final_f = $final_f .".0";
            }else{

                $final_f = number_format((float) $final_f, $precision, '.', '');
            }
        }

        return $final_f;
    }


   	public function actionCert_anual_alum($id_mat){
   		$mat = Matricula::model()->findByPk($id_mat);
		$precision = 1;
   		$lista = ListaCurso::model()->findByAttributes(array('list_mat_id' => $id_mat));
   		$id_curso = $lista->list_curso_id;
   		$curso = Curso::model()->findByPk($id_curso);

		$asignaturas = AAsignatura::model()->findAll(array('condition' => 'aa_curso=:x', 'params' => array(':x' => $id_curso)));

		foreach ($asignaturas as $key => $value) {
			$id_asi = $value->aa_asignatura;
			$asi = Asignatura::model()->findByPk($id_asi);
			$asigs[$asi->asi_orden] = array(
						'id' 	=> $id_asi,
						'n'		=> $asi->asi_descripcion,
				);
		}

		ksort($asigs);
		$count_final = 0;
		$final = 0;

		foreach ($asigs as $key => $asi) {
			$asi_id = $asi['id'];

        	// primer semestre
        	$notas_1_sem = Notas::model()->findByAttributes(array('not_mat' => $id_mat,'not_periodo' => 1,'not_asig' => $asi_id));

        	// segundo semestre
        	$notas_2_sem = Notas::model()->findByAttributes(array('not_mat' => $id_mat,'not_periodo' => 2,'not_asig' => $asi_id));
        	$prom1 = 0;
            $prom2 = 0;
            $final_alu = 0;
        	if( $notas_1_sem->not_prom > 0 AND $notas_2_sem->not_prom > 0 ){
        		$prom1 = $notas_1_sem->not_prom;
            	$prom2 = $notas_2_sem->not_prom;
            	$final_alu = ($prom1 + $prom2)/2;
        	} else{
        		if( $notas_1_sem->not_prom > 0 ){
        			$final_alu = $notas_1_sem->not_prom;
        		}
        		if( $notas_2_sem->not_prom > 0 ){
        			$final_alu = $notas_2_sem->not_prom;
        		}
        	}


        	if( $asi['n'] == "RELIGION" ){
        		if( $final_alu >= 6  ) {
                    $final_alu = "MB";
                }else if( $final_alu < 6 AND $final_alu >= 5  ){
                    $final_alu = "B";
                }else if( $final_alu < 5 AND $final_alu >= 4 ){
                    $final_alu = "S";
                }else if( $final_alu < 4 AND $final_alu > 0 ){
                    $final_alu = "I";
                }
        	} else{
        		if( strlen($final_alu) == 1 ){
	                $final_alu = $final_alu .".0";
	            }else{
	                $final_alu = number_format((float) $final_alu, $precision, '.', '');
	            }
	            if( $final_alu > 0){
	            	$count_final++;
	            	$final += $final_alu;
	            }

        	}

            $notas[] = array(
            		"nota"		=> $final_alu,
            		"not_pal"	=> Numero_a_palabra::convert($final_alu),
            		"nom_asi"	=> $asi["n"],
            		);
	    }

	    if( $count_final > 0 ){
	    	$final = $final / $count_final;

	    	if( strlen($final) == 1 ){
	                $final = $final .".0";
	            }else{
	                $final = number_format((float) $final, $precision, '.', '');
	            }
	    }

		$asistencia = 0;
		$asistencia = ($mat->mat_asistencia_1 + $mat->mat_asistencia_2)/2;
		$asistencia = number_format((float) $asistencia, 0, '.', '');

     	$nivel = Parametro::model()->findByPk($curso->cur_nivel)->par_descripcion;
    	$letra = Parametro::model()->findByPk($curso->cur_letra)->par_descripcion;
        $profe = Usuario::model()->findByAttributes(array('usu_iduser' => $curso->cur_pjefe));
        $cole = Colegio::model()->find();
        $nombre_dir = Usuario::model()->findByPk($cole->col_nombre_director);
        $ano = $this->actionAnoactual();

 		$mPDF1 = Yii::app()->ePdf->mpdf('', 'A4');

 		$mPDF1->SetHeader('Fecha de emisión '.date('d-m-Y'));
        $mPDF1->WriteHTML($stylesheet, 2);
        $mPDF1->WriteHTML($this->renderPartial('cert_anual_alum', array(
                                                                'curso_nombre'		=> $nivel . $letra,
                                                                'model'   		=> $mat,
                                                                'notas'			=> $notas,
                                                                'profe'         => $profe->NombreCompleto,
                                                                'nom_director'  => $nombre_dir->nombreCompleto,
                                                                'firma_profe'   => $profe->usu_firma,
                                                                'firma_dir'     => $nombre_dir->usu_firma,
                                                                'cole'          => $cole,
                                                                'ano'			=> $ano,
                                                                'final'			=> $final,
                                                                'asistencia'	=> $asistencia,
                                                                'curso'			=> $curso,

                        ), true));
        $mPDF1->Output();

   	}


   	public function actionCert_anual_curso(){
   		if( isset($_POST['id_curso']) ){
   			$id_curso = $_POST['id_curso'];



	   		$lista = ListaCurso::model()->findAll(array('condition' => 'list_curso_id=:x', 'params' => array(':x' => $id_curso)));

	   		$curso = Curso::model()->findByPk($id_curso);

			$asignaturas = AAsignatura::model()->findAll(array('condition' => 'aa_curso=:x', 'params' => array(':x' => $id_curso)));

			foreach ($asignaturas as $key => $value) {
				$id_asi = $value->aa_asignatura;
				$asi = Asignatura::model()->findByPk($id_asi);
				$asigs[$asi->asi_orden] = array(
							'id' 	=> $id_asi,
							'n'		=> $asi->asi_descripcion,
					);
			}

			ksort($asigs);



	     	$nivel = Parametro::model()->findByPk($curso->cur_nivel)->par_descripcion;
	    	$letra = Parametro::model()->findByPk($curso->cur_letra)->par_descripcion;
	        $profe = Usuario::model()->findByAttributes(array('usu_iduser' => $curso->cur_pjefe));
	        $cole = Colegio::model()->find();
	        $nombre_dir = Usuario::model()->findByPk($cole->col_nombre_director);
	        $ano = $this->actionAnoactual();

	 		$mPDF1 = Yii::app()->ePdf->mpdf('', 'A4');

	 		$mPDF1->SetHeader('Fecha de emisión '.date('d-m-Y'));
	        $mPDF1->WriteHTML($stylesheet, 2);
	        $mPDF1->WriteHTML($this->renderPartial('cert_anual_curso', array(
	                                                                'curso_nombre'	=> $nivel . $letra,
	                                                                'lista'	   		=> $lista,
	                                                                'asigs'			=> $asigs,
	                                                                'profe'         => $profe->NombreCompleto,
	                                                                'nom_director'  => $nombre_dir->nombreCompleto,
	                                                                'firma_profe'   => $profe->usu_firma,
	                                                                'firma_dir'     => $nombre_dir->usu_firma,
	                                                                'cole'          => $cole,
	                                                                'ano'			=> $ano,
	                                                                'curso'			=> $curso,
	                                                                //'final'			=> $final,
	                                                                //'asistencia'	=> $asistencia/2,

	                        ), true));
	        $mPDF1->Output();


   		}
   	}


   	public function actionSituacion_alum(){
		if( Yii::app()->user->checkAccess('profesor') AND !Yii::app()->user->isSuperAdmin  ){
			$ano = $this->actionAnoActual();
    		$profe = Usuario::model()->findByAttributes(array( 'usu_iduser' => Yii::app()->user->id ));
    		$id_profe = $profe['usu_id'];


 			$tiene_asignaturas = AAsignatura::model()->findAll(array('condition' => 'aa_docente=:y','params' => array(':y' => $id_profe)));


    		$id_cur = array(); //  se arma un array con  los cursos que tiene el profe

    		if( $tiene_asignaturas ){
    			foreach ( $tiene_asignaturas as $p ){
	                $id_cur[] = $p->aa_curso;
	            }
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
			$lock = Parametro::model()->findByAttributes(array('par_item' => 'lock_cursos'));
			$this->render('situacion_alu',array(
    			'cursos' => $cursos,
				'lock' => $lock->par_descripcion,
			));

		} else {
			$lock = Parametro::model()->findByAttributes(array('par_item' => 'lock_cursos'));
			$curso = $this->actionCursoAnoActual();

			$this->render('situacion_alu',array(
	                        'cursos' => $curso,
							'lock' => $lock->par_descripcion,
	                    ));

    	}

   	}


   	public function actionSit_final(){
   		if( isset($_POST['id_cur']) ){
			$id_curso = $_POST['id_cur'];
			$estado = Parametro::model()->find(array('condition'=>'par_item="ESTADO" AND par_descripcion="RETIRADO"'));

			$curso = Curso::model()->findByPk($id_curso);
			$lista = ListaCurso::model()->findAll(array('order'=>'list_posicion','condition' => 'list_curso_id=:x','params' => array(':x' => $id_curso)));

			$precision = 1;
			//$curso = array();
			$pos = 0;
			$asigs = array();

			$asignaturas = AAsignatura::model()->findAll(array('condition' => 'aa_curso=:x', 'params' => array(':x' => $id_curso)));

			foreach ($asignaturas as $key => $value) {
				$id = $value->aa_asignatura;
				$asi = Asignatura::model()->findByPk($id);
				$asigs[$asi->asi_orden] = array(
							'id' 	=> $id,
							'nom'	=> $asi->asi_nombrecorto,
							'n'		=> $asi->asi_descripcion,
							'prom'	=> $this->actionPromedio_curso_asig($id_curso,$id),
					);
			}

			ksort($asigs);

			$alumno = array();
            foreach ($lista as $key => $alum) {
            	$final_alu = 0;
                $id_mat = array('id' => $alum->list_mat_id);
                $mat = Matricula::model()->findByPk($id_mat); // asistencia, estado , etc
                $alum = Alumno::model()->findByPk($mat->mat_alu_id); // nombre,rut,etc
                $pos++;

              	$notas = array();
                foreach ($asigs as $key => $asi) {
                	$asi_id = $asi['id'];

                	// primer semestre
                	$notas_1_sem = Notas::model()->findByAttributes(array('not_mat' => $id_mat,'not_periodo' => 1,'not_asig' => $asi_id));

                	// segundo semestre
                	$notas_2_sem = Notas::model()->findByAttributes(array('not_mat' => $id_mat,'not_periodo' => 2,'not_asig' => $asi_id));
                	$prom1 = 0;
                	$prom2 = 0;
                	$final_alu = 0;
                	if( $notas_1_sem->not_prom > 0 AND $notas_2_sem->not_prom > 0 ){
                		$prom1 = $notas_1_sem->not_prom;
	                	$prom2 = $notas_2_sem->not_prom;
	                	$final_alu = ($prom1 + $prom2)/2;
                	} else{
                		if( $notas_1_sem->not_prom > 0 ){
                			$final_alu = $notas_1_sem->not_prom;
                		}
                		if( $notas_2_sem->not_prom > 0 ){
                			$final_alu = $notas_2_sem->not_prom;
                		}
                	}


                	if( $asi['n'] == "RELIGION" ){
                		if( $final_alu >= 6  ) {
                            $final_alu = "MB";
                        }else if( $final_alu < 6 AND $final_alu >= 5  ){
                            $final_alu = "B";
                        }else if( $final_alu < 5 AND $final_alu >= 4 ){
                            $final_alu = "S";
                        }else if( $final_alu < 4 AND $final_alu > 0 ){
                            $final_alu = "I";
                        }
                	} else{
                		if( strlen($final_alu) == 1 ){
			                $final_alu = $final_alu .".0";
			            }else{
			                $final_alu = number_format((float) $final_alu, $precision, '.', '');
			            }
                	}

                	if( $final_alu == "0.0" ){
                		if( $asi['n'] == "INGLES" OR $asi['n'] == "RELIGION" ){
                			$final_alu = "EX";
                		}
                	}

		            $notas[] = $final_alu;
                }

				$asistencia = 0;
				$asistencia = ($mat->mat_asistencia_1 + $mat->mat_asistencia_2)/2;
				$asistencia = number_format((float) $asistencia, 0, '.', '');
                $alumno[] = array(
                		'nombre' 	=> $alum->Nombre_completo_2,
                		'pos' 		=> $pos,
                		'mat_id'	=> $mat->mat_id,
                		'asistencia'=> $asistencia,
                		'retiro' 	=> $mat->mat_estado,
                		'estado'	=> $mat->matEstado->par_descripcion,
                		'notas' 	=> $notas,
						'mat_desc'	=> $mat->mat_desc,
            	);


            }

            $nivel = Parametro::model()->findByPk($curso->cur_nivel)->par_descripcion;
        	$letra = Parametro::model()->findByPk($curso->cur_letra)->par_descripcion;
        	$estados = CHtml::listData(Parametro::model()->findAll(array('condition'=>'par_item="ESTADO" AND par_descripcion="RETIRADO" OR par_descripcion="PROMOVIDO" OR par_descripcion="REPROBADO" ')), 'par_id', 'par_descripcion');
			$lock = Parametro::model()->findByAttributes(array('par_item' => 'lock_cursos'));

	        $this->render('editar_situacion', array(
	        								'estados' 	=> $estados,
                                            'nombre'	=> $nivel . $letra,
                                            'alumnos'   => $alumno,
                                            'asigs'		=> $asigs,
                                            'id_retiro'	=> $estado->par_id,
											'lock'		=> $lock->par_descripcion,

	                        ));


		}

   	}

   	public function actionSave_sit(){
   		if( isset($_POST['alumnos']) ){
   			$alum = $_POST['alumnos'];
   			foreach ($alum as $key => $l ) {
				$mat = Matricula::model()->findByPk( $l['mat_id'] );
				$mat->mat_estado = $l['estado'];
				$mat->mat_desc = $l['des'];
				$mat->update();
   			}

   		}
   	}


	public function actionSit_lock(){
		if( isset($_POST['pass']) ){
			$pass = $_POST['pass'];

			$lock = Parametro::model()->findByAttributes(array('par_item' => 'lock_cursos'));


			$usuario = Yii::app()->user->um->loadUserById(Yii::app()->user->id, true);
			if( $usuario->password == $pass ){
				if( $lock->par_descripcion == "0" ){
					$lock->par_descripcion = "1";
					$lock->update();
				} else{
					$lock->par_descripcion = "0";
					$lock->update();
				}


				echo json_encode(1);
				return;
			}

			echo json_encode(0);
			return;

		}
	}


	public function actionActa_informe(){
		if( isset($_POST['id_curso']) ){
			$id_curso = $_POST['id_curso'];

			$estado = Parametro::model()->find(array('condition'=>'par_item="ESTADO" AND par_descripcion="RETIRADO"'));

			$curso = Curso::model()->findByPk($id_curso);
			$lista = ListaCurso::model()->findAll(array('order'=>'list_posicion','condition' => 'list_curso_id=:x','params' => array(':x' => $id_curso)));

			$precision = 1;
			//$curso = array();
			$pos = 0;
			$asigs = array();

			$asignaturas = AAsignatura::model()->findAll(array('condition' => 'aa_curso=:x', 'params' => array(':x' => $id_curso)));

			foreach ($asignaturas as $key => $value) {
				$id = $value->aa_asignatura;
				$asi = Asignatura::model()->findByPk($id);
				$asigs[$asi->asi_orden] = array(
							'id' 	=> $id,
							'prof_nom'	=> $value->aaDocente->nombreCompleto_2,
							'prof_rut'	=> $value->aaDocente->usu_rut,
							'nom'	=> $asi->asi_nombrecorto,
							'n'		=> $asi->asi_descripcion,
							'prom'	=> $this->actionPromedio_curso_asig($id_curso,$id),
					);
			}

			ksort($asigs);

			$alumno = array();
            foreach ($lista as $key => $alum) {
            	$final_alu = 0;
                $id_mat = array('id' => $alum->list_mat_id);
                $mat = Matricula::model()->findByPk($id_mat); // asistencia, estado , etc
                $alum = Alumno::model()->findByPk($mat->mat_alu_id); // nombre,rut,etc
                $pos++;

              	$notas = array();
                foreach ($asigs as $key => $asi) {
                	$asi_id = $asi['id'];

                	// primer semestre
                	$notas_1_sem = Notas::model()->findByAttributes(array('not_mat' => $id_mat,'not_periodo' => 1,'not_asig' => $asi_id));

                	// segundo semestre
                	$notas_2_sem = Notas::model()->findByAttributes(array('not_mat' => $id_mat,'not_periodo' => 2,'not_asig' => $asi_id));
                	$prom1 = 0;
                	$prom2 = 0;
                	$final_alu = 0;
                	if( $notas_1_sem->not_prom > 0 AND $notas_2_sem->not_prom > 0 ){
                		$prom1 = $notas_1_sem->not_prom;
	                	$prom2 = $notas_2_sem->not_prom;
	                	$final_alu = ($prom1 + $prom2)/2;
                	} else{
                		if( $notas_1_sem->not_prom > 0 ){
                			$final_alu = $notas_1_sem->not_prom;
                		}
                		if( $notas_2_sem->not_prom > 0 ){
                			$final_alu = $notas_2_sem->not_prom;
                		}
                	}


                	if( $asi['n'] == "RELIGION" ){
                		if( $final_alu >= 6  ) {
                            $final_alu = "MB";
                        }else if( $final_alu < 6 AND $final_alu >= 5  ){
                            $final_alu = "B";
                        }else if( $final_alu < 5 AND $final_alu >= 4 ){
                            $final_alu = "S";
                        }else if( $final_alu < 4 AND $final_alu > 0 ){
                            $final_alu = "I";
                        }
                	} else{
                		if( strlen($final_alu) == 1 ){
			                $final_alu = $final_alu .".0";
			            }else{
			                $final_alu = number_format((float) $final_alu, $precision, '.', '');
			            }
                	}

                	if( $final_alu == "0.0" ){
                		if( $asi['n'] == "INGLES" OR $asi['n'] == "RELIGION" ){
                			$final_alu = "EX";
                		}
                	}

		            $notas[] = $final_alu;
                }

				$asistencia = 0;
				$asistencia = ($mat->mat_asistencia_1 + $mat->mat_asistencia_2)/2;
				$asistencia = number_format((float) $asistencia, 0, '.', '');
                $alumno[] = array(
                		'nombre' 	=> $alum->Nombre_completo_2,
                		'pos' 		=> $pos,
                        'genero'    => $alum->alumGenero->par_descripcion,
                		'retiro' 	=> $mat->mat_estado,
                        'situacion' => $mat->matEstado->par_descripcion,
                		'f_retiro'	=> $mat->mat_fretiro,
                        'rut'       => $alum->alum_rut,
                        'comuna'    => $alum->alumComuna,
                        'asistencia'=> $asistencia,
                        'f_nac'     => $alum->alum_f_nac,
                        'obs'       => $mat->mat_desc,
                		'notas' 	=> $notas,
            	);


            }
            $cole = Colegio::model()->find();
            $profe = Usuario::model()->findByAttributes(array('usu_iduser' => $curso->cur_pjefe));
        	$nombre_dir = Usuario::model()->findByPk($cole->col_nombre_director);
            $nivel = Parametro::model()->findByPk($curso->cur_nivel)->par_descripcion;
        	$letra = Parametro::model()->findByPk($curso->cur_letra)->par_descripcion;

        	$ano = $this->actionAnoActual();
	 		$mPDF1 = Yii::app()->ePdf->mpdf('', 'Legal-L');
	 		$mPDF1->SetHeader('Fecha de emisión '.date('d-m-Y'));
	        $mPDF1->WriteHTML($stylesheet, 2);
	        $mPDF1->WriteHTML($this->renderPartial('acta_inf', array(
	                                                                'nombre'	=> $nivel . $letra,
	                                                                'alumnos'   => $alumno,
	                                                                'asigs'		=> $asigs,
	                                                                'id_retiro'	=> $estado->par_id,
	                                                                'cole'		=> $cole,
	                                                                'ano'		=> $ano,
	                                                                'profe'         => $profe->NombreCompleto,
																	'nom_director'  => $nombre_dir->nombreCompleto,
                                                                	'firma_profe'   => $profe->usu_firma,
                                                                	'firma_dir'     => $nombre_dir->usu_firma,
                                                                	'curso'			=> $curso,

	                        ), true));
	        $mPDF1->Output();

		}

	}



}
