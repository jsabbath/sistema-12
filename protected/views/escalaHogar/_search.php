<?php
/* @var $this EscalaHogarController */
/* @var $model EscalaHogar */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'eh_id'); ?>
		<?php echo $form->textField($model,'eh_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'eh_descripcion'); ?>
		<?php echo $form->textField($model,'eh_descripcion',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->