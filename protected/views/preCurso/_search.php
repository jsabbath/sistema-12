<?php
/* @var $this PreCursoController */
/* @var $model PreCurso */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'pre_id'); ?>
		<?php echo $form->textField($model,'pre_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pre_ano'); ?>
		<?php echo $form->textField($model,'pre_ano'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pre_nivel'); ?>
		<?php echo $form->textField($model,'pre_nivel'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pre_letra'); ?>
		<?php echo $form->textField($model,'pre_letra'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pre_jornada'); ?>
		<?php echo $form->textField($model,'pre_jornada'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pre_pjefe'); ?>
		<?php echo $form->textField($model,'pre_pjefe'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->