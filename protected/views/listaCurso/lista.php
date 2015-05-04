 

<?php if( empty($lista) ){
	echo "no tiene alumnos";

	} else{ ?>

    <style>
        #sortable { list-style-type: none; margin: 0; padding: 0; width: 60%; }
        #sortable li { margin: 0 3px 3px 3px; padding: 0.4em; padding-left: 1.5em; font-size: 1.4em; height: 18px; color: #292929}
        #sortable li span { position: absolute; margin-left: -1.3em; }
    </style>

  <script>
    $(function() {
      $( "#sortable" ).sortable();
      $( "#sortable" ).disableSelection();
    });
  </script>

   <button class="btn btn-primary" id="save_lista">GUARDAR</button> 


    <ul id="sortable">
        <?php foreach ($lista as $key => $l) {?>

            <li class="ui-state-default">
                <div class="mat_id" id="<?php echo $l['list_id'] ?>" hidden><?php echo $l['mat_id'] ?></div> 
                <span class="ui-icon ui-icon-arrowthick-2-n-s"></span>
                <?php echo $l['posicion']. " - "; ?> 
                <span3><?php echo  strtoupper($l['nombre']); ?> </span>
                
            </li>
       
        <?php } ?>
    <ul>

    <script>
        $("#save_lista").on('click',function(){
            var lista = [];

            $('.mat_id').each(function(){
                var id_mat = '';
                var id_lista = '';
                var alumno = [];
                var current = $(this);
                if(current.children().size() > 0) {return true;}
                id_mat += $(this).text();
                id_lista = this.id;
                
                alumno = {
                        'mat_id': id_mat,
                        'id_list': id_lista,
                    };

                lista.push(alumno);
              
            });

            $.ajax({
                url: '<?php echo CController::createUrl("listacurso/subir_orden")?>',
                type: 'POST',
                data: {curso_lista: lista, curso: <?php echo $curso; ?>},
                success: function(response){
                    console.log(response);
                    // location.reload();
                    // window.onbeforeunload = function() {
                           
                    //     }
                }
            })
        })
    </script>





<?php } ?>