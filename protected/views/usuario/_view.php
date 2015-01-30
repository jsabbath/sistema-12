<?php
/* @var $this UsuarioController */
/* @var $data Usuario */
?>

<div class="view">

    	<b><?php echo CHtml::encode($data->getAttributeLabel('usu_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->usu_id),array('view','id'=>$data->usu_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usu_nombres')); ?>:</b>
	<?php echo CHtml::encode($data->usu_nombres); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usu_apepat')); ?>:</b>
	<?php echo CHtml::encode($data->usu_apepat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usu_apemat')); ?>:</b>
	<?php echo CHtml::encode($data->usu_apemat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usu_rut')); ?>:</b>
	<?php echo CHtml::encode($data->usu_rut); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usu_clave')); ?>:</b>
	<?php echo CHtml::encode($data->usu_clave); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usu_cargo')); ?>:</b>
	<?php echo CHtml::encode($data->usu_cargo); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('usu_estado')); ?>:</b>
	<?php echo CHtml::encode($data->usu_estado); ?>
	<br />

	*/ ?>

</div>