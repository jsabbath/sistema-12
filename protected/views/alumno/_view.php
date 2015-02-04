<?php
/* @var $this AlumnoController */
/* @var $data Alumno */
?>

<div class="view">

    	<b><?php echo CHtml::encode($data->getAttributeLabel('alum_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->alum_id),array('view','id'=>$data->alum_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alum_rut')); ?>:</b>
	<?php echo CHtml::encode($data->alum_rut); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alum_nombres')); ?>:</b>
	<?php echo CHtml::encode($data->alum_nombres); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alum_apepat')); ?>:</b>
	<?php echo CHtml::encode($data->alum_apepat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alum_apemat')); ?>:</b>
	<?php echo CHtml::encode($data->alum_apemat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alum_f_nac')); ?>:</b>
	<?php echo CHtml::encode($data->alum_f_nac); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alum_direccion')); ?>:</b>
	<?php echo CHtml::encode($data->alum_direccion); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('alum_region')); ?>:</b>
	<?php echo CHtml::encode($data->alum_region); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alum_ciudad')); ?>:</b>
	<?php echo CHtml::encode($data->alum_ciudad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alum_comuna')); ?>:</b>
	<?php echo CHtml::encode($data->alum_comuna); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alum_genero')); ?>:</b>
	<?php echo CHtml::encode($data->alum_genero); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alum_salud')); ?>:</b>
	<?php echo CHtml::encode($data->alum_salud); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alum_obs')); ?>:</b>
	<?php echo CHtml::encode($data->alum_obs); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alum_estado')); ?>:</b>
	<?php echo CHtml::encode($data->alum_estado); ?>
	<br />

	*/ ?>

</div>