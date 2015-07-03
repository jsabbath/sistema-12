

<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery-ui.css">
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-ui.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-touch.js"></script>


<div class="row">
  <div class="span12 text-center">
    <h2>Lista de Curso</h2>
	<?php 
    if( Yii::app()->user->checkAccess('admin')) $nombre = "admin"; ?>
        <h4>Cursos de: <?php if( $nombre )echo $nombre; ?></h4>


<?php    
    if(empty( $cur )){
        echo "Usted no es profesor jefe de cursos en este año.";
    }else{
        echo CHtml::dropDownList('cur_id','cur_id',$cur ,array('empty' => '-Seleccione Curso-',
                                                                'id'=> 'drop_curso',
                                                               'name' => 'drop_curso')); 
    }?>

	<div class="row">
        <div class="span8 offset2">
		  	<div id="lista" hidden>

		  	</div>
		</div>
	</div>
     

<br>
	</div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#drop_curso').change( function() {

            $.ajax({
                    url: '<?php echo CController::createUrl("ListaCurso/lista_curso")?>',
                    type: "POST", 
                    data: {id: $(this).val() },
                    success: function(response) { 
                       $('#lista').html(response); 
                       $('#lista').show();


                       
                    }
            })
        })
    });
 

</script>