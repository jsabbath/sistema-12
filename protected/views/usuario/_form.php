<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'usuario-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'usu_nombres'); ?>
		<?php echo $form->textField($model,'usu_nombres',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'usu_nombres'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'usu_apepat'); ?>
		<?php echo $form->textField($model,'usu_apepat',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'usu_apepat'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'usu_apemat'); ?>
		<?php echo $form->textField($model,'usu_apemat',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'usu_apemat'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'usu_rut'); ?>
		<?php echo $form->textField($model,'usu_rut'); ?>
		<?php echo $form->error($model,'usu_rut'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'usu_cargo'); ?>
		<?php echo $form->textField($model,'usu_cargo'); ?>
		<?php echo $form->error($model,'usu_cargo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'usu_estado'); ?>
		<?php echo $form->textField($model,'usu_estado'); ?>
		<?php echo $form->error($model,'usu_estado'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->