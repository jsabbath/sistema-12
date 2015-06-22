<?php
/* @var $this EventoController */
/* @var $data Evento */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('eve_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->eve_id), array('view', 'id'=>$data->eve_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('eve_descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->eve_descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('eve_inicio')); ?>:</b>
	<?php echo CHtml::encode($data->eve_inicio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('eve_fin')); ?>:</b>
	<?php echo CHtml::encode($data->eve_fin); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('eve_usuario')); ?>:</b>
	<?php echo CHtml::encode($data->eve_usuario); ?>
	<br />


</div>