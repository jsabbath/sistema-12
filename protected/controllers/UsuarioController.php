<?php

class UsuarioController extends Controller
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
				'actions'=>array('index','view','gridEstado','val_pass','val_pass','online'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','gridEstado','val_pass','val_pass','online'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','gridEstado','val_pass','val_pass','online'),
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
		$model=new Usuario;
		$temporal = new Temp;
		$estado = implode(CHtml::listData(Parametro::model()->findAll(array('condition'=>'par_descripcion="ACTIVO"')),'par_id','par_id'));
		// Uncomment the following line if AJAX validation is needed
		//$this->performAjaxValidation($model);

		if(isset($_POST['Usuario']))
		{
			$model->attributes=$_POST['Usuario'];
			$model->usu_estado = $estado;

			//todos los textos en mayuscula
			$model->usu_nombre1 = strtoupper($model->usu_nombre1);
			$model->usu_nombre2 = strtoupper($model->usu_nombre2);
			$model->usu_apepat = strtoupper($model->usu_apepat);
			$model->usu_apemat = strtoupper($model->usu_apemat);

			// firma usuario
			$random1 = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 3);
			$random2 = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 3);
			$rand = $model->usu_id . $random1 . $random2;

			$images_path = realpath(Yii::app()->basePath . '/../firmas/'.$rand);
            $model->usu_firma=CUploadedFile::getInstance($model,'usu_firma');

			if($model->save()){
				if( $model->usu_firma != null ){
					$nombre = $rand ."_". $model->usu_firma;
					$model->usu_firma->saveAs($images_path . '/'.$rand ."_" .$model->usu_firma);
					$model->usu_firma = $nombre;
					$model->save();
				 }
				$this->registroCruge($model);
				$temporal->temp_iduser = $model->usu_iduser;
				$temporal->save();
				$this->redirect(array('view','id'=>$model->usu_id));
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

		if(isset($_POST['Usuario']))
		{
			$model->attributes=$_POST['Usuario'];

			// firma usuario
			$random1 = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 3);
			$random2 = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 3);
			$rand = $model->usu_id . $random1 . $random2;

			$images_path = realpath(Yii::app()->basePath . '/../images/firmas');
            $model->usu_firma=CUploadedFile::getInstance($model,'usu_firma');
			
			if($model->save()){
				if( $model->usu_firma != null ){
					$nombre = $rand ."_". $model->usu_firma;
				
					$model->usu_firma->saveAs($images_path . '/'.$rand ."_" .$model->usu_firma);
					$model->usu_firma = $nombre;
					$model->save();
				 }
				$this->redirect(array('view','id'=>$model->usu_id));
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
		$dataProvider=new CActiveDataProvider('Usuario');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Usuario('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Usuario']))
			$model->attributes=$_GET['Usuario'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Usuario the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Usuario::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Usuario $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='usuario-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function registroCruge($modelo){
      // asi se crea un usuario (una nueva instancia en memoria volatil)
      $usuarioNuevo = Yii::app()->user->um->createBlankUser();
      $usuarioNuevo->username = $modelo->usu_rut;
      $usuarioNuevo->email = $modelo->usu_nombre1.'_'.$modelo->usu_apepat.'@gmail.com';
      // la establece como "Activada"
      Yii::app()->user->um->activateAccount($usuarioNuevo);
      // verifica para no duplicar
      if(Yii::app()->user->um->loadUser($usuarioNuevo->username) != null)
      {
         echo "El usuario {$usuarioNuevo->username} ya ha sido creado.";
         return;
      }
      // ahora a ponerle una clave
	      Yii::app()->user->um->changePassword($usuarioNuevo,$modelo->usu_rut);

      // IMPORTANTE: guarda usando el API, la cual hace pasar al usuario 
      // por el sistema de filtros, por eso user->um->save()
      // 
      if(Yii::app()->user->um->save($usuarioNuevo)){
            //echo "Usuario creado: id=".$usuarioNuevo->primaryKey;
            $modelo->usu_iduser = $usuarioNuevo->primaryKey;
            $modelo->update();
      }
      else{
            $errores = CHtml::errorSummary($usuarioNuevo);
            echo "no se pudo crear el usuario: ".$errores;
         }
      }

    public function gridEstado($data,$row){
        
        $estado = $data->usuEstado->par_descripcion;

        if($estado=='ACTIVO') return "<label class=\"label label-success\">".$estado."</label>";
        elseif($estado=='RETIRADO') return "<label class=\"label label-important\">".$estado."</label>";
        elseif($estado=='PROMOVIDO') return "<label class=\"label\">".$estado."</label>";
        elseif($estado=='REPITENTE') return "<label class=\"label label-warning\">".$estado."</label>";
        else return "<label class=\"label label-info\">".$estado."</label>";
    }

    //Esta funcion sirve para ver los usuarios online en la vista usuario/online
    public function actionOnline(){
    	$online_user = array(); //array con la lista de los usuarios online
		$aux = array(); // array auxiliar para ingresar datos
		$user = Yii::app()->user->um->listUsers(); //lista de los usuarios
		unset($user[0]); // eliminando administrador
		unset($user[1]); // eliminando invitado

		foreach ($user as $u) {
			$email = Yii::app()->user->um->loadUser($u->email); //cargando los datos de un usuario online
			//agregando informacion de los usuarios online
			if(Yii::app()->user->um->findSession($email)!=NULL){
				$usuario = Usuario::model()->find('usu_iduser='.$u->iduser);
				$aux['nombre'] = $usuario->usu_nombre1." ".$usuario->usu_apepat;
				$aux['rut'] = $usuario->usu_rut;
				$aux['email'] = $u->email;
				array_push($online_user,$aux);
			}
		}
		//renderizando vista con la informacion
		$this->render('online',array('online_user'=>$online_user));
    }

    public function actionVal_pass(){
    	if(isset($_POST['pass'])){
			$p = $_POST['pass'];
		
			//  se obtienen todos los datos del usuario  de yii
		 	$usuario = Yii::app()->user->um->loadUserById(Yii::app()->user->id, true);
		 	if( $usuario ){
			 	if( $usuario->password == $p ){
			 		echo json_encode(1);
				 	return;
			 	} else{
			 		echo json_encode(0);
			 		return;
			 	}
			}
		}
    }

   

}
