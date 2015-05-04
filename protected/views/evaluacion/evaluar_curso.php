<div class="row">
  <div class="span12">

	<?php 
    if( Yii::app()->user->checkAccess('admin')) $nombre = "admin"; ?>
        <h4>Cursos de: <?php if( $nombre )echo $nombre; ?></h4>

<?php  
    
    if(empty( $cur )){
        echo "Usted no tiene cursos en  este año.";
    }else{
        echo CHtml::dropDownList('cur_id','cur_id',$cur ,array('empty' => '-Seleccione Curso-',
                                                                'id'=> 'drop_curso',
                                                               'name' => 'drop_curso')); 
    }?>


		  	<div id="lista" hidden>

		  	</div>
	

    </div>
</div>


<script type="text/javascript">
    $(document).ready(function() {
        $('#drop_curso').change( function() {

            $.ajax({
                    url: '<?php echo CController::createUrl("evaluacion/curso_lista")?>',
                    type: "POST", 
                    data: {id: $(this).val() },
                    success: function(response) { 
                       $('#lista').html(response); 
                       $('#lista').show();

                        // $('#guardar_eva').on( "click", function(){
                        //     var n = $( "input:checked" ).length;
                        //     console.log($( "div" ).text( n + (n === 1 ? " is" : " are") + " checked!" ));
                        // } );

                       
                    }
            })
        })
    });
 

</script>

