
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


    $durationMins = Yii::app()->user->um->getDefaultSystem()->getn('sessionmaxdurationmins');
    $exp = CrugeUtil::makeExpirationDateTime($durationMins);

   
    $min_alert = $exp - (3 * 60); // se le restan 3 minutos al tiempo  del logeo, para mostrar un mensaje
    $sesion_ = CrugeSession::model()->findLast(Yii::app()->user->id);

    if ($sesion_ != null) {
        $sesion_->expire = $exp;
        $sesion_->save();
    }






$anos = CHtml::listData(Curso::model()->findAll(array('condition' => 'cur_ano!=:x', 'params' => array(':x' => $ano_selec ))), 'cur_ano', 'cur_ano', $par->par_descripcion);

if( $ano_selec != $par->par_descripcion ){
    //  si el año actual  no es el seleccionado ( por que no tiene cursos aun) se agrega al array
   $anos[$par->par_descripcion] = $par->par_descripcion;
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


<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/sweet-alert.css">
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/datepicker.css">
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/sweet-alert.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap-datepicker.js"></script>

   
<?php
$logo = Colegio::model()->find();
    
?>
<body>     
         
<div class="container visible-desktop">

    <header style="background-color: rgba(41, 41, 41, 0.5); border-bottom: 3px; border-bottom-left-radius: 25px; border-bottom-right-radius: 25px; margin-bottom: 3px">
        <div class="row">
        	<div class="span12">
            	<table width=100%  border="0" cellspacing="0" cellpadding="0" style="margin-bottom: 0.1em">
	                <td width=7% align="left" class="hidden-phone">    
	                     <img style="padding-top: 10px;" src="<?php echo Yii::app()->baseUrl; ?>/images/<?php echo $logo->col_logo; ?>">
	                </td>
	             
	                <td class="visible-desktop">
	                    <h3 style="color:#FFF6B0"><?php echo $logo->col_nombre_colegio; ?></h3>
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
        foreach ($flashMessages as $key => $message) {
            echo '<div class="alert alert-' . $key . '" style="margin-bottom:0; border-radius: 20px 20px 20px 20px; margin-left:10px; margin-right:10px;">' . $message . "</div>";
        }
    }
    ?>
</div>
            

<div class="container" style="background-color: white; border-top: 3px;border-bottom: 3px; -webkit-border-radius: 25px 5px 1px 4px; -moz-border-radius: 24px; border-radius: 25px;">  

    <?php if (isset($this->breadcrumbs)): ?>
        <?php
        $this->widget('zii.widgets.CBreadcrumbs', array(
            'links' => $this->breadcrumbs,
        ));
        ?><!-- breadcrumbs -->
    <?php endif ?>

	<div>
	<?php echo $content;?>

	<?php 
	//aqui empieza el control de usuarios
	if(Yii::app()->user->checkAccess('PROFESOR')){
	?>
	</div>
            
	<div class="clear"></div>


</div><!-- page -->

<?php echo Yii::app()->user->ui->displayErrorConsole(); ?>

 
</body>

<?php 
}
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



Minutos = 0;
Segundos = 59;
var flag = true;   

CreateTimer(<?php echo $durationMins; ?>);

function CreateTimer( Time) {
    Timer = document.getElementById("timer");
    Minutos = Time -1;

    UpdateTimer()
    window.setTimeout("Tick()", 1000);
}

function Tick() {
    Segundos -=1;
    if(Segundos == 0){
        Segundos = 60;
        Minutos -= 1;
    }
    if(Minutos == 0){
        window.onbeforeunload = function() {}
        window.location = "<?php  echo Yii::app()->createUrl("/cruge/ui/login"); ?>";
    }
    if(Minutos <= 3 && flag){
        flag = false;
        swal({  
            title: "3 Minutos restantes!",   
            text: "Asegurese de guardar todo!",  
            type: "warning",   
            showCancelButton: false,   
            confirmButtonColor: "#DD6B55",   
            confirmButtonText: "Ok!",   
            closeOnConfirm: false, 
        });
    }
    UpdateTimer()
    window.setTimeout("Tick()", 1000);
}

function UpdateTimer() {
    if( Segundos < 10  ){
          Timer.innerHTML = Minutos+ ":0"+ Segundos;
    } else{
        Timer.innerHTML = Minutos+ ":"+ Segundos;
    }
}
 


</script>