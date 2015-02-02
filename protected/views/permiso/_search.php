<?php
/* @var $this PermisoController */
/* @var $model Permiso */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'per_id'); ?>
		<?php echo $form->textField($model,'per_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'per_descripcion'); ?>
		<?php echo $form->textField($model,'per_descripcion',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'per_estado'); ?>
		<?php echo $form->textField($model,'per_estado',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'per_cargo'); ?>
		<?php echo $form->textField($model,'per_cargo'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->