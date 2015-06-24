<?php
/* @var $this EvaHogarController */
/* @var $data EvaHogar */
?>

<div class="view">

    	<b><?php echo CHtml::encode($data->getAttributeLabel('eh_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->eh_id),array('view','id'=>$data->eh_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('eh_matricula')); ?>:</b>
	<?php echo CHtml::encode($data->eh_matricula); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('eh_curso')); ?>:</b>
	<?php echo CHtml::encode($data->eh_curso); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('eh_concepto')); ?>:</b>
	<?php echo CHtml::encode($data->eh_concepto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('eh_eva1')); ?>:</b>
	<?php echo CHtml::encode($data->eh_eva1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('eh_eva2')); ?>:</b>
	<?php echo CHtml::encode($data->eh_eva2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('eh_eva3')); ?>:</b>
	<?php echo CHtml::encode($data->eh_eva3); ?>
	<br />


</div>