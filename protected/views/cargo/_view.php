<?php
/* @var $this CargoController */
/* @var $data Cargo */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('car_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->car_id), array('view', 'id'=>$data->car_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('car_descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->car_descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('car_estado')); ?>:</b>
	<?php echo CHtml::encode($data->car_estado); ?>
	<br />


</div>