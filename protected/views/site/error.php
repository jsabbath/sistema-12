<?php
/* @var $this SiteController */
/* @var $error array */
$this->pageTitle=Yii::app()->name . ' - Error';

?>
<div class="row">
	<div class="span12 text-center">
		<h2>Error <?php echo $code; ?></h2>

		<div class="error">
		<?php echo CHtml::encode($message); ?>
		</div>
	</div>
</div>

?>
<!-- 
<?php 

if($code==401){
?>
<div class="container" >
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
<div class="container" >
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
 -->