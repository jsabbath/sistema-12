<?php
/* @var $this ComunaController */
/* @var $model Comuna */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'comuna-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'com_descripcion'); ?>
		<?php echo $form->textField($model,'com_descripcion',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'com_descripcion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'com_ciu'); ?>
		<?php echo $form->textField($model,'com_ciu'); ?>
		<?php echo $form->error($model,'com_ciu'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->