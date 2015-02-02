<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'usu_id'); ?>
		<?php echo $form->textField($model,'usu_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'usu_nombres'); ?>
		<?php echo $form->textField($model,'usu_nombres',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'usu_apepat'); ?>
		<?php echo $form->textField($model,'usu_apepat',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'usu_apemat'); ?>
		<?php echo $form->textField($model,'usu_apemat',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'usu_rut'); ?>
		<?php echo $form->textField($model,'usu_rut'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'usu_cargo'); ?>
		<?php echo $form->textField($model,'usu_cargo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'usu_estado'); ?>
		<?php echo $form->textField($model,'usu_estado'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->