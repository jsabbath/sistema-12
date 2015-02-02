<?php
/* @var $this AAsignaturaController */
/* @var $data AAsignatura */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('aa_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->aa_id), array('view', 'id'=>$data->aa_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('aa_curso')); ?>:</b>
	<?php echo CHtml::encode($data->aa_curso); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('aa_asignatura')); ?>:</b>
	<?php echo CHtml::encode($data->aa_asignatura); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('aa_docente')); ?>:</b>
	<?php echo CHtml::encode($data->aa_docente); ?>
	<br />


</div>