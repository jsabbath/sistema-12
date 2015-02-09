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

    <?php echo $form->errorSummary($matricula); ?>
    <h3>Datos alumno</h3>
    <div class="row">
        <?php echo $form->labelEx($model,'Nombres'); ?>
        <?php echo $form->textField($model,'alum_nombres'); ?>
        <?php echo $form->error($model,'alum_nombres'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'Apellido paterno'); ?>
        <?php echo $form->textField($model,'alum_apepat'); ?>
        <?php echo $form->error($model,'alum_apepat'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'Apellido materno'); ?>
        <?php echo $form->textField($model,'alum_apemat'); ?>
        <?php echo $form->error($model,'alum_apemat'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'Fecha de nacimiento'); ?>
        <?php echo $form->textField($model,'alum_f_nac'); ?>
        <?php echo $form->error($model,'alum_f_nac'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'Direccion'); ?>
        <?php echo $form->textField($model,'alum_direccion'); ?>
        <?php echo $form->error($model,'alum_direccion'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'Region'); ?>
        <?php
        echo $form->dropDownList($model, 'alum_region', $region, array(
            'prompt' => 'Seleccione region',
            'ajax' => array(
                'type' => 'POST',
                'url' => CController::createUrl('alumno/regiones'),
                'update' => '#Alumno_alum_ciudad',
                )
            ));
        ?>
        <?php echo $form->error($model,'alum_region'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'Ciudad'); ?>
        <?php echo $form->dropDownList($model, 'alum_ciudad', array()); ?>
        <?php echo $form->error($model,'alum_ciudad'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($matricula,'Seleccione genero'); ?>
        <?php echo $form->dropDownList($model,'alum_genero',array("MASCULINO","FEMENINO"),array('promp'=>'Seleccione genero')); ?>
        <?php echo $form->error($matricula,'mat_genero'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'Salud'); ?>
        <?php echo $form->textArea($model,'alum_salud'); ?>
        <?php echo $form->error($model,'alum_salud'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'Observacion'); ?>
        <?php echo $form->textArea($model,'alum_obs'); ?>
        <?php echo $form->error($model,'alum_obs'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'Estado'); ?>
        <?php echo $form->textField($model,'alum_estado'); ?>
        <?php echo $form->error($model,'alum_estado'); ?>
    </div>

    <h3>Datos matricula</h3>
    <div class="row">
        <?php echo $form->labelEx($matricula,'Curso'); ?>
        <?php echo $form->textField($matricula,'mat_cur'); ?>
        <?php echo $form->error($matricula,'mat_cur'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($matricula,'Fecha de ingreso'); ?>
        <?php echo $form->textField($matricula,'mat_fingreso',array('placeholder'=>date('d-m-Y'),'disabled'=>'true')); ?>
        <?php echo $form->error($matricula,'mat_fingreso'); ?>
    </div>
    <?php
    if(!$matricula->isNewRecord){
    ?>
    <div class="row">
        <?php echo $form->labelEx($matricula,'Fecha de retiro'); ?>
        <?php echo $form->textField($matricula,'mat_fretiro'); ?>
        <?php echo $form->error($matricula,'mat_fretiro'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($matricula,'Fecha de cambio'); ?>
        <?php echo $form->textField($matricula,'mat_fcambio'); ?>
        <?php echo $form->error($matricula,'mat_fcambio'); ?>
    </div>
    <?php
    }
    ?>
    <div class="row">
        <?php echo $form->labelEx($matricula,'Numero'); ?>
        <?php echo $form->textField($matricula,'mat_numero'); ?>
        <?php echo $form->error($matricula,'mat_numero'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($matricula->isNewRecord ? 'Create' : 'Save',array('color'=>TbHtml::BUTTON_COLOR_PRIMARY)); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->