<div class="row">
  <div class="span12">

<?php if( Yii::app()->user->checkAccess('admin')) $nombre = "admin"; ?>
    <br>
   <h4>Cursos de: <?php if( $nombre )echo $nombre; ?></h4>



            <?php  if(empty( $cur )){
                echo "Usted no tiene cursos ni asignaturas en  este año.";
            } else{
                echo CHtml::dropDownList('cur_id','cur_id',$cur ,array('empty' => '-Seleccione Curso-',
                                                                        'id'=> 'drop_curso',
                                                                        'name' => 'drop_curso')); 
            }?>

      
         <div id="asignaturas">
             
         </div>
<br>
   </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#drop_curso').change( function() {

            $.ajax({
                    url: '<?php echo CController::createUrl("curso/reload_asi") ?>',
                    type: "POST", 
                    data: {dropdown: $(this).val() },
                    success: function(response) { 
                       $('#asignaturas').html(response); 
                    }
            })
        })
    });
</script>
 