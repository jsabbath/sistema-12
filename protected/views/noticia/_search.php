<?php
/* @var $this NoticiaController */
/* @var $model Noticia */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'not_id'); ?>
		<?php echo $form->textField($model,'not_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'not_user'); ?>
		<?php echo $form->textField($model,'not_user'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'not_fecha'); ?>
		<?php echo $form->textField($model,'not_fecha'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'not_titulo'); ?>
		<?php echo $form->textField($model,'not_titulo',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'not_texto'); ?>
		<?php echo $form->textArea($model,'not_texto',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'not_programa'); ?>
		<?php echo $form->textArea($model,'not_programa',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'not_responsable'); ?>
		<?php echo $form->textArea($model,'not_responsable',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->