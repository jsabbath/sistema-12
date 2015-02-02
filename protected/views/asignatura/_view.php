<?php
/* @var $this AsignaturaController */
/* @var $data Asignatura */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('asi_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->asi_id), array('view', 'id'=>$data->asi_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('asi_descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->asi_descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('asi_codigo')); ?>:</b>
	<?php echo CHtml::encode($data->asi_codigo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('asi_nombrecorto')); ?>:</b>
	<?php echo CHtml::encode($data->asi_nombrecorto); ?>
	<br />


</div>