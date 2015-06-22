<?php
/* @var $this EventoController */
/* @var $model Evento */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'eve_id'); ?>
		<?php echo $form->textField($model,'eve_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'eve_descripcion'); ?>
		<?php echo $form->textField($model,'eve_descripcion',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'eve_inicio'); ?>
		<?php echo $form->textField($model,'eve_inicio'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'eve_fin'); ?>
		<?php echo $form->textField($model,'eve_fin'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'eve_usuario'); ?>
		<?php echo $form->textField($model,'eve_usuario'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->