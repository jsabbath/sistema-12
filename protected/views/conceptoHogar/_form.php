<?php
/* @var $this ConceptoHogarController */
/* @var $model ConceptoHogar */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'concepto-hogar-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'ch_descripcion'); ?>
		<?php echo $form->textField($model,'ch_descripcion',array('size'=>60,'maxlength'=>1024)); ?>
		<?php echo $form->error($model,'ch_descripcion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ch_area_hogar'); ?>
		<?php echo $form->textField($model,'ch_area_hogar'); ?>
		<?php echo $form->error($model,'ch_area_hogar'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->