<?php
/* @var $this AreaHogarController */
/* @var $data AreaHogar */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ah_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ah_id), array('view', 'id'=>$data->ah_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ah_descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->ah_descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ah_inf_hogar')); ?>:</b>
	<?php echo CHtml::encode($data->ah_inf_hogar); ?>
	<br />


</div>