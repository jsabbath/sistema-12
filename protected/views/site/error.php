<?php
/* @var $this SiteController */
/* @var $error array */
/*
$this->pageTitle=Yii::app()->name . ' - Error';
$this->breadcrumbs=array(
	'Error',
);
*/
?>
<?php 

if($code==401){
?>
<div class="container" style="background-color: white; border-top: 3px solid #772000;border-bottom: 3px solid #772000; -webkit-border-radius: 25px 5px 1px 4px; -moz-border-radius: 24px; border-radius: 25px;">
<div class="row">
	<div class="span12 text-center">
		<h1>Usted no tiene permiso para entrar a este lugar</h1>
	</div>
	<div class="span4 offset4">
		<img src="http://media.tumblr.com/tumblr_ls3pp2PUxQ1qboobu.gif">
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
<div class="container" style="background-color: white; border-top: 3px solid #772000;border-bottom: 3px solid #772000; -webkit-border-radius: 25px 5px 1px 4px; -moz-border-radius: 24px; border-radius: 25px;">
<div class="row">
	<div class="span12 text-center">
		<h1>No se encuentra la ruta que esta buscando</h1>
	</div>
	<div class="span4 offset4">
		<img src="http://media.tumblr.com/tumblr_ls3pp2PUxQ1qboobu.gif">
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
<div class="container" style="background-color: white; border-top: 3px solid #772000;border-bottom: 3px solid #772000; -webkit-border-radius: 25px 5px 1px 4px; -moz-border-radius: 24px; border-radius: 25px;">
<div class="row">
	<div class="span12 text-center">
		<h1>UPS! Error del sistema, no se encuentra bien programado</h1>
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
