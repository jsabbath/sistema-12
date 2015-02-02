<?php
/* @var $this PermisoController */
/* @var $data Permiso */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('per_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->per_id), array('view', 'id'=>$data->per_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('per_descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->per_descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('per_estado')); ?>:</b>
	<?php echo CHtml::encode($data->per_estado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('per_cargo')); ?>:</b>
	<?php echo CHtml::encode($data->per_cargo); ?>
	<br />


</div>