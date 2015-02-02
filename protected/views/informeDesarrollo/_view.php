<?php
/* @var $this InformeDesarrolloController */
/* @var $data InformeDesarrollo */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_id), array('view', 'id'=>$data->id_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->id_descripcion); ?>
	<br />


</div>