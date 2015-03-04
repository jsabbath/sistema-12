<?php
/* @var $this InformeDesarrolloController */
/* @var $model InformeDesarrollo */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_id'); ?>
		<?php echo $form->textField($model,'id_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_descripcion'); ?>
		<?php echo $form->textField($model,'id_descripcion',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->