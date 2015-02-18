<?php
/* @var $this ConceptoController */
/* @var $data Concepto */
?>

<div class="view">

    	<b><?php echo CHtml::encode($data->getAttributeLabel('con_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->con_id),array('view','id'=>$data->con_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('con_descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->con_descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('con_area')); ?>:</b>
	<?php echo CHtml::encode($data->con_area); ?>
	<br />


</div>