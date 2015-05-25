<?php
/* @var $this InfHogarController */
/* @var $model InfHogar */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'ih_id'); ?>
		<?php echo $form->textField($model,'ih_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ih_informe'); ?>
		<?php echo $form->textField($model,'ih_informe',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ih_area'); ?>
		<?php echo $form->textField($model,'ih_area',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ih_concepto'); ?>
		<?php echo $form->textField($model,'ih_concepto',array('size'=>60,'maxlength'=>1024)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->