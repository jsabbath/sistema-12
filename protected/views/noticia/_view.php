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
				<p style="font-weight: bold"><?php echo CHtml::encode($fecha); ?></p>
			</div>
		</div>
		<div class="row">
			<div class="span5 noticiatexto">
				<br>
				<?php echo CHtml::encode($data->not_texto); ?>
			</div>
			<div class="span1">
				<?php echo CHtml::encode($data->not_programa); ?>
			</div>
			<div class="span1">
				<?php echo CHtml::encode($data->not_responsable); ?>
			</div>
		</div>
	</div>
</div>
<br>