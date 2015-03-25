<?php
/* @var $this EscalaController */
/* @var $model Escala */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'esc_id'); ?>
		<?php echo $form->textField($model,'esc_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'esc_descripcion'); ?>
		<?php echo $form->textField($model,'esc_descripcion',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->