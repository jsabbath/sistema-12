<?php
/* @var $this ComunaController */
/* @var $data Comuna */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('com_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->com_id), array('view', 'id'=>$data->com_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('com_descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->com_descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('com_ciu')); ?>:</b>
	<?php echo CHtml::encode($data->com_ciu); ?>
	<br />


</div>