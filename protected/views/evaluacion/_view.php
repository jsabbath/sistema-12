<?php
/* @var $this EvaluacionController */
/* @var $data Evaluacion */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('eva_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->eva_id), array('view', 'id'=>$data->eva_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('eva_concepto')); ?>:</b>
	<?php echo CHtml::encode($data->eva_concepto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('eva_matricula')); ?>:</b>
	<?php echo CHtml::encode($data->eva_matricula); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('eva_ano')); ?>:</b>
	<?php echo CHtml::encode($data->eva_ano); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('eva_nota')); ?>:</b>
	<?php echo CHtml::encode($data->eva_nota); ?>
	<br />


</div>