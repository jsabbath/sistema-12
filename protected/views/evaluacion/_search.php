<?php
/* @var $this EvaluacionController */
/* @var $model Evaluacion */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'eva_id'); ?>
		<?php echo $form->textField($model,'eva_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'eva_concepto'); ?>
		<?php echo $form->textField($model,'eva_concepto'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'eva_matricula'); ?>
		<?php echo $form->textField($model,'eva_matricula'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'eva_ano'); ?>
		<?php echo $form->textField($model,'eva_ano'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'eva_nota'); ?>
		<?php echo $form->textField($model,'eva_nota',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->