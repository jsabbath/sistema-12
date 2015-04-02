<?php
/* @var $this EvaluacionController */
/* @var $model Evaluacion */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'evaluacion-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'eva_concepto'); ?>
		<?php echo $form->textField($model,'eva_concepto'); ?>
		<?php echo $form->error($model,'eva_concepto'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'eva_matricula'); ?>
		<?php echo $form->textField($model,'eva_matricula'); ?>
		<?php echo $form->error($model,'eva_matricula'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'eva_ano'); ?>
		<?php echo $form->textField($model,'eva_ano'); ?>
		<?php echo $form->error($model,'eva_ano'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'eva_nota'); ?>
		<?php echo $form->textField($model,'eva_nota',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'eva_nota'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->