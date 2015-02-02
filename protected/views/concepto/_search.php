<?php
/* @var $this ConceptoController */
/* @var $model Concepto */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'con_id'); ?>
		<?php echo $form->textField($model,'con_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'con_descripcion'); ?>
		<?php echo $form->textField($model,'con_descripcion',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'con_area'); ?>
		<?php echo $form->textField($model,'con_area'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->