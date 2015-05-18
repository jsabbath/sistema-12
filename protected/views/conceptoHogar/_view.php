<?php
/* @var $this ConceptoHogarController */
/* @var $data ConceptoHogar */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ch_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ch_id), array('view', 'id'=>$data->ch_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ch_descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->ch_descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ch_area_hogar')); ?>:</b>
	<?php echo CHtml::encode($data->ch_area_hogar); ?>
	<br />


</div>