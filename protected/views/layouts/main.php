<?php Yii::app()->bootstrap->register(); ?>

<?php
/* @var $this Controller */
$nombre = 'default';
$modelo_usuario = Usuario::model()->findByAttributes(array('usu_iduser' => Yii::app()->user->id));
if ($modelo_usuario) {
    $nombre = "" . $modelo_usuario->usu_nombre1 . " " . $modelo_usuario->usu_apepat;
}
$par = Parametro::model()->findByAttributes(array('par_item'=>'ano_activo'));
$cursos = Curso::model()->findAll();
$anos = CHtml::listData(Curso::model()->findAll(), 'cur_ano', 'cur_ano');
$temp = Temp::model()->findByAttributes(
                     array('temp_iduser'=>Yii::app()->user->id)
                 ); 
if( $temp->temp_ano != 0 ){
    $ano_selec = $temp->temp_ano;
} else {
    $ano_selec = $par->par_descripcion;
}
$tempid = $temp->temp_id;
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

        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    </head>

    <body>

        <div class="container" id="pagina">    
           
            <header>
                <div class="container">
                <div class="row">
                    <div class="span3">
                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo_colegio.png">
                    </div>
                    <div class="span6">
                        <div id="logo"> Sistema de Administracion Academica</div>
                    </div>
                    <div class="span3">
                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo2.png" >
                    </div>
                </div>
                </div> 
            </header>
            <div class="row">
            <div class="span12">
                <div style="text-align: center">
                <?php echo CHtml::dropDownList(
                    'anos', $cursos, $anos,array(
                    'prompt'=>'Seleccione año',
                    'id'=>'dropitem',
                    'ajax' =>
                        array('type'=>'POST',
                            'url'=>$this->createUrl('curso/recieveValue'), // write in controller this action
                            'update'=>'#anio',
                            'data'=>array('ano'=>'js:this.value','tempid'=>$tempid),
                            'success'=> 'function(){location.reload();}'
                        )
                ));  
                ?>
                <button class="btn btn-inverse disabled" style="margin-bottom:10px" id="anio" data-toggle="tooltip" data-placement="top" title="Año actual">
                    <?php echo $ano_selec ?>
                </button> 
                </div>
            </div>
            </div>
            <div class="row">
            <div class="span12">
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
                                                array('label' => 'Ingreso Matricula', 'url' => array('matricula/create'),
                                                ),
                                                array('label' => 'Modificar Matricula', 'url' => '#'),
                                                array('label' => 'Bajar Matricula', 'url' => array('/matricula/admin')),)),
                                        array('label' => 'Academico', 'items' => array(
                                                array('label' => 'Administracion de Cursos', 'url' => array('curso/admin')),
                                                array('label' => 'Another action', 'url' => '#'),
                                                array('label' => 'Something else here', 'url' => '#'),)),
                                        array('label' => 'Calificaciones y Conducta', 'items' => array(
                                                array('label' => 'Calificaciones Parciales', 'url' => array('/curso/buscar_notas','id'=> Yii::app()->user->id)),
                                                array('label' => 'Informe de Personalidad', 'url' => array('informeDesarrollo/index')),)),
                                        array('label' => 'Administrar', 'items' => array(
                                                array('label' => 'Perfil Establecimiento', 'url' => '#'),
                                                array('label' => 'Administrar Usuarios', 'icon' => 'pencil', 'url' => Yii::app()->user->ui->userManagementAdminUrl, 'visible' => !Yii::app()->user->isGuest),
                                                array('label' => 'Asignacion de Roles', 'url' => '#'),
                                                array('label' => 'Asignacion de Roles', 'url' => '#'),
                                                array('label' => 'Asignacion de Perfiles', 'url' => '#'),)),
                                        array('label' => 'Parametros', 'url'=>array('parametro/index')),
                                    ),
                                ),
                                array(
                                    'class' => 'bootstrap.widgets.TbNav',
                                    'htmlOptions' => array('class' => 'pull-right'),
                                    'items' => array(
                                        array('label' =>$nombre, 'icon' => 'user', 'items' => array(
                                                array('label' => 'Cambiar Contraseña','url' => '#',
                                                                                    'icon' => 'wrench', 
                                                                                    'data-toggle' => 'modal',
                                                                                    'data-target' => '#cambio_modal',
                                                                                    'id' => 'contraseña',
                                                    ),
                                            
                                                array('label' => 'Salir', 'url' => '#', 'icon' => 'off', 'visible' => !Yii::app()->user->isGuest, 'data-toggle' => 'modal','data-target' => '#myModal',),
                                            )
                                        ),
                                    ),
                                ),
                            ),
                        ));
                    }
                    ?>
                </div>
            </div>
           <div class='info' style='text-aling:left;'>
                <?php
                $flashMessages = Yii::app()->user->getFlashes();
                if ($flashMessages) {
                    echo '<ul class="flashes">';
                    foreach ($flashMessages as $key => $message) {
                        echo '<li><div class="flash-' . $key . '">' . $message . "</div></li>\n";
                    }
                    echo '</ul>';
                }
                ?>
            </div>

            <?php if (isset($this->breadcrumbs)): ?>
                <?php
                $this->widget('zii.widgets.CBreadcrumbs', array(
                    'links' => $this->breadcrumbs,
                ));
                ?><!-- breadcrumbs -->
            <?php endif ?>

            
            <div class="row">
                <?php echo $content; ?>
            </div>

            <div class="clear"></div>




        </div><!-- page -->
    <?php echo Yii::app()->user->ui->displayErrorConsole(); ?>

        <!-- DESLOGEAR !-->
    <?php $this->widget('bootstrap.widgets.TbModal', array(
            'id' => 'myModal',
            'header' => 'Esta Seguro?',
            'content' => '<p>Usted esta abandonando el sistema </p>',
            'htmlOptions' => array ('url' => Yii::app()->user->ui->logoutUrl),
            'footer' => array(
                    TbHtml::linkButton('Salir',  array( 'color' => TbHtml::BUTTON_COLOR_DANGER, 'url' => Yii::app()->user->ui->logoutUrl,)),
                    TbHtml::button('Cancelar', array('data-dismiss' => 'modal',)),
            ),
    )); ?>
                
         
         
          <!-- CAMBIAR CONTRASEÑA !-->
     <?php $this->widget('bootstrap.widgets.TbModal', array(
            'id' => 'cambio_modal',
            'header' => '<h4>Cambiando Contraseña</h4>',
            'content' => '<div id="cambio">  </div>',
            'htmlOptions' => array ('url' => Yii::app()->user->ui->getProfileUrl()),
            'footer' => array(
                 //   TbHtml::linkButton('Salir',  array( 'color' => TbHtml::BUTTON_COLOR_DANGER, 'url' => Yii::app()->user->ui->logoutUrl,)),
                    TbHtml::button('Cancelar', array('data-dismiss' => 'modal',)),
            ),
    )); ?>    
        
  

<script type="text/javascript">
$(function () { $("[data-toggle='tooltip']").tooltip(); });


$("#contraseña").click(function(){
            $.ajax({
                type:  'post',
                url: "<?php echo Yii::app()->user->ui->getProfileUrl() ?>" ,
                success: function(result){ 
                    $("#cambio").html(result)}
            });
})
</script>
    </body>
</html>

<?php
if (strcmp("" . Yii::app()->request->url, Yii::app()->baseUrl . "/index.php/site/index") <> 0 and strcmp("" . Yii::app()->request->url, Yii::app()->baseUrl . "/index.php") <> 0 and strcmp("" . Yii::app()->request->url, Yii::app()->baseUrl . "/") <> 0) {
    Yii::app()->clientScript->registerScript(
            'myHideEffect', '$(".info").animate({opacity: 1.0}, 10000).slideUp("slow");', CClientScript::POS_READY
    );
}
?>