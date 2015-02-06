<?php Yii::app()->bootstrap->register(); ?>

<?php /* @var $this Controller */ 
$nombre = 'default';
$modelo_usuario = Usuario::model()->findByAttributes(array('usu_iduser' => Yii::app()->user->id));
if ($modelo_usuario) {
    $nombre = "" . $modelo_usuario->usu_nombre1 . " " . $modelo_usuario->usu_apepat;
}
$cursos = Curso::model()->findAll();
 $anos = CHtml::listData(Curso::model()->findAll(/*array('order '=>'cur_ano ASC')*/), 'cur_ano', 'cur_ano');
            
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="language" content="en">

        <!-- blueprint CSS framework -->
        <link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/logo2.ico">
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection">
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print">
        <!--[if lt IE 8]>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection">
        <![endif]-->

        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css">
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css">
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/estilo.css">

        <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
        <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    </head>

    <body>

        <div class="container" id="page">       
 		<div id="logo" style="text-align:right"><?php echo CHtml::encode(Yii::app()->name); ?></div>   
                <div id="logo" style="text-align:left">Colegioblabal</div>   
               <div id="logo" style="text-align:center"> Sistema de Administracion Academica</div>   
               
                <div style="text-align: center">
                    <?php echo CHtml::dropDownList('años',$cursos,$anos); ?> 
                </div>
            <?php    
            if (!Yii::app()->user->isGuest) {
                $this->widget('bootstrap.widgets.TbNavbar', array(
                    'brandLabel' => 'AMSYS',
                    'collapse' => true,
                    'display' => null, // default is static to top
                    'items' => array(
                        array(
                            'class' => 'bootstrap.widgets.TbNav',
                            'items' => array(
                                array('label' => 'Inicio', 'icon' => 'home', 'url' => array('/site/index')),
                                array('label' => 'Admision', 'items' => array(
                                    array('label' => 'Ingreso Matricula', 'url' =>'#',
                                                                                      ),
                                    array('label' => 'Modificar Matricula', 'url' => '#'),
                                    array('label' => 'Bajar Matricula', 'url' => array('/matricula/admin')),)),
                                array('label' => 'Academico', 'items' => array(
                                    array('label' => 'Administracion de Cursos', 'url' => '#'),
                                    array('label' => 'Another action', 'url' => '#'),
                                    array('label' => 'Something else here', 'url' => '#'),)),
                                array('label' => 'Calificaciones y Conducta', 'items' => array(
                                    array('label' => 'Calificaciones Parciales', 'url' => '#'),
                                    array('label' => 'Informe de Personalidad', 'url' => '#'), )),
                                array('label' => 'Administrar', 'items' => array(
                                    array('label' => 'Perfil Establecimiento', 'url' => '#'),
                                    array('label' => 'Administrar Usuarios' ,'icon' => 'pencil', 'url' =>Yii::app()->user->ui->userManagementAdminUrl ,'visible'=>!Yii::app()->user->isGuest),
                                    array('label' => 'Asignacion de Roles', 'url' => '#'),
                                    array('label' => 'Asignacion de Roles', 'url' => '#'),
                                    array('label' => 'Asignacion de Perfiles', 'url' => '#'),)),
                                array('label' => 'Parametros', 'items' => array(
                                    array('label' => 'Calificaciones Parciales', 'url' => '#'),
                                    array('label' => 'Informe de Personalidad', 'url' => '#'),)),   
                            ),
                        ),
                        
                        array(
                            'class' => 'bootstrap.widgets.TbNav',
                            'htmlOptions' => array('class' => 'pull-right'),
                            'items' => array(

                            
                                array('label' => 'Salir (' . $nombre . ')'
                                    , 'url' => Yii::app()->user->ui->logoutUrl
                                    , 'icon' => 'user'
                                    , 'visible' => !Yii::app()->user->isGuest),
                            )
                        ),
                        
                    ),
                ));
            }
            ?>


<?php if (isset($this->breadcrumbs)): ?>
                <?php
                $this->widget('zii.widgets.CBreadcrumbs', array(
                    'links' => $this->breadcrumbs,
                ));
                ?><!-- breadcrumbs -->
            <?php endif ?>

            <?php echo $content; ?>

            <div class="clear"></div>

        </div><!-- page -->
<?php echo Yii::app()->user->ui->displayErrorConsole(); ?>




    </body>
</html>
