<h1>Buscar Cursos</h1>
<div class="span12">
    <?php if($invalid_ano) echo "NO TIENE CURSOS EN ESTE AÑO";  ?>

        <div class="row">
            <?php  echo CHtml::dropDownList('cur_id','cur_id',$cur ,array('empty' => '-Seleccione Curso-','id'=> 'drop_curso','name' => 'drop_curso')); ?>

           
      
   <div id="asignaturas">
       
   </div>

   </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#drop_curso').change( function() {

            $.ajax({
                    url: '<?php echo CController::createUrl("curso/reload_asi") ?>',
                    type: "POST", 
                    data: {dropdown: $(this).val(), usuario: <?php echo $usuario ?> },
                    success: function(response) { 
                       $('#asignaturas').html(response); 
                    }
            })
        })
    });
</script>
