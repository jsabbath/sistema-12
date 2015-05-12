
<?php if( empty($lista[0]['alumnos']) ){
	echo "no tiene alumnos";
	} else{ ?>

    <?php 
        $informe = $lista[0]['informe'];
        $alumnos = $lista[0]['alumnos'];
        $titulo = $informe[0]['titulo'];

     ?>

    <div class="text-center">
        <h3><?php echo $titulo; ?></h3>
    </div>

   <?php foreach ($informe as $key => $i) {  ?>



    <div class="tabbable"> <!-- Only required for left/right tabs -->
 

        <ul class="nav nav-tabs">
            <?php foreach ($i['areas'] as $key => $a) { ?>
                <li <?php if( $key == 0 ){ ?>class="active" <?php } ?>><a href="#tab<?php echo $a['are_id'] ?>" data-toggle="tab"><?php echo $a['texto'] ?></a></li>
            <?php } ?>

            <li><a>
                <button class="btn btn-success" id="b_eva">
                   EDITAR
                </button>

                <button class="btn btn-success" id="b_guardar" style="display: none">
                    <div id="t_guardar">GUARDAR</div>
                    <div id="loader" hidden>SUBIENDO...</div>
                </button>
            </a></li>
        </ul>

        <div class="tab-content" id="tab-c">
            <?php foreach ($i['areas'] as $key => $a) { 
                    $conce = $a['are_con'];
                ?>

              <div <?php if( $key == 0 ){ ?>class="tab-pane active"<?php } else{ ?> class="tab-pane"<?php } ?> id="tab<?php echo $a['are_id']; ?>">
                 
                    <?php foreach ($conce as $key => $c) { ?>
                        
                        <p><?php echo "C".$key ." = ". $c['texto']; ?></p>

                    <?php } ?>

                    <br>
                        <table class="table table-striped" id="notas_inf">
                          <thead>
                            <tr>
                                <th>nombre</th>
                                <?php foreach ($conce as $key => $c) { ?>
                        
                                    <th>
                                        <?php echo "C".$key; ?>


                                    </th>

                                <?php } ?>
                            </tr>
                          </thead>

                           <tbody>
                                <?php  foreach ($alumnos as $key => $alum) { 
                                        $count = 0;
                                        $total = 0;
                                        $notas = $alum['notas_alu'];
                                        foreach ($notas as $key => $value) {
                                            if( $value['eva_nota'] != "" ){
                                                $count += 1;
                                            }
                                            $total += 1;
                                        }
                                       
                                    ?>
                                    <tr>
                                        <td id="mat_id" hidden> <?php echo strtoupper($alum['mat_id']); ?></td> 

                                        <td>
                                            <p <?php if( $count < $total ){ ?>style="color: red;"<?php } ?> > 
                                                <strong><?php echo strtoupper($alum['nombre']); ?></strong>  
                                            </p>
                                        </td>    


                                        <?php foreach ($conce as $key => $c) { 
                                            $posicion = array_search($c['con_id'], array_column($notas, 'id_con'));
                                            $not = $notas[$posicion]['eva_nota'];
                                            $eva_id = $notas[$posicion]['eva_id'];

                                        ?>
                                
                                            <td id="<?php echo $c['con_id']; ?>">
                                                <!-- <?php echo $alum['mat_id'] . $c['con_id']; ?>  -->
                                                    <form name="formName" id=" <?php echo $eva_id; ?>">
                                                        <?php foreach ($escala as $key => $e) { /*echo "mat_id:".$alum['mat_id'] .",con_id:". $c['con_id'];*/?>
                                                            <label class="radio"<?php if($e == $not ){ ?>style="background-color: yellow" <?php } ?>>
                                                                <input  id="<?php echo 'mat_id:'.$alum['mat_id'] .',con_id:'. $c['con_id']; ?>" 
                                                                        type="radio" name="optionsRadios" 
                                                                        value="option<?php echo $key. $alum['mat_id'] . $c['con_id']; ?>" <?php if($e == $not ){ ?>checked <?php } ?> 
                                                                        disabled
                                                                        >
                                                                    <?php echo $e; ?>
                                                                </label>
                                                        <?php } ?>
                                                    </form>
                                            </td>

                                        <?php } ?>

                                    </tr>
                                <?php } ?> 

                          </tbody>
                        </table>

              </div>
            <?php } ?>
        </div>
    </div>

  <?php } ?>


<script>
    
$('#b_eva').on('click',function(){
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
                url: '<?php echo $this->createUrl('evaluacion/validar_edicion'); ?>',
                type: 'POST',
                dataType: "JSON",
                data: { pass: inputValue, cur: <?php echo $cur; ?> },
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

                    $('#b_eva').hide(); 
                    $('#b_guardar').show();

                    window.onbeforeunload = function() {
                        return "";
                    }
                    var radios = document.getElementsByName("optionsRadios");
                    for (var i = 0; i < radios.length; i++) {
                      radios[i].disabled = false;
                    }

                }
            })



        });

})

$('#b_guardar').on('click',function(){
    var tabla = document.getElementById('tab-c');
    //console.log(tabla);
    var lista = [];
   

    $( "form" ).each(function( index ) {
      
        var id_ev = $( this ).attr('id');
      
        $(this).children().each(function(){
            if( $(this).children().is(':checked') ){

                var notas = {
                    eva_id: id_ev,
                    nota: $.trim($(this).text())
                }
                lista.push(notas);    
            }

        }) 
    });


    $.ajax({
            url: '<?php echo CController::createUrl("evaluacion/subir_eva")?>',
            type: 'POST',
            data: {notas: lista},
            success: function(data){
                location.reload();
                window.onbeforeunload = function() {
                       
                    }


                  
            }
        })

})




</script>








 <!--  termino  de carga  -->
<?php } ?> 