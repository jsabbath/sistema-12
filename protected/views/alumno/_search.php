<?php
/* @var $this AlumnoController */
/* @var $model Alumno */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'alum_id'); ?>
		<?php echo $form->textField($model,'alum_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'alum_rut'); ?>
		<?php echo $form->textField($model,'alum_rut',array('size'=>12,'maxlength'=>12)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'alum_nombres'); ?>
		<?php echo $form->textField($model,'alum_nombres',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'alum_apepat'); ?>
		<?php echo $form->textField($model,'alum_apepat',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'alum_apemat'); ?>
		<?php echo $form->textField($model,'alum_apemat',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'alum_f_nac'); ?>
		<?php echo $form->textField($model,'alum_f_nac'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'alum_direccion'); ?>
		<?php echo $form->textField($model,'alum_direccion',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'alum_region'); ?>
		<?php echo $form->textField($model,'alum_region'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'alum_ciudad'); ?>
		<?php echo $form->textField($model,'alum_ciudad'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'alum_comuna'); ?>
		<?php echo $form->textField($model,'alum_comuna'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'alum_genero'); ?>
		<?php echo $form->textField($model,'alum_genero'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'alum_salud'); ?>
		<?php echo $form->textField($model,'alum_salud'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'alum_obs'); ?>
		<?php echo $form->textArea($model,'alum_obs',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'alum_estado'); ?>
		<?php echo $form->textField($model,'alum_estado'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->