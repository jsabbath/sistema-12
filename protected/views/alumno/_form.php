<?php
/* @var $this AlumnoController */
/* @var $model Alumno */
/* @var $form TbActiveForm */
?>

<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'alumno-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

    <p class="help-block">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

            <?php echo $form->textFieldControlGroup($model,'alum_rut',array('span'=>5,'maxlength'=>12)); ?>

            <?php echo $form->textFieldControlGroup($model,'alum_nombres',array('span'=>5,'maxlength'=>100)); ?>

            <?php echo $form->textFieldControlGroup($model,'alum_apepat',array('span'=>5,'maxlength'=>50)); ?>

            <?php echo $form->textFieldControlGroup($model,'alum_apemat',array('span'=>5,'maxlength'=>50)); ?>

            <?php echo $form->textFieldControlGroup($model,'alum_f_nac',array('span'=>5)); ?>

            <?php echo $form->textFieldControlGroup($model,'alum_direccion',array('span'=>5,'maxlength'=>100)); ?>

            <?php echo $form->textFieldControlGroup($model,'alum_region',array('span'=>5)); ?>

            <?php echo $form->textFieldControlGroup($model,'alum_ciudad',array('span'=>5)); ?>

            <?php echo $form->textFieldControlGroup($model,'alum_comuna',array('span'=>5)); ?>

            <?php echo $form->textFieldControlGroup($model,'alum_genero',array('span'=>5)); ?>

            <?php echo $form->textAreaControlGroup($model,'alum_salud',array('rows'=>6,'span'=>8)); ?>

            <?php echo $form->textAreaControlGroup($model,'alum_obs',array('rows'=>6,'span'=>8)); ?>

            <?php echo $form->textFieldControlGroup($model,'alum_estado',array('span'=>5)); ?>

        <div class="form-actions">
        <?php echo TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array(
		    'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
		    'size'=>TbHtml::BUTTON_SIZE_LARGE,
		)); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->