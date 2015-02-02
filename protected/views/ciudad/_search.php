<?php
/* @var $this CiudadController */
/* @var $model Ciudad */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'ciu_id'); ?>
		<?php echo $form->textField($model,'ciu_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ciu_descripcion'); ?>
		<?php echo $form->textField($model,'ciu_descripcion',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ciu_reg'); ?>
		<?php echo $form->textField($model,'ciu_reg'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->