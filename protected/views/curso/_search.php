<?php
/* @var $this CursoController */
/* @var $model Curso */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'cur_id'); ?>
		<?php echo $form->textField($model,'cur_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cur_ano'); ?>
		<?php echo $form->textField($model,'cur_ano',array('size'=>4,'maxlength'=>4)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cur_nivel'); ?>
		<?php echo $form->textField($model,'cur_nivel'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cur_jornada'); ?>
		<?php echo $form->textField($model,'cur_jornada'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cur_letra'); ?>
		<?php echo $form->textField($model,'cur_letra'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cur_pjefe'); ?>
		<?php echo $form->textField($model,'cur_pjefe'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cur_infd'); ?>
		<?php echo $form->textField($model,'cur_infd'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cur_tperiodo'); ?>
		<?php echo $form->textField($model,'cur_tperiodo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cur_notas_periodo'); ?>
		<?php echo $form->textField($model,'cur_notas_periodo'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->