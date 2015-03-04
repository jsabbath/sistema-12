<?php
/* @var $this AreaController */
/* @var $model Area */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'area-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

<div class="span12">
	<div class="text-center">
		<h2>Agregar Area</h2><br/>
	</div>
</div>

<div class="span12">
	<?php echo $form->errorSummary($model); ?>
</div>

<div class="span2"></div>
<div class="span8">
	<div class="text-center">
		<p>Progreso</p>
		<div class="progress progress-success progress-striped active">
  			<div class="bar" style="width: 50%;"></div>
		</div>
	</div>
</div>
<div class="span2"></div>

<div class="span3"></div>
<div class="span6">
	<br/><p class="text-info">Se debe agregar un <strong>Area</strong>
	 y luego seleccionar los <strong>conceptos</strong> que desea tener</p>
</div>
<div class="span3"></div>

<div class="span12">
	<?php echo $form->labelEx($model,'are_descripcion'); ?>
	<?php echo $form->dropDownList($model,'are_descripcion',array(),array('prompt'=>'Seleccione area',
		'id'=>'lista_area',
		'ajax'=>array(
			'type'=>'POST',
			'url'=>CController::createUrl('informeDesarrollo/listaConcepto'),
			'data'=>array('id'=>'js:getNombre'),
			'update'=>'#lista_concepto',
		),
	)); ?>
	<?php echo $form->error($model,'are_descripcion'); ?>
</div>

<div id="lista_concepto">
	
</div>

<div class="span12">
	<?php echo $form->labelEx($model,'are_descripcion'); ?>
	<?php echo $form->textField($model,'are_descripcion',array('size'=>60,'maxlength'=>100)); ?>
	<?php echo $form->error($model,'are_descripcion'); ?>
</div>

<div class="span12">
	<?php echo $form->labelEx($model,'are_infd'); ?>
	<?php echo $form->textField($model,'are_infd'); ?>
	<?php echo $form->error($model,'are_infd'); ?>
</div>

<div class="span12">
	<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
</div>

<?php $this->endWidget(); ?>

</div><!-- form -->