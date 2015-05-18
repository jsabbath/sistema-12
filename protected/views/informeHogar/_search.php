<?php
/* @var $this InformeHogarController */
/* @var $model InformeHogar */
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
		<?php echo $form->label($model,'ih_descripcion'); ?>
		<?php echo $form->textField($model,'ih_descripcion',array('size'=>60,'maxlength'=>512)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->