
<style type="text/css">
    #lista{
     width:300px;   
    }
</style>

<div class="row">
    <div class="span12">

        <div class="row">
            <div class="span12 text-center">
                <h2>Informe al Hogar</h2>
            </div>
            <div class="span12 text-center">
                <p class="text-info">Seleccione el <strong>Curso</strong> que desea <strong>Imprimir</strong></p>
            </div>
        </div>

        <div class="row">
            <div class="span12 text-center">
                
                <?php echo CHtml::dropDownList('id_curso','id_curso',$cursos ,array(
                                                'empty' => '-Seleccione Curso-',
                                                'id'=> 'id_curso',
                                                ));?>
             
            </div>

           
        </div>

        <div class="row" id="div_option">
           
      
        </div>
        
    </div>
</div>

</div><!-- form -->

<script type="text/javascript">


    $('#id_curso').on('change',function(){

        $('#lista_alumnos').hide();

        $.ajax({
            url: '<?php echo CController::createUrl('render_option'); ?>',
            type: 'POST',
            data: { id_curso: $(this).val() },
        })
        .done(function(response) {

            $('#div_option').html(response);

        });
        
        
    });


</script>
