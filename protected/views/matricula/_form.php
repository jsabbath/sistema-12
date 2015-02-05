<?php
/* @var $this MatriculaController */
/* @var $model Matricula */
/* @var $form CActiveForm */

?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'matricula-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
));
//var_dump($ciudad);
?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	<h3>Datos alumno</h3>
	<div class="row">
		<?php echo $form->labelEx($alumnoModel,'Nombres'); ?>
		<?php echo $form->textField($alumnoModel,'alum_nombres'); ?>
		<?php echo $form->error($alumnoModel,'alum_nombres'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($alumnoModel,'Apellido paterno'); ?>
		<?php echo $form->textField($alumnoModel,'alum_apepat'); ?>
		<?php echo $form->error($alumnoModel,'alum_apepat'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($alumnoModel,'Apellido materno'); ?>
		<?php echo $form->textField($alumnoModel,'alum_apemat'); ?>
		<?php echo $form->error($alumnoModel,'alum_apemat'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($alumnoModel,'Fecha de nacimiento'); ?>
		<?php echo $form->textField($alumnoModel,'alum_f_nac'); ?>
		<?php echo $form->error($alumnoModel,'alum_f_nac'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($alumnoModel,'Direccion'); ?>
		<?php echo $form->textField($alumnoModel,'alum_direccion'); ?>
		<?php echo $form->error($alumnoModel,'alum_direccion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($alumnoModel,'Region'); ?>
		<?php echo $form->dropDownList($alumnoModel,'alum_region',$region,array('promp'=>'Seleccione region')); ?>
		<?php echo $form->error($alumnoModel,'alum_region'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($alumnoModel,'Ciudad'); ?>
		<?php echo $form->dropDownList($alumnoModel,'alum_ciudad', $ciudad,array('promp'=>'Seleccione ciudad')); ?>
		<?php echo $form->error($alumnoModel,'alum_ciudad'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($alumnoModel,'Comuna'); ?>
		<?php echo $form->dropDownList($alumnoModel,'alum_comuna', $comuna,array('promp'=>'Seleccione comuna')); ?>
		<?php echo $form->error($alumnoModel,'alum_comuna'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Seleccione genero'); ?>
		<?php echo $form->dropDownList($alumnoModel,'alum_genero',array("Masculino","Femenino"),array('promp'=>'Seleccione genero')); ?>
		<?php echo $form->error($model,'mat_genero'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($alumnoModel,'Salud'); ?>
		<?php echo $form->textArea($alumnoModel,'alum_salud'); ?>
		<?php echo $form->error($alumnoModel,'alum_salud'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($alumnoModel,'Observacion'); ?>
		<?php echo $form->textArea($alumnoModel,'alum_obs'); ?>
		<?php echo $form->error($alumnoModel,'alum_obs'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($alumnoModel,'Estado'); ?>
		<?php echo $form->textField($alumnoModel,'alum_estado'); ?>
		<?php echo $form->error($alumnoModel,'alum_estado'); ?>
	</div>

	<h3>Datos matricula</h3>
	<div class="row">
		<?php echo $form->labelEx($model,'Curso'); ?>
		<?php echo $form->textField($model,'mat_cur'); ?>
		<?php echo $form->error($model,'mat_cur'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Fecha de ingreso'); ?>
		<?php echo $form->textField($model,'mat_fingreso',array('placeholder'=>date('d-m-Y'),'disabled'=>'true')); ?>
		<?php echo $form->error($model,'mat_fingreso'); ?>
	</div>
	<?php
	if(!$model->isNewRecord){
	?>
	<div class="row">
		<?php echo $form->labelEx($model,'Fecha de retiro'); ?>
		<?php echo $form->textField($model,'mat_fretiro'); ?>
		<?php echo $form->error($model,'mat_fretiro'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Fecha de cambio'); ?>
		<?php echo $form->textField($model,'mat_fcambio'); ?>
		<?php echo $form->error($model,'mat_fcambio'); ?>
	</div>
	<?php
	}
	?>
	<div class="row">
		<?php echo $form->labelEx($model,'Numero'); ?>
		<?php echo $form->textField($model,'mat_numero'); ?>
		<?php echo $form->error($model,'mat_numero'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->