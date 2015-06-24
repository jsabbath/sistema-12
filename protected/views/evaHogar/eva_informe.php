<div class="row">
    <div class="span10 offset1">
    <br>
        <h4 style="text-align: center"> <?php echo $nombre; ?></h4>


        <div class="row">
            <button id="bt_subir_notas" class="btn btn-primary" style="display:none">
                                    <div id="btext">Subir Notas</div>
                                    <div id="loader" >SUBIENDO...</div>
            </button>

            <button id="unlock" class="btn btn-success"><i id="lock_icon" class="icon-lock"></i> Editar</button>
        </div>
        </br>

        <?php 
            $text = "";
            foreach ($escala as $key => $e){ 
                if( $e->par_descripcion == "L"){
                    $t1 = "<strong>".$e->par_descripcion."</strong> - LOGRADO";
                } else if($e->par_descripcion == "ML" ){
                    $t2 = "<strong>".$e->par_descripcion."</strong> - MEDIANAMENTE LOGRADO";
                } else if( $e->par_descripcion == "PL" ){
                    $t3 = "<strong>".$e->par_descripcion."</strong> - POR LOGRAR";
                } else if( $e->par_descripcion == "N/E" ){
                    $t4 = "<strong>".$e->par_descripcion."</strong> - NO EVALUADO";
                }

            } 
            echo $t1." / ".$t2." / ".$t3." / ".$t4;
        ?>


    </br></br></br>

        <?php foreach ($areas as $key => $a) {
            $con = $a['area_con'];
            if( $a['nombre_area'] != "PERSONALIDAD" ){
        ?>
            <p style="text-align: left"><strong>AMBITO: <?php echo $a['nombre_area']; ?></strong></p>
            <table width="100%" class="table table-bordered" id="<?php echo $a['nombre_area']; ?>">
                 <thead>
                    <th style="text-align: center" data-editable= 'false'><strong>INDICADORES</strong></th>
                    <th width="8%" data-editable= 'false'><strong>1°S</strong></th>
                    <th width="8%" data-editable= 'false'><strong>2°S</strong></th>
                </thead>
                <?php foreach ($con as $key => $c){ ?>
                    <tr class="eva" id="<?php echo $c['id_eva']; ?>">
                        <td data-editable= 'false'><?php echo $c['nombre_con']; ?></td>
                        <td id="1" tabindex="1"><?php echo $c['nota1']; ?></td>
                        <td id="2" tabindex="1"><?php echo $c['nota2']; ?></td>
                    </tr>
                <?php } ?>
            </table>
            <br>
        <?php }else{  ?>
            
            <table width="100%" class="table table-bordered" id="<?php echo $a['nombre_area']; ?>">
                <thead>
                    <th style="text-align: center" data-editable= 'false'><strong>INDICADORES DE PERSONALIDAD</strong></th>
                    <th width="8%" data-editable= 'false'><strong>1°S</strong></th>
                    <th width="8%" data-editable= 'false'><strong>2°S</strong></th>
                </thead>
                <?php foreach ($con as $key => $c){ ?>
                    <tr class="eva" id="<?php echo $c['id_eva']; ?>">
                        <td data-editable= 'false'><?php echo $c['nombre_con']; ?></td>
                        <td id="1" tabindex="1"><?php echo $c['nota1']; ?></td>
                        <td id="2" tabindex="1"><?php echo $c['nota2']; ?></td>
                    </tr>
                <?php } ?>
            </table>
            <br>    

        <?php }}  ?>
        <div>
            <strong>ASISTENCIA:  </strong>
            <input class="span2" type="number" placeholder="<?php echo $asi; ?>" id="asi" min="0" max="100" disabled="true">
        </div>
    </div>
</div>

<script type="text/javascript">


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
                url: '<?php echo $this->createUrl('evahogar/validar_edicion'); ?>',
                type: 'POST',
                dataType: "JSON",
                data: { pass: inputValue, cur:  $('#id_curso').val() },
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

                    $('#bt_subir_notas').show();
                    $('#lock_icon').addClass("icon-ok").removeClass("icon-lock");

                        $('.table').each(function() {
                            $(this).editableTableWidget();
                            $(this).numericInputExample();
                        });

                    $('#unlock').prop("disabled",true);
                    $('#asi').prop("disabled",false);
                    window.onbeforeunload = function() {
                        return "";
                    }
                }               
            })  
        });
    });

    // load button
    var $loading = $('#loader').hide();
    var $btext = $('#btext');
    $(document)
      .ajaxStart(function () {
        $btext.hide();
        $loading.show();
      })
      .ajaxStop(function () {
        $loading.hide();
        $btext.show();
      });


   



    $('#bt_subir_notas').on('click',function(){

        lista = [];
        $(".eva").each(function(){
            id_eva = $(this).attr('id');
            var n1 = "";
            var n2 = "";
            $(this).children().each(function(){

                if( $(this).attr('id') == 1  ){
                    n1 = $(this).text();
                }
                if( $(this).attr('id') == 2 ){
                    n2 = $(this).text();
                }

                
                
            });
             var notas = {
                    eva_id: id_eva,
                    nota1: n1,
                    nota2: n2,
                    nota3: "",
                }
                lista.push(notas);  
        });
    //    console.log(lista);
        $.ajax({
            url: '<?php echo CController::createUrl("evahogar/subir_notas")?>',
            type: 'POST',
            data: {lista: lista, asi: $('#asi').val(), mat: $('#lista').val()},
            success: function(data){
                swal({   
                    title: "Guardado!",     
                    timer: 600,
                    type: "success",   
                    showConfirmButton: false 
                });
                window.onbeforeunload = function() {
                       
                }
            }
        })
        
    });
 
  
</script>