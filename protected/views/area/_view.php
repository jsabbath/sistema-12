<?php
/* @var $this AreaController */
/* @var $data Area */
?>

<div class="view">

    	<b><?php echo CHtml::encode($data->getAttributeLabel('are_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->are_id),array('view','id'=>$data->are_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('are_descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->are_descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('are_infd')); ?>:</b>
	<?php echo CHtml::encode($data->are_infd); ?>
	<br />


</div>