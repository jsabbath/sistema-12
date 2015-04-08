<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-ui.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery-ui.css">
<?php
/* @var $this CursoController */
/* @var $model Curso */
/* @var $form CActiveForm */
?>
<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'curso-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation'=>false,
)); ?>

<?php echo $form->errorSummary($model); ?>

<div class="row">
    <div class="span5 offset1">
        <div class="row"> 
            <?php echo $form->labelEx($model,'cur_ano'); ?>
            <?php echo $form->textField($model,'cur_ano',array('size'=>4,'maxlength'=>4, 'placeholder'=>$ano,'disabled'=>'true')); ?>
            <?php echo $form->error($model,'cur_ano'); ?>
        </div>
              
            <div class="row">
            <?php echo $form->labelEx($model,'cur_jornada'); ?>
            <?php echo $form->dropDownList($model,'cur_jornada',$jornada,array('promp'=>'Seleccione jornada')); ?>
            <?php echo $form->error($model,'cur_jornada'); ?>
        </div>
            
        <div class="row">
            <?php echo $form->labelEx($model,'cur_nivel'); ?>
            <?php echo $form->dropDownList($model,'cur_nivel',$niveles,array('promp'=>'Seleccione genero')); ?>
            <?php echo $form->error($model,'cur_nivel'); ?>
        </div>

        

        <div class="row">
            <?php echo $form->labelEx($model,'cur_letra'); ?>
            <?php echo $form->dropDownList($model,'cur_letra',$letra,array('promp'=>'Seleccione letra')); ?>
            <?php echo $form->error($model,'cur_letra'); ?>
        </div>
    </div>
    <div class="span5 offset1">
        <?php  if( !$model->isNewRecord ){  ?>
            <div class="row">
                <?php echo $form->labelEx($model,'cur_pjefe'); ?>
                <?php echo $form->textField($model,'cur_pjefe'); ?>
                <?php echo $form->error($model,'cur_pjefe'); ?>
            </div>
        
        <?php } else{ ?>
            <div class="row">
                <?php echo $form->labelEx($model,'cur_pjefe'); ?>
                <?php echo $form->hiddenField($model,'cur_pjefe',array('id' => 'id_pjefe')); ?>
                <?php echo $form->error($model,'cur_pjefe'); ?>
                <?php echo CHtml::textField('Text', '',array('id'=>'pn','placeholder' => 'Ingrese nombre Profesor',))?>
                <?php echo TbHtml::button('',array('color'=> TbHtml::ALERT_COLOR_DEFAULT, 'id' =>'limpiar','style'=>'margin-bottom:10px', 'icon' => 'remove' ))?>
            </div>

            <div class="row">
                <?php echo CHtml::textField('Text', '',
                    array('id'=>'nombre',
                        'placeholder' => 'Nombres',
                        'disabled'=>'disabled',))?>


                <?php echo CHtml::textField('Text', '',
                    array('id'=>'apellido',
                        'placeholder' => 'Apellidos',
                        'disabled'=>'disabled',
                         ))?>
            </div>     
        
        
        <?php } ?>

        <div class="row">
            <?php echo $form->labelEx($model,'cur_tperiodo'); ?>
            <?php echo $form->dropDownList($model,'cur_tperiodo',$tp,array('promp'=>'Seleccione Tipo periodo')); ?>
            <?php echo $form->error($model,'cur_tperiodo'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model,'cur_notas_periodo'); ?>
            <?php echo $form->textField($model,'cur_notas_periodo',array('size'=>2,'maxlength'=>2)); ?>
            <?php echo $form->error($model,'cur_notas_periodo'); ?>
        </div>

        <div class="row buttons">
            <?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar',array('class'=>'btn btn-primary')); ?>
        </div>
    </div>
</div>
<?php $this->endWidget(); ?>


<?php if ( $model->isNewRecord ){  ?>
    <script>
            $(function(){
            $('#pn').autocomplete({
                     source : function( request, response ) {
                     $.ajax({
                        url: '<?php echo $this->createUrl('curso/Buscar_prof'); ?>',
                        dataType: "json",
                        data: { term: request.term },
                        success: function(data) {
                                    response($.map(data, function(item) {
                                                return {
                                                        label: item.nombre +'/' + item.apellido,
                                                        apellido: item.apellido + ' ' + item.apellido2,
                                                        nombre: item.nombre + ' ' + item.nombre2,
                                                        id: item.id_cruge, 
                                                        }
                                            }))
                                }
                            })
                        },
                        select: function(event, ui) {
                            $("#nombre").val(ui.item.nombre)
                            $("#apellido").val(ui.item.apellido)
                            $("#id_pjefe").val(ui.item.id)
                        },

                    })
             });
    </script>   

    
    <script>
        $("#limpiar").on('click', function() {
                        $("#nombre").val(""),
                        $("#apellido").val(""),
                        $("#pn").val("")
                    });
    </script>
<?php }  ?>