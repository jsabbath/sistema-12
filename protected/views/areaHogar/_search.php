<?php
/* @var $this AreaHogarController */
/* @var $model AreaHogar */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'ah_id'); ?>
		<?php echo $form->textField($model,'ah_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ah_descripcion'); ?>
		<?php echo $form->textField($model,'ah_descripcion',array('size'=>60,'maxlength'=>512)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ah_inf_hogar'); ?>
		<?php echo $form->textField($model,'ah_inf_hogar'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->