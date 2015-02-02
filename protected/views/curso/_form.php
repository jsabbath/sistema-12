<?php
/* @var $this CursoController */
/* @var $model Curso */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'curso-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'cur_ano'); ?>
		<?php echo $form->textField($model,'cur_ano',array('size'=>4,'maxlength'=>4)); ?>
		<?php echo $form->error($model,'cur_ano'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cur_nivel'); ?>
		<?php echo $form->textField($model,'cur_nivel'); ?>
		<?php echo $form->error($model,'cur_nivel'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cur_jornada'); ?>
		<?php echo $form->textField($model,'cur_jornada'); ?>
		<?php echo $form->error($model,'cur_jornada'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cur_letra'); ?>
		<?php echo $form->textField($model,'cur_letra'); ?>
		<?php echo $form->error($model,'cur_letra'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cur_pjefe'); ?>
		<?php echo $form->textField($model,'cur_pjefe'); ?>
		<?php echo $form->error($model,'cur_pjefe'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cur_infd'); ?>
		<?php echo $form->textField($model,'cur_infd'); ?>
		<?php echo $form->error($model,'cur_infd'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cur_tperiodo'); ?>
		<?php echo $form->textField($model,'cur_tperiodo'); ?>
		<?php echo $form->error($model,'cur_tperiodo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cur_notas_periodo'); ?>
		<?php echo $form->textField($model,'cur_notas_periodo'); ?>
		<?php echo $form->error($model,'cur_notas_periodo'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->