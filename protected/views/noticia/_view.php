<?php
/* @var $data Noticia */
if($data->not_fecha==date('Y-m-d')){
	$fecha = 'Hoy';
}else{
	$fecha = $data->not_fecha;
}


?>

<div class="row">
	<div class="span8 noticiaborde">
		<div class="row">
			<div class="span6 noticiatitulo">
				<?php echo CHtml::encode($data->not_titulo); ?>
			</div>
			<div class="span2 noticiafecha">
				<?php echo CHtml::encode($fecha); ?>
			</div>
		</div>
		<div class="row">
			<div class="span8 noticiatexto">
				<?php echo CHtml::encode($data->not_texto); ?>
			</div>
		</div>
	</div>
</div>
<br>