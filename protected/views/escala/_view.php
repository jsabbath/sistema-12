<?php
/* @var $this EscalaController */
/* @var $data Escala */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('esc_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->esc_id), array('view', 'id'=>$data->esc_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('esc_descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->esc_descripcion); ?>
	<br />


</div>