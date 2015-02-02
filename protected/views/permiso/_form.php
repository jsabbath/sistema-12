<?php
/* @var $this PermisoController */
/* @var $model Permiso */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'permiso-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'per_descripcion'); ?>
		<?php echo $form->textField($model,'per_descripcion',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'per_descripcion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'per_estado'); ?>
		<?php echo $form->textField($model,'per_estado',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'per_estado'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'per_cargo'); ?>
		<?php echo $form->textField($model,'per_cargo'); ?>
		<?php echo $form->error($model,'per_cargo'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->