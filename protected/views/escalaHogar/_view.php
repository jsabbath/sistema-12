<?php
/* @var $this EscalaHogarController */
/* @var $data EscalaHogar */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('eh_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->eh_id), array('view', 'id'=>$data->eh_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('eh_descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->eh_descripcion); ?>
	<br />


</div>