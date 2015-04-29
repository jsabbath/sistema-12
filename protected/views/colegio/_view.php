<?php
/* @var $this ColegioController */
/* @var $data Colegio */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('col_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->col_id), array('view', 'id'=>$data->col_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('col_rolRBD')); ?>:</b>
	<?php echo CHtml::encode($data->col_rolRBD); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('col_nombre_colegio')); ?>:</b>
	<?php echo CHtml::encode($data->col_nombre_colegio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('col_letra')); ?>:</b>
	<?php echo CHtml::encode($data->col_letra); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('col_numero')); ?>:</b>
	<?php echo CHtml::encode($data->col_numero); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('col_ano')); ?>:</b>
	<?php echo CHtml::encode($data->col_ano); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('col_periodo')); ?>:</b>
	<?php echo CHtml::encode($data->col_periodo); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('col_nombre_director')); ?>:</b>
	<?php echo CHtml::encode($data->col_nombre_director); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('col_director_email')); ?>:</b>
	<?php echo CHtml::encode($data->col_director_email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('col_encargado_actas')); ?>:</b>
	<?php echo CHtml::encode($data->col_encargado_actas); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('col_fecha_resol_rec_ofic')); ?>:</b>
	<?php echo CHtml::encode($data->col_fecha_resol_rec_ofic); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('col_numero_resol_rec_ofic')); ?>:</b>
	<?php echo CHtml::encode($data->col_numero_resol_rec_ofic); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('col_lema')); ?>:</b>
	<?php echo CHtml::encode($data->col_lema); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('col_mision')); ?>:</b>
	<?php echo CHtml::encode($data->col_mision); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('col_vision')); ?>:</b>
	<?php echo CHtml::encode($data->col_vision); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('col_area')); ?>:</b>
	<?php echo CHtml::encode($data->col_area); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('col_regimen')); ?>:</b>
	<?php echo CHtml::encode($data->col_regimen); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('col_logo')); ?>:</b>
	<?php echo CHtml::encode($data->col_logo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('col_razon_social')); ?>:</b>
	<?php echo CHtml::encode($data->col_razon_social); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('col_rut_razon_social')); ?>:</b>
	<?php echo CHtml::encode($data->col_rut_razon_social); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('col_fecha_primer')); ?>:</b>
	<?php echo CHtml::encode($data->col_fecha_primer); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('col_fecha_segundo')); ?>:</b>
	<?php echo CHtml::encode($data->col_fecha_segundo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('col_fecha_tercer')); ?>:</b>
	<?php echo CHtml::encode($data->col_fecha_tercer); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('col_direccion')); ?>:</b>
	<?php echo CHtml::encode($data->col_direccion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('col_comuna')); ?>:</b>
	<?php echo CHtml::encode($data->col_comuna); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('col_ciudad')); ?>:</b>
	<?php echo CHtml::encode($data->col_ciudad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('col_colegio_email')); ?>:</b>
	<?php echo CHtml::encode($data->col_colegio_email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('col_telefono')); ?>:</b>
	<?php echo CHtml::encode($data->col_telefono); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('col_nota_minima')); ?>:</b>
	<?php echo CHtml::encode($data->col_nota_minima); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('col_nota_maxima')); ?>:</b>
	<?php echo CHtml::encode($data->col_nota_maxima); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('col_nota_aprovacion')); ?>:</b>
	<?php echo CHtml::encode($data->col_nota_aprovacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('col_aproximacion')); ?>:</b>
	<?php echo CHtml::encode($data->col_aproximacion); ?>
	<br />

	*/ ?>

</div>