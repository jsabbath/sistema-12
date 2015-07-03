<div class="row">
    <div class="span10 offset1">
    <br>
        <h4 style="text-align: center"> <?php echo $nombre; ?></h4>


        <div class="row">
            <button id="bt_subir_notas" class="btn btn-primary" style="display:none">
                                    <div id="btext">Subir Notas</div>
                                    <div id="loader" >SUBIENDO...</div>
            </button>

           
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
            <strong>ASISTENCIA PRIMER SEMESTRE:  </strong>
            <input class="span2" type="number" placeholder="<?php echo $asi1; ?>" id="asi1" min="0" max="100" >
        </div>

         <div>
            <strong>ASISTENCIA SEGUNDO SEMESTRE:  </strong>
            <input class="span2" type="number" placeholder="<?php echo $asi2; ?>" id="asi2" min="0" max="100" >
        </div>
    </div>
</div>

<script type="text/javascript">

    $('#bt_subir_notas').show();
    $('#lock_icon').addClass("icon-ok").removeClass("icon-lock");

        $('.table').each(function() {
            $(this).editableTableWidget();
            $(this).numericInputExample();
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
            url: '<?php echo CController::createUrl("evaHogar/subir_notas")?>',
            type: 'POST',
            data: {lista: lista, asi1: $('#asi1').val(), mat: $('#lista').val(), asi2: $('#asi2').val()},
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