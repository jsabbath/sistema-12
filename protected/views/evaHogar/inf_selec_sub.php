
<style type="text/css">
    #lista{
     width:300px;   
    }
</style>


<div class="row">
           
    <div class="span6 text-center" id="button_curso"> 
        <form method="POST" action="<?php echo CController::createUrl("evaHogar/inf_cur",array("id" => $id )); ?>">

            <p class="text-info">Imprimir <strong>CURSO</strong> completo:</p>   
            <button class="btn btn-success" id="curso_print">Curso Completo</button>
        </form>    
            </br></br></br>
    </div> 
   

     <div class="span4 text-center" id="lista_alumnos">
        <form method="POST" action="<?php echo CController::createUrl("evaHogar/inf_alu"); ?>">

            <p class="text-info">Ó Imprimir por <strong>ALUMNO:</strong></p>
            <?php echo CHtml::dropDownList('lista','lista',array() ,array(
                                            'empty' => '-Seleccione Curso-',
                                            'id'=> 'lista',
                                            'size' => 8,
                                            'input' => 'large',
                                            ));?>
            <?php echo CHtml::hiddenField('id_cur',$id); ?>
            <button class="btn btn-success" id="alum_print">Imprimir</button>
        </form>
    </div>

   </br>
                

</div>
<script type="text/javascript">

    $.ajax({
        url: '<?php echo CController::createUrl('evaHogar/lista_alumnos'); ?>',
        type: 'POST',
        data: { id_curso: <?php echo $id; ?> },
    })
    .done(function(response) {

        $('#lista').html(response);
        
            
    });


     $('#alum_print').hide();

     $('#lista').on('change',function(){
        $('#alum_print').show();
     });
 

</script>
