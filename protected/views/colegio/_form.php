<?php
/* @var $this ColegioController */
/* @var $model Colegio */
/* @var $form CActiveForm */
?>

<div class="row">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'colegio-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>
	<div class="span12 text-center">
		<p class="text-info">Los campos con <span class="required">*</span> son requeridos.</p>
	</div>

	<div class="span12">
		<?php echo $form->errorSummary($model); ?>
	</div>

	<div class="span6">
		<div class="row">
			<div class="span6">
				<?php echo $form->labelEx($model,'col_rolRBD'); ?>
				<?php echo $form->textField($model,'col_rolRBD',array('size'=>20,'maxlength'=>20)); ?>
				<?php echo $form->error($model,'col_rolRBD'); ?>
			</div>
		</div>

		<div class="row">
			<div class="span6">
				<?php echo $form->labelEx($model,'col_nombre_colegio'); ?>
				<?php echo $form->textField($model,'col_nombre_colegio',array('size'=>50,'maxlength'=>50)); ?>
				<?php echo $form->error($model,'col_nombre_colegio'); ?>
			</div>
		</div>

		<div class="row">
			<div class="span6">
				<?php echo $form->labelEx($model,'col_letra'); ?>
				<?php echo $form->textField($model,'col_letra',array('size'=>1,'maxlength'=>1)); ?>
				<?php echo $form->error($model,'col_letra'); ?>
			</div>
		</div>

		<div class="row">
			<div class="span6">
				<?php echo $form->labelEx($model,'col_numero'); ?>
				<?php echo $form->textField($model,'col_numero'); ?>
				<?php echo $form->error($model,'col_numero'); ?>
			</div>
		</div>

		<div class="row">
			<div class="span6">
				<?php echo $form->labelEx($model,'col_ano'); ?>
				<?php echo $form->textField($model,'col_ano'); ?>
				<?php echo $form->error($model,'col_ano'); ?>
			</div>
		</div>

		<div class="row">
			<div class="span6">
				<?php echo $form->labelEx($model,'col_periodo'); ?>
				<?php echo $form->textField($model,'col_periodo'); ?>
				<?php echo $form->error($model,'col_periodo'); ?>
			</div>
		</div>

		<div class="row">
			<div class="span6">
				<?php echo $form->labelEx($model,'col_nombre_director'); ?>
				<?php echo $form->textField($model,'col_nombre_director',array('size'=>60,'maxlength'=>255)); ?>
				<?php echo $form->error($model,'col_nombre_director'); ?>
			</div>
		</div>

		<div class="row">
			<div class="span6">
				<?php echo $form->labelEx($model,'col_director_email'); ?>
				<?php echo $form->textField($model,'col_director_email',array('size'=>60,'maxlength'=>255)); ?>
				<?php echo $form->error($model,'col_director_email'); ?>
			</div>
		</div>

		<div class="row">
			<div class="span6">
				<?php echo $form->labelEx($model,'col_encargado_actas'); ?>
				<?php echo $form->textField($model,'col_encargado_actas',array('size'=>60,'maxlength'=>255)); ?>
				<?php echo $form->error($model,'col_encargado_actas'); ?>
			</div>
		</div>

		<div class="row">
			<div class="span6">
				<?php echo $form->labelEx($model,'col_fecha_resol_rec_ofic'); ?>
				<?php echo $form->textField($model,'col_fecha_resol_rec_ofic'); ?>
				<?php echo $form->error($model,'col_fecha_resol_rec_ofic'); ?>
			</div>
		</div>

		<div class="row">
			<div class="span6">
				<?php echo $form->labelEx($model,'col_numero_resol_rec_ofic'); ?>
				<?php echo $form->textField($model,'col_numero_resol_rec_ofic'); ?>
				<?php echo $form->error($model,'col_numero_resol_rec_ofic'); ?>
			</div>
		</div>

		<div class="row">
			<div class="span6">
				<?php echo $form->labelEx($model,'col_lema'); ?>
				<?php echo $form->textArea($model,'col_lema',array('rows'=>6, 'cols'=>50)); ?>
				<?php echo $form->error($model,'col_lema'); ?>
			</div>
		</div>

		<div class="row">
			<div class="span6">
				<?php echo $form->labelEx($model,'col_mision'); ?>
				<?php echo $form->textArea($model,'col_mision',array('rows'=>6, 'cols'=>50)); ?>
				<?php echo $form->error($model,'col_mision'); ?>
			</div>
		</div>

		<div class="row">
			<div class="span6">
				<?php echo $form->labelEx($model,'col_vision'); ?>
				<?php echo $form->textArea($model,'col_vision',array('rows'=>6, 'cols'=>50)); ?>
				<?php echo $form->error($model,'col_vision'); ?>
			</div>
		</div>
	</div>

	<div class="span6">
		<div class="row">
			<div class="span6">
				<?php echo $form->labelEx($model,'col_area'); ?>
				<?php echo $form->textField($model,'col_area',array('size'=>20,'maxlength'=>20)); ?>
				<?php echo $form->error($model,'col_area'); ?>
			</div>
		</div>

		<div class="row">
			<div class="span6">
				<?php echo $form->labelEx($model,'col_regimen'); ?>
				<?php echo $form->textField($model,'col_regimen',array('size'=>20,'maxlength'=>20)); ?>
				<?php echo $form->error($model,'col_regimen'); ?>
			</div>
		</div>

		<div class="row">
			<div class="span6">
				<?php echo $form->labelEx($model,'col_logo'); ?>
				<?php echo $form->textField($model,'col_logo',array('size'=>60,'maxlength'=>1024)); ?>
				<?php echo $form->error($model,'col_logo'); ?>
			</div>
		</div>

		<div class="row">
			<div class="span6">
				<?php echo $form->labelEx($model,'col_razon_social'); ?>
				<?php echo $form->textField($model,'col_razon_social',array('size'=>60,'maxlength'=>255)); ?>
				<?php echo $form->error($model,'col_razon_social'); ?>
			</div>
		</div>

		<div class="row">
			<div class="span6">
				<?php echo $form->labelEx($model,'col_rut_razon_social'); ?>
				<?php echo $form->textField($model,'col_rut_razon_social',array('size'=>20,'maxlength'=>20)); ?>
				<?php echo $form->error($model,'col_rut_razon_social'); ?>
			</div>
		</div>

		<div class="row">
			<div class="span6">
				<?php echo $form->labelEx($model,'col_fecha_primer'); ?>
				<?php echo $form->textField($model,'col_fecha_primer'); ?>
				<?php echo $form->error($model,'col_fecha_primer'); ?>
			</div>
		</div>

		<div class="row">
			<div class="span6">
				<?php echo $form->labelEx($model,'col_fecha_segundo'); ?>
				<?php echo $form->textField($model,'col_fecha_segundo'); ?>
				<?php echo $form->error($model,'col_fecha_segundo'); ?>
			</div>	
		</div>

		<div class="row">
			<div class="span6">
				<?php echo $form->labelEx($model,'col_fecha_tercer'); ?>
				<?php echo $form->textField($model,'col_fecha_tercer'); ?>
				<?php echo $form->error($model,'col_fecha_tercer'); ?>
			</div>
		</div>

		<div class="row">
			<div class="span6">
				<?php echo $form->labelEx($model,'col_direccion'); ?>
				<?php echo $form->textField($model,'col_direccion',array('size'=>60,'maxlength'=>255)); ?>
				<?php echo $form->error($model,'col_direccion'); ?>
			</div>
		</div>

		<div class="row">
			<div class="span6">
				<?php echo $form->labelEx($model,'col_comuna'); ?>
				<?php echo $form->textField($model,'col_comuna',array('size'=>50,'maxlength'=>50)); ?>
				<?php echo $form->error($model,'col_comuna'); ?>
			</div>
		</div>

		<div class="row">
			<div class="span6">
				<?php echo $form->labelEx($model,'col_ciudad'); ?>
				<?php echo $form->textField($model,'col_ciudad',array('size'=>50,'maxlength'=>50)); ?>
				<?php echo $form->error($model,'col_ciudad'); ?>
			</div>
		</div>

		<div class="row">
			<div class="span6">
				<?php echo $form->labelEx($model,'col_colegio_email'); ?>
				<?php echo $form->textField($model,'col_colegio_email',array('size'=>60,'maxlength'=>255)); ?>
				<?php echo $form->error($model,'col_colegio_email'); ?>
			</div>
		</div>

		<div class="row">
			<div class="span6">
				<?php echo $form->labelEx($model,'col_telefono'); ?>
				<?php echo $form->textField($model,'col_telefono'); ?>
				<?php echo $form->error($model,'col_telefono'); ?>
			</div>
		</div>

		<div class="row">
			<div class="span6">
				<?php echo $form->labelEx($model,'col_nota_minima'); ?>
				<?php echo $form->textField($model,'col_nota_minima'); ?>
				<?php echo $form->error($model,'col_nota_minima'); ?>
			</div>
		</div>

		<div class="row">
			<div class="span6">
				<?php echo $form->labelEx($model,'col_nota_maxima'); ?>
				<?php echo $form->textField($model,'col_nota_maxima'); ?>
				<?php echo $form->error($model,'col_nota_maxima'); ?>
			</div>
		</div>

		<div class="row">
			<div class="span6">
				<?php echo $form->labelEx($model,'col_nota_aprovacion'); ?>
				<?php echo $form->textField($model,'col_nota_aprovacion'); ?>
				<?php echo $form->error($model,'col_nota_aprovacion'); ?>
			</div>
		</div>

		<div class="row">
			<div class="span6">
				<?php echo $form->labelEx($model,'col_aproximacion'); ?>
				<?php echo $form->textField($model,'col_aproximacion'); ?>
				<?php echo $form->error($model,'col_aproximacion'); ?>
			</div>
		</div>
	</div>


	<div class="span2 offset8">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Guardar' : 'Guardar',array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->