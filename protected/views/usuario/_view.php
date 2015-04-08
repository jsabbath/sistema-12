<?php
/* @var $this UsuarioController */
/* @var $data Usuario */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('usu_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->usu_id), array('view', 'id'=>$data->usu_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usu_nombre1')); ?>:</b>
	<?php echo CHtml::encode($data->usu_nombre1); ?>
	<br />
        
        <b><?php echo CHtml::encode($data->getAttributeLabel('usu_nombre2')); ?>:</b>
	<?php echo CHtml::encode($data->usu_nombre2); ?>
	<br />


	<b><?php echo CHtml::encode($data->getAttributeLabel('usu_apepat')); ?>:</b>
	<?php echo CHtml::encode($data->usu_apepat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usu_apemat')); ?>:</b>
	<?php echo CHtml::encode($data->usu_apemat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usu_rut')); ?>:</b>
	<?php echo CHtml::encode($data->usu_rut); ?>
	<br />


	<b><?php echo CHtml::encode($data->getAttributeLabel('usu_estado')); ?>:</b>
	<?php echo CHtml::encode($data->usuEstado->par_descripcion); ?>
	<br />


</div>