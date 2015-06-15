<?php
/* @var $this ApoderadoController */
/* @var $model Apoderado */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'apo_id'); ?>
		<?php echo $form->textField($model,'apo_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'apo_nombre1'); ?>
		<?php echo $form->textField($model,'apo_nombre1',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'apo_nombre2'); ?>
		<?php echo $form->textField($model,'apo_nombre2',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'apo_apepat'); ?>
		<?php echo $form->textField($model,'apo_apepat',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'apo_apemat'); ?>
		<?php echo $form->textField($model,'apo_apemat',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ape_rut'); ?>
		<?php echo $form->textField($model,'ape_rut',array('size'=>12,'maxlength'=>12)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'apo_ano'); ?>
		<?php echo $form->textField($model,'apo_ano'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ape_hijo'); ?>
		<?php echo $form->textField($model,'ape_hijo'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->