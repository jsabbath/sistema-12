<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/rut.js" type="text/javascript"></script> 
<script type="text/javascript">
    $(document).ready(function() {
        $('#rut').Rut({
            format_on: 'keyup',
 
        });
    })
    
</script>

<?php
/* @var $this MatriculaController */
/* @var $model Matricula */
/* @var $form CActiveForm */
?>
<div class="row">
    <div class="span12 text-center">
        <p class="text-info">Los campos con <span class="required">*</span> son obligatorios.</p>
    </div>
</div>

<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'matricula-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation'=>false,
));
//var_dump($cur_actual);

$random1 = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 5);
$random2 = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 5);
$rand = "X".$random1.$random2;

?>
<div class="row">
    <div class="span12">
        <?php echo $form->errorSummary(array($model,$alumno),'','',array('class'=>'alert alert-error')); ?>
    </div>
</div>

<div class="row">
<div class="span12 offset2">
    <h3>Datos alumno:</h3>
</div>
<div class="span5 offset1">

    <div class="row">
        <?php echo $form->labelEx($alumno,'alum_rut'); ?>
        <?php echo $form->textField($alumno,'alum_rut',array('id'=>'rut')); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($alumno,'alum_nombres'); ?>
        <?php echo $form->textField($alumno,'alum_nombres'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($alumno,'alum_apepat'); ?>
        <?php echo $form->textField($alumno,'alum_apepat'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($alumno,'alum_apemat'); ?>
        <?php echo $form->textField($alumno,'alum_apemat'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($alumno,'alum_f_nac'); ?>
        <?php echo $form->dateField($alumno,'alum_f_nac'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($alumno,'alum_direccion'); ?>
        <?php echo $form->textField($alumno,'alum_direccion'); ?>
    </div>

</div>
<div class="span5 offset1">

    <div class="row">
        <?php echo $form->labelEx($alumno,'alum_region'); ?>
        <?php
        echo $form->dropDownList($alumno, 'alum_region', $region, array(
            'empty' => 'Seleccione region',
            'ajax' => array(
                'type'=>'POST', //request type
                'url'=>CController::createUrl('Alumno/regiones'), //url to call.
                'update'=>'#drop_ciudad', //selector to update
                'data'=>array('id_region' => 'js:this.value'), 
            ),
        ));
        ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($alumno,'alum_ciudad'); ?>
        <?php echo $form->dropDownList($alumno, 'alum_ciudad', array(),array(
            'empty' => 'Seleccione ciudad',
            'id'=>'drop_ciudad',
            'ajax' => array(
                'type'=>'POST', //request type
                'url'=>CController::createUrl('Alumno/ciudades'), //url to call.
                'update'=>'#drop_comuna', //selector to update
                'data'=>array('id_ciudad' => 'js:this.value'), 
            ),
        ));
?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($alumno,'alum_comuna'); ?>
        <?php echo $form->dropDownList($alumno, 'alum_comuna', array(),array(
            'empty'=>'Seleccione comuna',
            'id'=>'drop_comuna',
        ));?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'alum_genero'); ?>
        <?php echo $form->dropDownList($alumno,'alum_genero',$genero,array('prompt'=>'Seleccione genero')); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($alumno,'alum_salud'); ?>
        <?php echo $form->textArea($alumno,'alum_salud'); ?>
        <?php echo $form->error($alumno,'alum_salud'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($alumno,'alum_obs'); ?>
        <?php echo $form->textArea($alumno,'alum_obs'); ?>
    </div>
</div>
</div>
<div class="row">
    <div class="span8 offset2">
        <h3>Datos matricula</h3>
    </div>

    <div class="span5 offset1">
        <div class="row">
            <?php echo $form->labelEx($model,'mat_fingreso'); ?>
            <?php echo $form->dateField($model,'mat_fingreso'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model,'mat_numero'); ?>
            <?php echo $form->textField($model,'mat_numero',array('id'=>'nm','value' => $rand)); ?>
        </div>
    </div>
    <div class="span5 offset1">
        <?php
        if(!$model->isNewRecord){
        ?>
        <div class="row">
            <?php echo $form->labelEx($model,'mat_fretiro'); ?>
            <?php echo $form->dateField($model,'mat_fretiro'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model,'mat_fcambio'); ?>
            <?php echo $form->dateField($model,'mat_fcambio'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model,'mat_estado'); ?>
            <?php echo $form->dropDownList($model,'mat_estado',$estado); ?>
        </div>
        <?php
        }
        ?>
    </div>

    <div class="span12 text-right">
        <?php echo TbHtml::submitButton($model->isNewRecord ? 'Ingresar' : 'Guardar',array('color'=>TbHtml::BUTTON_COLOR_PRIMARY)); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->
