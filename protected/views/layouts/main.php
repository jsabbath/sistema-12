
<?php Yii::app()->bootstrap->register(); ?>

<?php
/* @var $this Controller */
$nombre = 'admin';
$modelo_usuario = Usuario::model()->findByAttributes(array('usu_iduser' => Yii::app()->user->id));
if ($modelo_usuario) {
    $nombre = "" . $modelo_usuario->usu_nombre1 . " " . $modelo_usuario->usu_apepat;
}
$temp = Temp::model()->findByAttributes(
                     array('temp_iduser'=>Yii::app()->user->id)
                 ); 
$par = Parametro::model()->findByAttributes(array('par_item'=>'ano_activo'));
if( $temp->temp_ano != 0 ){
    $ano_selec = $temp->temp_ano;
} else {
    $ano_selec = $par->par_descripcion;
}
$anos = CHtml::listData(Curso::model()->findAll(array('condition' => 'cur_ano!=:x', 'params' => array(':x' => $ano_selec ))), 'cur_ano', 'cur_ano');


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


<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/sweet-alert.css">
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/sweet-alert.min.js"></script>

   
<?php 
//aqui empieza el control de usuarios
if(!Yii::app()->user->checkAccess('profesor') OR
    !Yii::app()->user->checkAccess('evaluador') OR
    !Yii::app()->user->checkAccess('jefeutp') OR
    !Yii::app()->user->checkAccess('director') OR
    !Yii::app()->user->checkAccess('administrador') OR
    Yii::app()->user->isSuperAdmin
    ){
?>
    <body>
   
        <div class="container">    
            <header style="background-color: #292929; border-top: 3px solid #772000;border-bottom: 3px solid #772000; border-bottom-left-radius: 25px; border-bottom-right-radius: 25px;">
                <div class="row">
                 
                <div class="span12">
                    <table width=100%  border="0" cellspacing="0" cellpadding="0" style="margin-bottom: 0.1em">
                    
                        <td width=9% align="left" class="hidden-phone">    
                             <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo_colegio.png" >
                        </td>
                     
                        <td class="visible-desktop">
                            <h3 style="color:#FFF6B0">Colegio Alborada</h3>
                            <div  >
                                <?php echo CHtml::dropDownList(
                                    'anos', null, $anos,array(
                                    'prompt'=>$ano_selec,
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
                            </div>
                        </td>
                       
                         <div class="hidden-desktop text-center">
                            <h3 style="color:#FFF6B0">Colegio Alborada</h3>
                             <div  >
                                <?php echo CHtml::dropDownList(
                                    'anos', null, $anos,array(
                                    'prompt'=>$ano_selec,
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
                            </div>
                        </div>
                        <td class="text-center">
                            <a id="ax" class="link-negro" href="<?php echo Yii::app()->createUrl('site/index'); ?>" title="Inicio">
                            <div class="tilt pic"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/iconos/casa.png"></div>
                            </a>
                            <strong style="color: white">Inicio</strong>
                        </td>
                        <?php 
                        if(
                            Yii::app()->user->isSuperAdmin OR
                            Yii::app()->user->checkAccess('administrador') OR 
                            Yii::app()->user->checkAccess('director') OR
                            Yii::app()->user->checkAccess('jefe_utp') OR
                            Yii::app()->user->checkAccess('profesor')
                        ){ 
                        ?>
                        <td class="text-center">
                            <a class="link-negro" href="<?php echo Yii::app()->createUrl('matricula/menu'); ?>" title="Academico">
                            <div class="tilt pic"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/iconos/book.png"></div>
                            </a>
                            <strong style="color: white">Academico</strong>
                        </td>
                        <?php
                        }

                        if(
                            Yii::app()->user->isSuperAdmin OR
                            Yii::app()->user->checkAccess('administrador') OR 
                            Yii::app()->user->checkAccess('director') OR
                            Yii::app()->user->checkAccess('evaluador') OR
                            Yii::app()->user->checkAccess('jefe_utp') OR
                            Yii::app()->user->checkAccess('profesor')
                        ){ 
                        ?>
                        <td class="text-center">
                            <a class="link-negro" href="<?php echo Yii::app()->createUrl('curso/menu'); ?>" title="Cursos">
                            <div class="tilt pic"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/iconos/blackboard.png"></div>
                            </a>
                            <strong style="color: white">Cursos</strong>
                        </td>
                        <?php
                        }

                        if(
                            Yii::app()->user->isSuperAdmin OR
                            Yii::app()->user->checkAccess('administrador') OR 
                            Yii::app()->user->checkAccess('director') OR
                            Yii::app()->user->checkAccess('evaluador') OR
                            Yii::app()->user->checkAccess('jefe_utp')
                        ){ 
                        ?>
                        <td class="text-center">
                            <a class="link-negro" href="<?php echo Yii::app()->createUrl('informeDesarrollo/menu'); ?>" title="Informe">
                            <div class="tilt pic"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/iconos/papers.png"></div>
                            </a>
                            <strong style="color: white">Documentos</strong>
                        </td>
                        <?php } ?>
                        <?php 
                        if(
                            Yii::app()->user->isSuperAdmin OR
                            Yii::app()->user->checkAccess('administrador') OR 
                            Yii::app()->user->checkAccess('director')
                        ){ 
                        ?>
                        <td class="text-center">
                            <a class="link-negro" href="<?php echo Yii::app()->createUrl('site/menu'); ?>" title="Administracion">
                            <div class="tilt pic"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/iconos/our_process.png"></div>
                            </a>
                            <strong style="color: white">Administracion</strong>
                        </td>
                        <?php } ?>
                         <td class="text-center">
                            <a class="link-negro" href="#"  id="salir" onclick="logout()" title="Salir">
                            <div class="tilt pic"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/iconos/cerrar.png"></div>
                            </a>
                            <strong style="color: white">Salir</strong>
                        </td>
             

                        <td hidden>
                            <div class="btn-group">
                                <a class="btn dropdown-toggle btn-danger" data-toggle="dropdown" href="#">
                                    <?php echo $nombre; ?>
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- dropdown menu links -->
                                    <li>
                                        <a href="#" data-toggle="modal" data-target ="#cambio_modal" id="contraseña" >Cambiar Contraseña</a>
                                    </li>
                                    <li><a href="#"  id="salir" onclick="logout()">
                                        Salir
                                    </a></li>
                                </ul>
                            </div>
                        </td>
                    </table>
                </div>
            </div>   
        </header>

       
</div>

          <div class='info container' style='text-aling:left;'>
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
            

            <div class="container" style="background-color: white; border-top: 3px solid #772000;border-bottom: 3px solid #772000; -webkit-border-radius: 25px 5px 1px 4px; -moz-border-radius: 24px; border-radius: 25px;">  

         
			

            <?php if (isset($this->breadcrumbs)): ?>
                <?php
                $this->widget('zii.widgets.CBreadcrumbs', array(
                    'links' => $this->breadcrumbs,
                ));
                ?><!-- breadcrumbs -->
            <?php endif ?>

            <div>
<?php } ?>

            <?php echo $content; ?>

<?php 
//aqui empieza el control de usuarios
if(Yii::app()->user->checkAccess('PROFESOR')){
?>
            </div>
            <div class="clear"></div>




        </div><!-- page -->
    <?php echo Yii::app()->user->ui->displayErrorConsole(); ?>

        <!-- DESLOGEAR !-->
  
                
         
         
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
        
  
<div align="center" class="text-center">
	<pre style="color:white">Amsys. Copyright © Todos los Derechos Reservados. Anonimos Asociados</pre>
</div>
</body>
<?php }
// aqui termina el control de usuario
?>

</html>

<?php
if (strcmp("" . Yii::app()->request->url, Yii::app()->baseUrl . "/index.php/site/index") <> 0 and strcmp("" . Yii::app()->request->url, Yii::app()->baseUrl . "/index.php") <> 0 and strcmp("" . Yii::app()->request->url, Yii::app()->baseUrl . "/") <> 0) {
    Yii::app()->clientScript->registerScript(
            'myHideEffect', '$(".info").animate({opacity: 1.0}, 10000).slideUp("slow");', CClientScript::POS_READY
    );
}
?>



<script>
$(function () { $("[data-toggle='tooltip']").tooltip(); });

function logout(){
    swal({  
        title: "Estas seguro?",   
        text: "Usted esta abandonando el sistema!",  
        type: "warning",   
        showCancelButton: true,   
        confirmButtonColor: "#DD6B55",   
        confirmButtonText: "Salir!",   
        closeOnConfirm: false, 
    },
    function(){
        window.location = "<?php echo Yii::app()->user->ui->logoutUrl ?>";
    });
}



$("#contraseña").click(function(){
            $.ajax({
                type:  'post',
                url: "<?php echo Yii::app()->user->ui->getProfileUrl() ?>" ,
                success: function(result){ 
                    $("#cambio").html(result)}
            });
});
</script>