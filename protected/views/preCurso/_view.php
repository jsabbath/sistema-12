<?php
/* @var $this PreCursoController */
/* @var $data PreCurso */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('pre_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->pre_id), array('view', 'id'=>$data->pre_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pre_ano')); ?>:</b>
	<?php echo CHtml::encode($data->pre_ano); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pre_nivel')); ?>:</b>
	<?php echo CHtml::encode($data->pre_nivel); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pre_letra')); ?>:</b>
	<?php echo CHtml::encode($data->pre_letra); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pre_jornada')); ?>:</b>
	<?php echo CHtml::encode($data->pre_jornada); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pre_pjefe')); ?>:</b>
	<?php echo CHtml::encode($data->pre_pjefe); ?>
	<br />


</div>