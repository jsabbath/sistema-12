 
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-ui.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery-ui.css">
     

<?php
/* @var $this AAsignaturaController */
/* @var $model AAsignatura */
/* @var $form CActiveForm */
?>

<div class="row">

    <div class="row">
        <div class="span12 text-center">
            <p class="text-info">Los campos con <span class="required">*</span> son obligtorios.</p>
        </div>
    </div>

    <div class="span12 offset1">

        <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'aasignatura-form',
            // Please note: When you enable ajax validation, make sure the corresponding
            // controller action is handling ajax validation correctly.
            // There is a call to performAjaxValidation() commented in generated controller code.
            // See class documentation of CActiveForm for details on this.
            'enableAjaxValidation'=>false,
        )); ?>

      
            <div class="row">
                <div class="span5">
                    <div class="form">
                        <?php echo $form->errorSummary($model); ?>
                    </div>
                </div>
            </div>

      
        <div class="row">
            <div class="span5">
            <h4>Curso</h4>
            <?php echo $form->DropdownList($model,'aa_curso',$cursos,array('empty' => '-Seleccione Curso-')); ?>
            </div>
        </div>
       


        <div class="row">
            <div class="span12">
                <div class="span5">
                    <div class="row">
                         <h4>Asignatura</h4>
                        <?php echo $form->hiddenField($model,'aa_asignatura',array('id' => 'id_asignatura')); ?>
                       
                        <?php echo CHtml::textField('Text', '',array('id'=>'asignatura_auto','placeholder' => 'Ingrese nombre Asignatura',))?>
                        <?php echo TbHtml::button('',array('color'=> TbHtml::ALERT_COLOR_DEFAULT, 
                                                            'id' =>'limpiar_asi', 
                                                            'icon' => 'remove',
                                                            'data-toggle'=>'tooltip', 
                                                            'data-placement'=>'top', 
                                                            'title'=>'Limpiar',
                                                            'style' => 'margin-bottom: 8.5px', ))?>
                  
                    </div>
                    <div class="row">
                        <?php echo CHtml::textField('Text', '',array('id'=>'corto_asi','placeholder' => 'Nombre Corto',
                                                                                        'disabled'=>'disabled',))?>                                                                    
                        <?php echo CHtml::textField('Text', '',array('id'=>'codigo_asi','placeholder' => 'Codigo',
                                                                                        'disabled'=>'disabled',))?>
                    </div>
                </div>

                <div class="span5">
                    <div class="row">
                        <h4>Docente</h4>
                        <?php echo $form->hiddenField($model,'aa_docente',array('id' => 'id_docente')); ?>
                   
                        <?php echo CHtml::textField('Text', '',array('id'=>'docente_auto','placeholder' => 'Ingrese nombre Profesor',))?>
                        <?php echo TbHtml::button('',array('color'=> TbHtml::ALERT_COLOR_DEFAULT, 
                                                            'id' =>'limpiar_doc',
                                                            'icon' => 'remove',
                                                            'data-toggle'=>'tooltip', 
                                                            'data-placement'=>'top', 
                                                            'title'=>'Limpiar',
                                                            'style' => 'margin-bottom: 8.5px', ))?>

                    </div>
                    <div class="row">
                        <?php echo CHtml::textField('Text', '',array('id'=>'nombre_doc','placeholder' => 'Nombres',
                                                                                        'disabled'=>'disabled',))?>
                        <?php echo CHtml::textField('Text', '',array('id'=>'apellido_doc','placeholder' => 'Apellidos',
                                                                                        'disabled'=>'disabled',))?>
                    </div>
                </div>
            </div>
        </div>

     <div class="row">
        <div class="span5">
            <?php echo TbHtml::submitButton($model->isNewRecord ? 'Ingresar' : 'Guardar',array('color'=>TbHtml::BUTTON_COLOR_PRIMARY)); ?>
        </div>
    </div>

    </div>

       
</div>


    <?php $this->endWidget(); ?>


<script>
    $(function(){
        $('#docente_auto').autocomplete({
             source : function( request, response ) {
             $.ajax({
                    url: '<?php echo $this->createUrl('curso/Buscar_prof'); ?>',
                    dataType: "json",
                    data: { term: request.term },
                    success: function(data) {
                                response($.map(data, function(item) {
                                            return {
                                                    label: item.nombre +'/' + item.apellido,
                                                    apellido_doc: item.apellido + ' ' + item.apellido2,
                                                    nombre_doc: item.nombre + ' ' + item.nombre2,
                                                    id_doc: item.id, 
                                                    }
                                        }))
                            }
                        })
                },
                    select: function(event, ui) {
                        $("#nombre_doc").val(ui.item.nombre_doc)
                        $("#apellido_doc").val(ui.item.apellido_doc)
                        $("#id_docente").val(ui.item.id_doc)
                    },
                   
                })
         });
</script>            
        
<script>
     $("#limpiar_doc").on('click', function() {
                        $("#nombre_doc").val(""),
                        $("#apellido_doc").val(""),
                        $("#docente_auto").val("")
                    });
</script>
              
        
<script>
    $(function(){
        $('#asignatura_auto').autocomplete({
             source : function( request, response ) {
             $.ajax({
                    url: '<?php echo $this->createUrl('aAsignatura/Buscar_asignatura'); ?>',
                    dataType: "json",
                    /*appendTo: "#asignatura_auto",    // <-- do this
                    close: function (event, ui){
                        $(this).autocomplete("option","appendTo","#asignatura_auto");  // <-- and do this  
                    },*/
                    data: { term: request.term },
                    success: function(data) {
                                response($.map(data, function(item) {
                                            return {
                                                    label: item.nombre,
                                                    nombre: item.nombre,
                                                    corto: item.corto,
                                                    codigo: item.codigo,
                                                    id: item.id, 
                                                    }
                                        }))
                            }
                        })
                },
                    select: function(event, ui) {
                        $("#nombre_asi").val(ui.item.nombre)
                        $("#corto_asi").val(ui.item.corto)
                        $("#codigo_asi").val(ui.item.codigo)
                        $("#id_asignatura").val(ui.item.id)
                    },
                   
                })
         });
</script>   

<script>
     $("#limpiar_asi").on('click', function() {
                        $("#nombre_asi").val(""),
                        $("#corto_asi").val(""),
                        $("#asignatura_auto").val(""),
                        $("#codigo_asi").val("")
                    });
</script>

<script type="text/javascript">
$(function () { $("[data-toggle='tooltip']").tooltip(); });
</script>

</div><!-- form -->