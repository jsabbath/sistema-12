<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/edi-table.css">             
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/mindmup-editar_asistencia.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/input-hogar.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/numeric-input-asistencia.js"></script>

<style type="text/css">
    #lista{
     width:300px;   
    }
</style>

<div class="row">
    <div class="span12">

        <div class="row">
            <div class="span12 text-center">
                <h2>Evaluar Informe al Hogar</h2>
            </div>
            <div class="span12 text-center">
                <p class="text-info">Seleccione el <strong>Curso</strong> al cual desea <strong>evaluar</strong></p>
            </div>
        </div>

        <div class="row">
            <div class="span1 offset3 text-center">
                
                <?php echo CHtml::dropDownList('id_curso','id_curso',$cursos ,array(
                                                'empty' => '-Seleccione Curso-',
                                                'id'=> 'id_curso',
                                                ));?>
             
            </div>

            <div class="span4 offset2 text-center" id="lista_alumnos" hidden>
                
                <?php echo CHtml::dropDownList('lista','lista',$cursos ,array(
                                                'empty' => '-Seleccione Curso-',
                                                'id'=> 'lista',
                                                'size' => 8,
                                                'input' => 'large',
                                                ));?>
            </div>
        </div>

        <div class="row">
            <div class="span12 text-center" id="informe">    
                
            </div>  
        </div>
        
    </div>
</div>

</div><!-- form -->

<script type="text/javascript">
    $('#id_curso').on('change',function(){
        $('#lista_alumnos').hide();
        $('#informe').hide();

        $.ajax({
            url: '<?php echo CController::createUrl('evahogar/lista_alumnos'); ?>',
            type: 'POST',
            data: { id_curso: $(this).val() },
        })
        .done(function(response) {
            $('#lista').html(response);
            $('#lista_alumnos').show();

            $('#lista').on('change',function(){


                $.ajax({
                    url: '<?php echo CController::createUrl('evahogar/mostrar_informe'); ?>',
                    type: 'POST',
                    data: {id: $(this).val(), curso: $('#id_curso').val()},
                })
                .done(function(response) {
                    $('#informe').show();
                    $('#informe').html(response);
                });
                
            });


        });
        
        
    });


</script>
