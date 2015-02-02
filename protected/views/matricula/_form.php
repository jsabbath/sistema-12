<?php
/* @var $this MatriculaController */
/* @var $model Matricula */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'matricula-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'mat_ano'); ?>
		<?php echo $form->textField($model,'mat_ano',array('size'=>4,'maxlength'=>4)); ?>
		<?php echo $form->error($model,'mat_ano'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mat_cur'); ?>
		<?php echo $form->textField($model,'mat_cur'); ?>
		<?php echo $form->error($model,'mat_cur'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mat_alu_id'); ?>
		<?php echo $form->textField($model,'mat_alu_id'); ?>
		<?php echo $form->error($model,'mat_alu_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mat_fingreso'); ?>
		<?php echo $form->textField($model,'mat_fingreso'); ?>
		<?php echo $form->error($model,'mat_fingreso'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mat_fretiro'); ?>
		<?php echo $form->textField($model,'mat_fretiro'); ?>
		<?php echo $form->error($model,'mat_fretiro'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mat_fcambio'); ?>
		<?php echo $form->textField($model,'mat_fcambio'); ?>
		<?php echo $form->error($model,'mat_fcambio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mat_numero'); ?>
		<?php echo $form->textField($model,'mat_numero'); ?>
		<?php echo $form->error($model,'mat_numero'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->