<?php
/* @var $this MatriculaController */
/* @var $model Matricula */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'mat_id'); ?>
		<?php echo $form->textField($model,'mat_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mat_ano'); ?>
		<?php echo $form->textField($model,'mat_ano',array('size'=>4,'maxlength'=>4)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mat_cur'); ?>
		<?php echo $form->textField($model,'mat_cur'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mat_alu_id'); ?>
		<?php echo $form->textField($model,'mat_alu_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mat_fingreso'); ?>
		<?php echo $form->textField($model,'mat_fingreso'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mat_fretiro'); ?>
		<?php echo $form->textField($model,'mat_fretiro'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mat_fcambio'); ?>
		<?php echo $form->textField($model,'mat_fcambio'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mat_numero'); ?>
		<?php echo $form->textField($model,'mat_numero'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->