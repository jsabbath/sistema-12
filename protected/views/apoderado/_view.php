<?php
/* @var $this ApoderadoController */
/* @var $data Apoderado */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('apo_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->apo_id), array('view', 'id'=>$data->apo_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('apo_nombre1')); ?>:</b>
	<?php echo CHtml::encode($data->apo_nombre1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('apo_nombre2')); ?>:</b>
	<?php echo CHtml::encode($data->apo_nombre2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('apo_apepat')); ?>:</b>
	<?php echo CHtml::encode($data->apo_apepat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('apo_apemat')); ?>:</b>
	<?php echo CHtml::encode($data->apo_apemat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ape_rut')); ?>:</b>
	<?php echo CHtml::encode($data->ape_rut); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('apo_ano')); ?>:</b>
	<?php echo CHtml::encode($data->apo_ano); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('ape_hijo')); ?>:</b>
	<?php echo CHtml::encode($data->ape_hijo); ?>
	<br />

	*/ ?>

</div>