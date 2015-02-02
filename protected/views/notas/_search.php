<?php
/* @var $this NotasController */
/* @var $model Notas */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'not_id'); ?>
		<?php echo $form->textField($model,'not_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'not_aa'); ?>
		<?php echo $form->textField($model,'not_aa'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'not_01'); ?>
		<?php echo $form->textField($model,'not_01'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'not_02'); ?>
		<?php echo $form->textField($model,'not_02'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'not_03'); ?>
		<?php echo $form->textField($model,'not_03'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'not_04'); ?>
		<?php echo $form->textField($model,'not_04'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'not_05'); ?>
		<?php echo $form->textField($model,'not_05'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'not_06'); ?>
		<?php echo $form->textField($model,'not_06'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'not_07'); ?>
		<?php echo $form->textField($model,'not_07'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'not_08'); ?>
		<?php echo $form->textField($model,'not_08'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'not_09'); ?>
		<?php echo $form->textField($model,'not_09'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'not_10'); ?>
		<?php echo $form->textField($model,'not_10'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'not_11'); ?>
		<?php echo $form->textField($model,'not_11'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'not_12'); ?>
		<?php echo $form->textField($model,'not_12'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'not_13'); ?>
		<?php echo $form->textField($model,'not_13'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'not_14'); ?>
		<?php echo $form->textField($model,'not_14'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'not_15'); ?>
		<?php echo $form->textField($model,'not_15'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'not_16'); ?>
		<?php echo $form->textField($model,'not_16'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'not_17'); ?>
		<?php echo $form->textField($model,'not_17'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'not_18'); ?>
		<?php echo $form->textField($model,'not_18'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'not_19'); ?>
		<?php echo $form->textField($model,'not_19'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'not_20'); ?>
		<?php echo $form->textField($model,'not_20'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'not_21'); ?>
		<?php echo $form->textField($model,'not_21'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'not_22'); ?>
		<?php echo $form->textField($model,'not_22'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'not_23'); ?>
		<?php echo $form->textField($model,'not_23'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'not_24'); ?>
		<?php echo $form->textField($model,'not_24'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'not_25'); ?>
		<?php echo $form->textField($model,'not_25'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'not_26'); ?>
		<?php echo $form->textField($model,'not_26'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'not_27'); ?>
		<?php echo $form->textField($model,'not_27'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'not_28'); ?>
		<?php echo $form->textField($model,'not_28'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'not_29'); ?>
		<?php echo $form->textField($model,'not_29'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'not_30'); ?>
		<?php echo $form->textField($model,'not_30'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->