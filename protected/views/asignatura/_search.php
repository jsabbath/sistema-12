<?php
/* @var $this AsignaturaController */
/* @var $model Asignatura */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'asi_id'); ?>
		<?php echo $form->textField($model,'asi_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'asi_descripcion'); ?>
		<?php echo $form->textField($model,'asi_descripcion',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'asi_codigo'); ?>
		<?php echo $form->textField($model,'asi_codigo',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'asi_nombrecorto'); ?>
		<?php echo $form->textField($model,'asi_nombrecorto',array('size'=>5,'maxlength'=>5)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->