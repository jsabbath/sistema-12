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
		<?php echo $form->labelEx($alumno,'Nombres'); ?>
		<?php echo $form->textField($alumno,'alum_nombres'); ?>
		<?php echo $form->error($alumno,'alum_nombres'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($alumno,'Apellido paterno'); ?>
		<?php echo $form->textField($alumno,'alum_apepat'); ?>
		<?php echo $form->error($alumno,'alum_apepat'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($alumno,'Apellido materno'); ?>
		<?php echo $form->textField($alumno,'alum_apemat'); ?>
		<?php echo $form->error($alumno,'alum_apemat'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($alumno,'Fecha de nacimiento'); ?>
		<?php echo $form->textField($alumno,'alum_f_nac'); ?>
		<?php echo $form->error($alumno,'alum_f_nac'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($alumno,'Direccion'); ?>
		<?php echo $form->textField($alumno,'alum_direccion'); ?>
		<?php echo $form->error($alumno,'alum_direccion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($alumno,'Region'); ?>
		<?php
		echo $form->dropDownList($alumno, 'alum_region', $region, array(
			'prompt' => 'Seleccione region',
			'ajax' => array(
				'type' => 'POST',
				'url' => CController::createUrl('alumno/regiones'),
				'update' => '#Alumno_alum_ciudad',
				)
			));
		?>
		<?php echo $form->error($alumno,'alum_region'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($alumno,'Ciudad'); ?>
		<?php echo $form->dropDownList($alumno, 'alum_ciudad', array(),array(
			'prompt' => 'Seleccione ciudad',
			'ajax' => array(
				'type' => 'POST',
				'url' => CController::createUrl('alumno/ciudades'),
				'update' => '#Alumno_alum_comuna',
			)));
?>
		<?php echo $form->error($alumno,'alum_ciudad'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($alumno,'Comuna'); ?>
		<?php echo $form->dropDownList($alumno, 'alum_comuna', array()); ?>
		<?php echo $form->error($alumno,'alum_comuna'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Seleccione genero'); ?>
		<?php echo $form->dropDownList($alumno,'alum_genero',array("MASCULINO","FEMENINO"),array('promp'=>'Seleccione genero')); ?>
		<?php echo $form->error($model,'mat_genero'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($alumno,'Salud'); ?>
		<?php echo $form->textArea($alumno,'alum_salud'); ?>
		<?php echo $form->error($alumno,'alum_salud'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($alumno,'Observacion'); ?>
		<?php echo $form->textArea($alumno,'alum_obs'); ?>
		<?php echo $form->error($alumno,'alum_obs'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($alumno,'Estado'); ?>
		<?php echo $form->textField($alumno,'alum_estado'); ?>
		<?php echo $form->error($alumno,'alum_estado'); ?>
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
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('color'=>TbHtml::BUTTON_COLOR_PRIMARY)); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->