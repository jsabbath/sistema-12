<?php
/* @var $this MatriculaController */
/* @var $data Matricula */
?>

<div class="view">

    	<b><?php echo CHtml::encode($data->getAttributeLabel('mat_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->mat_id),array('view','id'=>$data->mat_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mat_ano')); ?>:</b>
	<?php echo CHtml::encode($data->mat_ano); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mat_numero')); ?>:</b>
	<?php echo CHtml::encode($data->mat_numero); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mat_fingreso')); ?>:</b>
	<?php echo CHtml::encode($data->mat_fingreso); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mat_fretiro')); ?>:</b>
	<?php echo CHtml::encode($data->mat_fretiro); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mat_fcambio')); ?>:</b>
	<?php echo CHtml::encode($data->mat_fcambio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mat_alu_id')); ?>:</b>
	<?php echo CHtml::encode($data->mat_alu_id); ?>
	<br />


</div>