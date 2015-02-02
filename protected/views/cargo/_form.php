<?php
/* @var $this CargoController */
/* @var $model Cargo */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cargo-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'car_descripcion'); ?>
		<?php echo $form->textField($model,'car_descripcion',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'car_descripcion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'car_estado'); ?>
		<?php echo $form->textField($model,'car_estado'); ?>
		<?php echo $form->error($model,'car_estado'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->