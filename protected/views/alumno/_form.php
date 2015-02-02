<?php
/* @var $this AlumnoController */
/* @var $model Alumno */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'alumno-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'alum_rut'); ?>
		<?php echo $form->textField($model,'alum_rut',array('size'=>12,'maxlength'=>12)); ?>
		<?php echo $form->error($model,'alum_rut'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'alum_nombres'); ?>
		<?php echo $form->textField($model,'alum_nombres',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'alum_nombres'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'alum_apepat'); ?>
		<?php echo $form->textField($model,'alum_apepat',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'alum_apepat'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'alum_apemat'); ?>
		<?php echo $form->textField($model,'alum_apemat',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'alum_apemat'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'alum_f_nac'); ?>
		<?php echo $form->textField($model,'alum_f_nac'); ?>
		<?php echo $form->error($model,'alum_f_nac'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'alum_direccion'); ?>
		<?php echo $form->textField($model,'alum_direccion',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'alum_direccion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'alum_region'); ?>
		<?php echo $form->textField($model,'alum_region'); ?>
		<?php echo $form->error($model,'alum_region'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'alum_ciudad'); ?>
		<?php echo $form->textField($model,'alum_ciudad'); ?>
		<?php echo $form->error($model,'alum_ciudad'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'alum_comuna'); ?>
		<?php echo $form->textField($model,'alum_comuna'); ?>
		<?php echo $form->error($model,'alum_comuna'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'alum_genero'); ?>
		<?php echo $form->textField($model,'alum_genero'); ?>
		<?php echo $form->error($model,'alum_genero'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'alum_salud'); ?>
		<?php echo $form->textField($model,'alum_salud'); ?>
		<?php echo $form->error($model,'alum_salud'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'alum_obs'); ?>
		<?php echo $form->textArea($model,'alum_obs',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'alum_obs'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'alum_estado'); ?>
		<?php echo $form->textField($model,'alum_estado'); ?>
		<?php echo $form->error($model,'alum_estado'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->