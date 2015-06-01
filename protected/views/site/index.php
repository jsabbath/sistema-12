
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
	<div class="span3 text-center">
		<br>
		<button class="btn btn-default btn-block disabled"><strong><?php echo $nombre; ?></strong></button>
	</div>
</div>
