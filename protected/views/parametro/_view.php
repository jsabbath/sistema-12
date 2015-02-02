<?php
/* @var $this ParametroController */
/* @var $data Parametro */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('par_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->par_id), array('view', 'id'=>$data->par_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('par_item')); ?>:</b>
	<?php echo CHtml::encode($data->par_item); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('par_descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->par_descripcion); ?>
	<br />


</div>