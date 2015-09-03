<?php
/* @var $this SiteController */
/* @var $error array */
$this->pageTitle=Yii::app()->name . ' - Error';

$err_img  = "http://media.tumblr.com/tumblr_ls3pp2PUxQ1qboobu.gif";

?>


<?php if( 	Yii::app()->user->checkAccess('administrador') OR
    		Yii::app()->user->isSuperAdmin  
   ){ ?>
		 <div class="row" >
			<div class="span12 text-center" style="background-color: #FAADA8">
				<h4>Error <?php echo $code; ?></h4>

				<div class="error">
				<?php echo CHtml::encode($message); ?>
				</div>
			</div>
		</div> 

<?php } ?>




<?php 

if($code==666){
?>
	<div class="container" >
		<div class="row">
		
			<div class="span12 text-center" style="background-color: #EEEEEE">
				<h3>No hay cursos disponibles en  este año, deben ingresarse antes de realizar esta accion.</h3>
			</div>

			<div class="span12 text-center"><br>
				<a href="<?php echo Yii::app()->createUrl('curso/menu'); ?>" class="btn btn-danger">Gesion Cursos</a>
			</div> 

			<div class="span4 offset4">
				<img width="50%" src="<?php echo $err_img;?>">
				<br><br>
			</div>
		 	
		</div>
		<br>
	</div>
<?php
}elseif($code==401){
?>
<div class="container" >
<div class="row">
	<div class="span12 text-center">
		<h1>Usted no tiene permiso para entrar a este lugar</h1>
	</div>
	<div class="span4 offset4">
		<img width="50%"src="http://media.tumblr.com/tumblr_ls3pp2PUxQ1qboobu.gif">
		<br><br>
	</div>

	<div class="span12 text-center">
		<a href="<?php echo Yii::app()->createUrl('site/index'); ?>" class="btn btn-primary">Regresar</a>
	</div>
</div>
</div>
<?php
}elseif($code==404){
?>
<div class="container" >
<div class="row">
	<div class="span12 text-center">
		<h1>No se encuentra la ruta que esta buscando</h1>
	</div>
	<div class="span4 offset4">
		<img width="50%" src="http://media.tumblr.com/tumblr_ls3pp2PUxQ1qboobu.gif">
		<br><br>
	</div>

	<div class="span12 text-center">
		<a href="<?php echo Yii::app()->createUrl('site/index'); ?>" class="btn btn-primary">Regresar</a>
	</div>
</div>
</div>
<?php
}elseif($code==500){
?>
<div class="container" >
<div class="row">
	<div class="span12 text-center">
		<h1>UPS! Actualmente estamos trabajando en este error</h1>
	</div>
	<div class="span4 offset4">
		<img src="http://billionbytes.es/wp-content/uploads/2014/08/gato_003-755139.jpg">
		<br><br>
	</div>

	<div class="span12 text-center">
		<a href="<?php echo Yii::app()->createUrl('site/index'); ?>" class="btn btn-primary">Regresar</a>
	</div>
</div>
</div>
<?php
}else{
	Yii::app()->redirect('site/index');
}

?>