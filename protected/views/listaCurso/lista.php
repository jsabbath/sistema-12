 

<?php if( empty($lista) ){
	echo "no tiene alumnos";

	} else{ ?>

    <style>
        #sortable { list-style-type: none; margin: 0; padding: 0; }
        #sortable li { margin: 0 3px 3px 3px; padding: 0.4em; padding-left: 1.5em; font-size: 1.4em; height: 18px; color: #292929}
        #sortable li span { position: absolute; margin-left: -1.3em; }
    </style>


    <div>
       <button class="btn btn-primary" id="save_lista" style="display:none">
                    <div id="btext">Guardar</div>
                    <div id="loader" >SUBIENDO...</div>
        </button> 
  

        <button id="unlock" class="btn btn-success">Editar <i id="lock_icon" class="icon-lock"></i></button>
  
    </div>

  <br>
  <div class="text-left" >
          <ul id="sortable">
            <?php foreach ($lista as $key => $l) {?>

                <li class="ui-state-default">
                    <div class="mat_id" id="<?php echo $l['list_id'] ?>" hidden><?php echo $l['mat_id'] ?></div> 
                    <span class="ui-icon ui-icon-arrowthick-2-n-s"></span>
                    <?php echo $l['posicion']. " - "; ?> 
                    <span3><?php echo  strtoupper($l['nombre']); ?> </span> 
                    <?php if( $l['estado'] != "" ){ ?>
                        <span3 style="text-align: right"><?php echo  "<label class=\"label label-important\">".$l['estado']."</label>" ?> </span>  
                    <?php } ?>       
                </li>
           
            <?php } ?>
        <ul>
</div>



    <script>

        //  guardar lista 
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
                   
                  
                     window.onbeforeunload = function() {
                           
                        }
                      location.reload();
                }
            })
        })

        // carga de ajax
        var $loading = $('#loader').hide();
        var $btext = $('#btext');
        $(document).ajaxStart(function () {
                $btext.hide();
                $loading.show();
            })
            .ajaxStop(function () {
                $loading.hide();
                $btext.show();
        });


    // dar permisos
    $('#unlock').on('click',function(){ 

        swal({      
            title: "Ingrese su Password!",   
            type: "input",
            inputType: "password",   
            showCancelButton: true,   
            closeOnConfirm: false,   
            animation: "slide-from-top" 
        }, 
        function(inputValue){ 

            $.ajax({
                url: '<?php echo $this->createUrl('listacurso/validar_edicion'); ?>',
                type: 'POST',
                dataType: "JSON",
                data: { pass: inputValue, cur: <?php echo $curso; ?> },
                success: function(response) {
                    if(!response){
                        swal.showInputError("Ingrese datos nuevamente");     
                        return false;   
                    }
                    if( response == 2 ){
                        swal.showInputError("usted no  tiene permisos para editar notas de este curso");
                        return false;
                    } 
                    swal({   
                        title: "Correcto!",     
                        timer: 600,
                        type: "success",   
                        showConfirmButton: false 
                    });

                    $('#save_lista').show();
                    $('#lock_icon').addClass("icon-ok").removeClass("icon-lock");
                    $(function() {
                      $( "#sortable" ).sortable();
                      $( "#sortable" ).disableSelection();
                    });

                    $('#unlock').prop("disabled",true);
                    window.onbeforeunload = function() {
                        return "";
                    }
                }               
            })  
        });
    });













    </script>





<?php } ?>