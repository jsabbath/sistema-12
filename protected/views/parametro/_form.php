<?php
/* @var $this ParametroController */
/* @var $model Parametro */
/* @var $form CActiveForm */
?>

<div class="row">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'parametro-form',
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
	<?php echo $form->errorSummary($model); ?>
</div>
	
<div class="span4 offset4">
	<?php echo $form->labelEx($model,'par_item'); ?>
	<?php echo $form->textField($model,'par_item',array('size'=>50,'maxlength'=>50)); ?>
</div>

<div class="span4 offset4">
	<?php echo $form->labelEx($model,'par_descripcion'); ?>
	<?php echo $form->textField($model,'par_descripcion',array('size'=>50,'maxlength'=>50)); ?>
</div>

<div class="span2 offset8">
	<?php echo CHtml::submitButton($model->isNewRecord ? 'Ingresar' : 'Guardar',array('class'=>'btn btn-primary')); ?>
</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<br>