

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
    <div class="span8 offset2">
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
        <?php echo $form->textField($alumno,'alum_f_nac',array('class'=>'datepicker')); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($alumno,'alum_direccion'); ?>
        <?php echo $form->textField($alumno,'alum_direccion'); ?>
    </div>

</div>
<div class="span5 offset1">

            <?php if( $model->isNewRecord ){ ?> 
                <div class="row">
                    <?php echo $form->labelEx($alumno,'alum_region'); ?>
                    <?php
                    echo $form->dropDownList($alumno, 'alum_region', $region, array(
                        'empty' => 'Seleccione region',
                        'id'    => 'drop_region', 
                    ));
                    ?>
                </div>

                <div class="row">
                    <?php echo $form->labelEx($alumno,'alum_ciudad'); ?>
                    <?php echo $form->dropDownList($alumno, 'alum_ciudad', array(),array(
                        'empty' => 'Seleccione ciudad',
                        'id'=>'drop_ciudad',
                        'disabled'=>'disabled',
                    ));?>
                </div>

                <div class="row">
                    <?php echo $form->labelEx($alumno,'alum_comuna'); ?>
                    <?php echo $form->dropDownList($alumno, 'alum_comuna', array(),array(
                        'empty'=>'Seleccione comuna',
                        'id'=>'drop_comuna',
                        'disabled'=>'disabled',
                    ));?>
                </div>

                <script type="text/javascript">
                    $('#drop_region').on('change',function(){
                        $.ajax({
                            url: '<?php echo CController::createUrl('Alumno/regiones'); ?>',
                            type: 'POST',
                            data: {id_region: this.value},
                        })
                        .done(function(response) {
                            $('#drop_ciudad').html(response);
                            $('#drop_ciudad').prop("disabled", false);
                            $('#drop_comuna').prop("disabled", true);
                             $('#drop_comuna').html("<option value=0>Seleccione comuna<option>");
                        })
                        
                    })
        
                    $('#drop_ciudad').on('change',function(){
                        $.ajax({
                            url: '<?php echo CController::createUrl('Alumno/ciudades'); ?>',
                            type: 'POST',
                            data: {id_ciudad: this.value},
                        })
                        .done(function(response) {
                            $('#drop_comuna').html(response);
                            $('#drop_comuna').prop("disabled", false);
                        })
                        
                    })

                </script>



            <?php } else{ ?>

                <div class="row">
                    <?php echo $form->labelEx($alumno,'alum_region'); ?>
                    <?php
                    echo $form->dropDownList($alumno, 'alum_region', $region, array(
                        'prompt'=>'Seleccione region',
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
                    <?php echo $form->dropDownList($alumno, 'alum_ciudad', $ciudad,array(
                        'prompt'=>'Seleccione ciudad',
                        'id'=>'drop_ciudad',
                        'ajax' => array(
                            'type'=>'POST', //request type
                            'url'=>CController::createUrl('Alumno/ciudades'), //url to call.
                            'update'=>'#drop_comuna', //selector to update
                            'data'=>array('id_ciudad' => 'js:this.value'), 
                        ),
                    ));?>
                </div>

                <div class="row">
                    <?php echo $form->labelEx($alumno,'alum_comuna'); ?>
                    <?php echo $form->dropDownList($alumno, 'alum_comuna', $comuna,array(
                        'prompt'=>'Seleccione comuna',
                        'id'=>'drop_comuna',
                    ));?>
                </div>

            <?php } ?>

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
            <?php echo $form->textField($model,'mat_fingreso',array('class'=>'datepicker')); ?>
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
            <?php echo $form->textField($model,'mat_fretiro',array('class'=>'datepicker')); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model,'mat_fcambio'); ?>
            <?php echo $form->textField($model,'mat_fcambio',array('class'=>'datepicker')); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model,'mat_estado'); ?>
            <?php echo $form->dropDownList($model,'mat_estado',$estado); ?>
        </div>
        <?php
        }
        ?>

       <div class="text-left">
            <?php echo TbHtml::submitButton($model->isNewRecord ? 'Ingresar' : 'Guardar',array('color'=>TbHtml::BUTTON_COLOR_PRIMARY, 'size' => TbHtml::BUTTON_SIZE_LARGE)); ?> 
       </div>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<script type="text/javascript">
    
$('.datepicker').datepicker({format: 'yyyy/mm/dd',});


</script>