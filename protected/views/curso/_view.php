<?php
/* @var $this CursoController */
/* @var $data Curso */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('cur_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->cur_id), array('view', 'id'=>$data->cur_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cur_ano')); ?>:</b>
	<?php echo CHtml::encode($data->cur_ano); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cur_nivel')); ?>:</b>
	<?php echo CHtml::encode($data->cur_nivel); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cur_jornada')); ?>:</b>
	<?php echo CHtml::encode($data->cur_jornada); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cur_letra')); ?>:</b>
	<?php echo CHtml::encode($data->cur_letra); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cur_pjefe')); ?>:</b>
	<?php echo CHtml::encode($data->cur_pjefe); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cur_infd')); ?>:</b>
	<?php echo CHtml::encode($data->cur_infd); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('cur_tperiodo')); ?>:</b>
	<?php echo CHtml::encode($data->cur_tperiodo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cur_notas_periodo')); ?>:</b>
	<?php echo CHtml::encode($data->cur_notas_periodo); ?>
	<br />

	*/ ?>

</div>