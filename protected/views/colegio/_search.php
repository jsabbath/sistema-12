<?php
/* @var $this ColegioController */
/* @var $model Colegio */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'col_id'); ?>
		<?php echo $form->textField($model,'col_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'col_rolRBD'); ?>
		<?php echo $form->textField($model,'col_rolRBD',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'col_nombre_colegio'); ?>
		<?php echo $form->textField($model,'col_nombre_colegio',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'col_letra'); ?>
		<?php echo $form->textField($model,'col_letra',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'col_numero'); ?>
		<?php echo $form->textField($model,'col_numero'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'col_ano'); ?>
		<?php echo $form->textField($model,'col_ano'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'col_periodo'); ?>
		<?php echo $form->textField($model,'col_periodo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'col_nombre_director'); ?>
		<?php echo $form->textField($model,'col_nombre_director',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'col_director_email'); ?>
		<?php echo $form->textField($model,'col_director_email',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'col_encargado_actas'); ?>
		<?php echo $form->textField($model,'col_encargado_actas',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'col_fecha_resol_rec_ofic'); ?>
		<?php echo $form->textField($model,'col_fecha_resol_rec_ofic'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'col_numero_resol_rec_ofic'); ?>
		<?php echo $form->textField($model,'col_numero_resol_rec_ofic'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'col_lema'); ?>
		<?php echo $form->textArea($model,'col_lema',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'col_mision'); ?>
		<?php echo $form->textArea($model,'col_mision',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'col_vision'); ?>
		<?php echo $form->textArea($model,'col_vision',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'col_area'); ?>
		<?php echo $form->textField($model,'col_area',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'col_regimen'); ?>
		<?php echo $form->textField($model,'col_regimen',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'col_logo'); ?>
		<?php echo $form->textField($model,'col_logo',array('size'=>60,'maxlength'=>1024)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'col_razon_social'); ?>
		<?php echo $form->textField($model,'col_razon_social',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'col_rut_razon_social'); ?>
		<?php echo $form->textField($model,'col_rut_razon_social',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'col_fecha_primer'); ?>
		<?php echo $form->textField($model,'col_fecha_primer'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'col_fecha_segundo'); ?>
		<?php echo $form->textField($model,'col_fecha_segundo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'col_fecha_tercer'); ?>
		<?php echo $form->textField($model,'col_fecha_tercer'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'col_direccion'); ?>
		<?php echo $form->textField($model,'col_direccion',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'col_comuna'); ?>
		<?php echo $form->textField($model,'col_comuna',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'col_ciudad'); ?>
		<?php echo $form->textField($model,'col_ciudad',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'col_colegio_email'); ?>
		<?php echo $form->textField($model,'col_colegio_email',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'col_telefono'); ?>
		<?php echo $form->textField($model,'col_telefono'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'col_nota_minima'); ?>
		<?php echo $form->textField($model,'col_nota_minima'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'col_nota_maxima'); ?>
		<?php echo $form->textField($model,'col_nota_maxima'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'col_nota_aprovacion'); ?>
		<?php echo $form->textField($model,'col_nota_aprovacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'col_aproximacion'); ?>
		<?php echo $form->textField($model,'col_aproximacion'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->