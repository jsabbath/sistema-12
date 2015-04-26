<?php
/* @var $this NoticiaController */
/* @var $model Noticia */
/* @var $form CActiveForm */
?>

<div class="row">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'noticia-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="span4 offset4">
		<?php echo $form->labelEx($model,'not_titulo'); ?>
		<?php echo $form->textField($model,'not_titulo',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'not_titulo'); ?>
	</div>

	<div class="span4 offset4">
		<?php echo $form->labelEx($model,'not_texto'); ?>
		<?php echo $form->textArea($model,'not_texto',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'not_texto'); ?>
	</div>

	<div class="span2 offset8">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar',array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->