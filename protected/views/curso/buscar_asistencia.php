<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/sweet-alert.css">
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/sweet-alert.min.js"></script>

<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/edi-table.css">             
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/mindmup-editar_asistencia.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/numeric-input-asistencia.js"></script>




<div class="row">
  <div class="span12">

	<?php if( Yii::app()->user->checkAccess('admin')) $nombre = "admin"; ?>
  	<h4>Cursos de: <?php if( $nombre )echo $nombre; ?></h4>

        <?php  if(empty( $cur )){
            echo "Usted no tiene cursos ni asignaturas en  este año.";
        } else{
            echo CHtml::dropDownList('cur_id','cur_id',$cur ,array('empty' => '-Seleccione Curso-',
                                                                    'id'=> 'drop_curso',
                                                                    'name' => 'drop_curso')); 
        }?>

	<div class="row">
		<div class="span8 offset2">
		  	<div id="alumnos" hidden>

		  	</div>
		</div>
	</div>
     


	</div>
</div>


<script type="text/javascript">
    $(document).ready(function() {
        $('#drop_curso').change( function() {

            $.ajax({
                    url: '<?php echo CController::createUrl("curso/poner_asistencia")?>',
                    type: "POST", 
                    data: {id_cur: $(this).val() },
                    success: function(response) { 
                       $('#alumnos').html(response); 
                       $('#alumnos').show();


                       
                    }
            })
        })
    });
 

</script>