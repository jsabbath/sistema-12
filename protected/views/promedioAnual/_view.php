<?php
/* @var $this PromedioAnualController */
/* @var $data PromedioAnual */
?>

<div class="view">

    	<b><?php echo CHtml::encode($data->getAttributeLabel('PRO_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->PRO_ID),array('view','id'=>$data->PRO_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PRO_PROM_1')); ?>:</b>
	<?php echo CHtml::encode($data->PRO_PROM_1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PRO_PROM_2')); ?>:</b>
	<?php echo CHtml::encode($data->PRO_PROM_2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PRO_PROM_3')); ?>:</b>
	<?php echo CHtml::encode($data->PRO_PROM_3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PRO_NOMBRE_ASIGNATURA')); ?>:</b>
	<?php echo CHtml::encode($data->PRO_NOMBRE_ASIGNATURA); ?>
	<br />


</div>