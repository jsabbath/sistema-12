<?php
/* @var $this EventoController */
/* @var $model Evento */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'evento-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'eve_descripcion'); ?>
		<?php echo $form->textField($model,'eve_descripcion',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'eve_descripcion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'eve_fecha'); ?>
		<?php echo $form->textField($model,'eve_fecha'); ?>
		<?php echo $form->error($model,'eve_fecha'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'eve_inicio'); ?>
		<?php echo $form->textField($model,'eve_inicio'); ?>
		<?php echo $form->error($model,'eve_inicio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'eve_fin'); ?>
		<?php echo $form->textField($model,'eve_fin'); ?>
		<?php echo $form->error($model,'eve_fin'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'eve_usuario'); ?>
		<?php echo $form->textField($model,'eve_usuario'); ?>
		<?php echo $form->error($model,'eve_usuario'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->