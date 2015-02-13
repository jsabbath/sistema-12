<?php
/* @var $this CursoController */
/* @var $data Curso */
$nivel = CHtml::listData(Parametro::model()->findall(array('condition'=>'par_item="nivel"')),'par_id','par_descripcion');
$jornada = CHtml::listData(Parametro::model()->findall(array('condition'=>'par_item="jornada"')),'par_id','par_descripcion');
$letra = CHtml::listData(Parametro::model()->findall(array('condition'=>'par_item="letra"')),'par_id','par_descripcion');
$profesor_jefe = CHtml::listData(Usuario::model()->findall(),'usu_iduser','nombreCorto');
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('cur_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->cur_id), array('view', 'id'=>$data->cur_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cur_ano')); ?>:</b>
	<?php echo CHtml::encode($data->cur_ano); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Curso')); ?>:</b>
	<?php echo CHtml::encode($nivel[$data->cur_nivel])." ".CHtml::encode($letra[$data->cur_letra]); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cur_jornada')); ?>:</b>
	<?php echo CHtml::encode($jornada[$data->cur_jornada]); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cur_pjefe')); ?>:</b>
	<?php echo CHtml::encode($profesor_jefe[$data->cur_pjefe]); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cur_infd')); ?>:</b>
	<?php echo CHtml::encode($data->cur_infd); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('cur_tperiodo')); ?>:</b>
	<?php echo CHtml::encode($data->cur_tperiodo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cur_notas_periodo')); ?>:</b>
	<?php echo CHtml::encode($data->cur_notas_periodo); ?>
	<br />

	*/ ?>

</div>