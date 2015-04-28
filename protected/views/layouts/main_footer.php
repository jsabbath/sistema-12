
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


  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/sweet-alert.css">
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/sweet-alert.min.js"></script>

        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    </head>

    <body>
   
    <div style="background-color: #2F2F2F">
         <div class="container">
            
                <div class="row">
                 
                    <div  class="span12" style="background-color: #292929">
                        <table width=100%  border="0" cellspacing="0" cellpadding="0">
                            <td width=9% align="left" class="hidden-phone">    
                                 <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo_colegio.png" >
                            </td>
                         
                            <td class="visible-desktop">
                                <h3 style="color:#FFF6B0">Colegio Alborada</h3>
                            </td>
                           
                             <div class="hidden-desktop">
                                <h3 style="color:#FFF6B0">Colegio Alborada</h3>
                            </div>
                            <td >
                                <a class="link-negro" href="<?php echo Yii::app()->createUrl('site/index'); ?>" data-toggle="tooltip" title="Inicio">
                                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/casa.png">
                                </a>
                            </td>
                            <td>
                                <a class="link-negro" href="<?php echo Yii::app()->createUrl('matricula/menu'); ?>" data-toggle="tooltip" title="Academico">
                                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/usu.png">
                                </a>
                            </td>
                            <td>
                                <a class="link-negro" href="<?php echo Yii::app()->createUrl('curso/menu'); ?>" data-toggle="tooltip" title="Cursos">
                                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/cur.png">
                                </a>
                            </td>
                            <td>
                                <a class="link-negro" href="<?php echo Yii::app()->createUrl('informeDesarrollo/menu'); ?>" data-toggle="tooltip" title="Informe">
                                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/inf.png">
                                </a>
                            </td>
                            <td>
                                <a class="link-negro" href="<?php echo Yii::app()->createUrl('site/menu'); ?>" data-toggle="tooltip" title="Administracion">
                                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/par.png">
                                </a>
                            </td>
                             <td class="hidden-desktop">
                                <a class="link-negro" href="#"  id="salir" onclick="logout()" data-toggle="tooltip" title="Salir">
                                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/iconos/cerrar.png">
                                </a>
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

                        <div class="text-center">
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

                </div>
        </div>
    </div>
               

         
        <div class="container">
         <div  id="pagina">     

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

            
            <?php echo $content; ?>
        
            <div class="clear"></div>


            </div>
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
        

    </div>
    </body>
</html>

<div class="navbar-fixed-bottom visible-desktop"  align="center" class="text-center">
    <div class="container" style="background-color: #292929">
        <div class="row" >
            <div class="span3" style="color:white"><?php echo $nombre ?></div> 
            <div  class="span6" style="color:white">Amsys. Copyright © Todos los Derechos Reservados. Anonimos Asociados</div>
             <div class="span3" style="color:red"><a href="#"  id="salir" onclick="logout()" data-toggle="tooltip" title="Salir">SALIR</a></div> 
        </div>
    </div>
</div>



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
})
</script>