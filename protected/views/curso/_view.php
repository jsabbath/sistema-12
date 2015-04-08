<?php
/* @var $this CursoController */
/* @var $data Curso */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('cur_ano')); ?>:</b>
	<?php echo CHtml::encode($data->cur_ano); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Curso')); ?>:</b>
	<?php echo CHtml::encode($data->curNivel->par_descripcion)." ".CHtml::encode($data->curLetra->par_descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cur_jornada')); ?>:</b>
	<?php echo CHtml::encode($data->curJornada->par_descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cur_pjefe')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->curPjefe->usu_nombre1)." ".CHtml::encode($data->curPjefe->usu_apepat),
		array('//usuario/view','id'=>$data->curPjefe->usu_id)
	); ?>
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