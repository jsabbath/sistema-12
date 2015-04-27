<?php
/* @var $this ListaCursoController */
/* @var $data ListaCurso */
?>

<div class="view">

    	<b><?php echo CHtml::encode($data->getAttributeLabel('list_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->list_id),array('view','id'=>$data->list_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('list_mat_id')); ?>:</b>
	<?php echo CHtml::encode($data->list_mat_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('list_posicion')); ?>:</b>
	<?php echo CHtml::encode($data->list_posicion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('list_curso_id')); ?>:</b>
	<?php echo CHtml::encode($data->list_curso_id); ?>
	<br />


</div>