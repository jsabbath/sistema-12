<?php
/* @var $this AreaController */
/* @var $model Area */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'are_id'); ?>
		<?php echo $form->textField($model,'are_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'are_descripcion'); ?>
		<?php echo $form->textField($model,'are_descripcion',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'are_infd'); ?>
		<?php echo $form->textField($model,'are_infd'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->