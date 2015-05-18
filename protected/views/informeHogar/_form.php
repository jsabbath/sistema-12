<?php
/* @var $this InformeHogarController */
/* @var $model InformeHogar */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'informe-hogar-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

<div class="row">
	<div class="span12 text-center">
		<br/><p class="text-info">Para crear un <strong>Informe al Hogar</strong> primero se debe ingresar un nombre que lo identifique.
		posteriormente se agregan las areas y conceptos.</p>
	</div>
</div>

<div class="row">

</div>
	<div class="span12">
		<?php echo $form->errorSummary($model); ?>
	</div>
</div>

<div class="row">
	<div class="span12 text-center">
		<?php echo $form->labelEx($model,'ih_descripcion'); ?>
		<?php echo $form->textField($model,'ih_descripcion',array('size'=>60,'maxlength'=>512,'class'=>'input-xlarge')); ?>
	</div>
</div>

<div class="row">
	<div class="span2 offset8">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar',array('class'=>'btn btn-primary')); ?>
	</div>
</div>

<?php $this->endWidget(); ?>
<br>
</div><!-- form -->