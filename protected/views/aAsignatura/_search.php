<?php
/* @var $this AAsignaturaController */
/* @var $model AAsignatura */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'aa_id'); ?>
		<?php echo $form->textField($model,'aa_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'aa_curso'); ?>
		<?php echo $form->textField($model,'aa_curso'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'aa_asignatura'); ?>
		<?php echo $form->textField($model,'aa_asignatura'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'aa_docente'); ?>
		<?php echo $form->textField($model,'aa_docente'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->