<?php

class MatriculaController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(array('CrugeAccessControlFilter'));
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Matricula;
        $alumnoModel = new Alumno;
        
        //HAY QUE HACERLO EN AJAX PARA ACTUALIZAR AUTOMATICAMENTE   
        $region = CHtml::listData(Region::model()->findAll(), 'reg_id', 'reg_descripcion');
        $ciudad = CHtml::listData(Ciudad::model()->findAll(array('condition' => 'ciu_reg=:x', 
                                'params' => array(':x' => '1'))), 'ciu_id', 'ciu_descripcion');
        $comuna = CHtml::listData(Comuna::model()->findAll(array('condition' => 'com_ciu=:x', 
                                'params' => array(':x' => '1'))), 'com_id', 'com_descripcion');

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Matricula'])) {
            $model->attributes = $_POST['Matricula'];
            $model->mat_fingreso = date('d-m-Y');
            if ($model->save()){
                $alumnoModel->save();
                $this->redirect(array('view', 'id' => $model->mat_id));

            }
        }

        $this->render('create', array(
            'model' => $model,
            'alumnoModel' => $alumnoModel,
            'region'=>$region,
            'ciudad'=>$ciudad,
            'comuna'=>$comuna,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Matricula'])) {
            $model->attributes = $_POST['Matricula'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->mat_id));
        }

        $this->render('update', array(
            'model' => $model,
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

    public function actionRetirar($id) {
            // FALTA CAMBIAR EL ESTADO  A RETIRADO; AUN NO SE DEFINEN LOS ESTADOS Y SUS NUMEROS.
        $model = $this->loadModel($id);

        $alumno = Alumno::model()->findBypk($id);       
            $nombre = $alumno['alum_nombres'];
            $apepat = $alumno['alum_apepat'];
            $apemat = $alumno['alum_apemat'];

       
        if (isset($_POST['Matricula'])) {
            $model->attributes = $_POST['Matricula'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->mat_id));
        }

        $this->render('retirar', array(
            'model' => $model,
            'nombre' => $nombre,
            'apepat' => $apepat,
            'apemat' => $apemat,
        
        ));
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

}
