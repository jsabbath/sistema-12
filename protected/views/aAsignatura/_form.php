<?php
/* @var $this AAsignaturaController */
/* @var $model AAsignatura */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'aasignatura-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'aa_curso'); ?>
		<?php echo $form->textField($model,'aa_curso'); ?>
		<?php echo $form->error($model,'aa_curso'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'aa_asignatura'); ?>
		<?php echo $form->textField($model,'aa_asignatura'); ?>
		<?php echo $form->error($model,'aa_asignatura'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'aa_docente'); ?>
		<?php echo $form->textField($model,'aa_docente'); ?>
		<?php echo $form->error($model,'aa_docente'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->