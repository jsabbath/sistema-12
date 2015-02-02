<?php
/* @var $this ComunaController */
/* @var $model Comuna */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'com_id'); ?>
		<?php echo $form->textField($model,'com_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'com_descripcion'); ?>
		<?php echo $form->textField($model,'com_descripcion',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'com_ciu'); ?>
		<?php echo $form->textField($model,'com_ciu'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->