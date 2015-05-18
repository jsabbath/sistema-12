<?php
/* @var $this InformeHogarController */
/* @var $data InformeHogar */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ih_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ih_id), array('view', 'id'=>$data->ih_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ih_descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->ih_descripcion); ?>
	<br />


</div>