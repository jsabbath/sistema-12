
<?php
/* @var $this SiteController */
$nombre = 'admin';
$modelo_usuario = Usuario::model()->findByAttributes(array('usu_iduser' => Yii::app()->user->id));
if ($modelo_usuario) {
    $nombre = "" . $modelo_usuario->usu_nombre1 . " " . $modelo_usuario->usu_apepat;
}


$this->pageTitle=Yii::app()->name;
?>

<div class="row">
	<div class="span8 offset1">
		<h3 class="text-center">Noticias</h3>
		<?php $this->actionVer(); ?>
	</div>
	<div class="span3 text-center hidden-phone">
		<br>
		<?php  
		//echo CHtml::link('Mis Eventos',array('Evento/calendario'),array('class'=>'btn btn-success btn-block'));
		?>
		<br>

		<?php 
		//Descomentar el boton para ver la funcionalidad de apoderados
		//echo CHtml::link('Ver Notas Apoderado',array('Apoderado/notas'),array('class'=>'btn btn-warning btn-block')); 
		?>
	</div>
</div>
