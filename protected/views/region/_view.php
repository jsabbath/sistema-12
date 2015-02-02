<?php
/* @var $this RegionController */
/* @var $data Region */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('reg_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->reg_id), array('view', 'id'=>$data->reg_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('reg_descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->reg_descripcion); ?>
	<br />


</div>