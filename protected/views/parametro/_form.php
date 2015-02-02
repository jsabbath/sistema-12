<?php
/* @var $this ParametroController */
/* @var $model Parametro */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'parametro-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'par_id'); ?>
		<?php echo $form->textField($model,'par_id'); ?>
		<?php echo $form->error($model,'par_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'par_item'); ?>
		<?php echo $form->textField($model,'par_item',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'par_item'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'par_descripcion'); ?>
		<?php echo $form->textField($model,'par_descripcion',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'par_descripcion'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->