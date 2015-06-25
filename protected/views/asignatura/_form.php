<?php
/* @var $this AsignaturaController */
/* @var $model Asignatura */
/* @var $form CActiveForm */
?>

<div class="row">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'asignatura-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

<div class="span12 text-center">
	<p class="text-info">Los campos con <span class="required">*</span> son obligatorios.</p>
</div>

<div class="span12">
	<?php echo $form->errorSummary($model,'','',array('class'=>'alert alert-error')); ?>
</div>

<div class="span4 offset5">
	<?php echo $form->labelEx($model,'asi_descripcion'); ?>
	<?php echo $form->textField($model,'asi_descripcion',array('size'=>60,'maxlength'=>100)); ?>
</div>

<div class="span4 offset5">
	<?php echo $form->labelEx($model,'asi_nombrecorto'); ?>
	<?php echo $form->textField($model,'asi_nombrecorto',array('size'=>5,'maxlength'=>5)); ?>
</div>

<div class="span4 offset5">
	<?php echo $form->labelEx($model,'asi_codigo'); ?>
	<?php echo $form->textField($model,'asi_codigo',array('size'=>10,'maxlength'=>10)); ?>
</div>

<div class="span4 offset5">
	<?php echo $form->labelEx($model,'asi_orden'); ?>
	<?php echo $form->textField($model,'asi_orden',array('size'=>1,'maxlength'=>2)); ?>
</div>
<br>

<div class="span2 offset8">
	<?php echo CHtml::submitButton($model->isNewRecord ? 'Ingresar' : 'Guardar',array('class'=>'btn btn-primary')); ?>
</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<br>