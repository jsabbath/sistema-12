<?php
/* @var $this InfHogarController */
/* @var $data InfHogar */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ih_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ih_id), array('view', 'id'=>$data->ih_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ih_informe')); ?>:</b>
	<?php echo CHtml::encode($data->ih_informe); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ih_area')); ?>:</b>
	<?php echo CHtml::encode($data->ih_area); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ih_concepto')); ?>:</b>
	<?php echo CHtml::encode($data->ih_concepto); ?>
	<br />


</div>