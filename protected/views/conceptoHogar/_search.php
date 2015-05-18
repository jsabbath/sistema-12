<?php
/* @var $this ConceptoHogarController */
/* @var $model ConceptoHogar */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'ch_id'); ?>
		<?php echo $form->textField($model,'ch_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ch_descripcion'); ?>
		<?php echo $form->textField($model,'ch_descripcion',array('size'=>60,'maxlength'=>1024)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ch_area_hogar'); ?>
		<?php echo $form->textField($model,'ch_area_hogar'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->