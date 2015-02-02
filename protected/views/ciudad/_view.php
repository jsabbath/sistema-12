<?php
/* @var $this CiudadController */
/* @var $data Ciudad */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ciu_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ciu_id), array('view', 'id'=>$data->ciu_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ciu_descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->ciu_descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ciu_reg')); ?>:</b>
	<?php echo CHtml::encode($data->ciu_reg); ?>
	<br />


</div>