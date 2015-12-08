<style type="text/css">
    .table{
        font-size: 12px;

    }
    .table td{
        padding: 1.5px;
        text-align: center;
    }
</style>

<div class="row">
    <div class="span12">
        <div style="text-align: center">
            <h2>Situacion Final:  <?php echo $nombre; ?></h2>

            <?php
                if( $lock == 0 OR Yii::app()->user->checkAccess('evaluador') OR Yii::app()->user->checkAccess('director') ){
                    echo TbHtml::button('Actualizar ', array('color' => TbHtml::BUTTON_COLOR_SUCCESS, 'id' => 'act_button'));
                } else if( Yii::app()->user->checkAccess('profesor') AND !Yii::app()->user->isSuperAdmin  ){ ?>
                    <p class="text-info">
                        Edicion Bloqueada por el Evaluador.
                    </p>
                <?php } ?>

        </div>




<br>

         <table class="table table-hover" width="100%" id="table_sit">
            <tr>
                <td>N°</td>
                <td >Nombre</td>
                <?php foreach ($asigs as $key => $a) { ?>
                        <td><?php echo $a['nom']; ?></td>
                <?php  } ?>
                <td>Prom.</td>
                <td width="5%">Asis.</td>
                <td>Situacion</td>
                <td>Desc.</td>
            </tr>

            <?php
                $prom_curso = 0;
                $count_curso = 0;
                $final_curso = 0;

                foreach ($alumnos as $key => $a) {
                    $prom_alum = 0;
                    $count_alum = 0;
                    $final_alum = 0;

            ?>
                <tr>
                    <td><?php echo $a['pos']; ?></td>
                    <td  style="text-align: left;"><?php echo $a['nombre']; ?></td>
                    <?php foreach ($a['notas'] as $key => $n) { ?>
                        <?php if( $a['retiro'] == $id_retiro  ){ // si el alumno  esta retirado ?>
                                <td style="background-color: #EEEEEE; <?php  if( $n < 4  AND $n > 0) echo 'color: RED;' ?>" ><?php if( $n > 0 )echo $n ?></td>
                        <?php } else{ //  si  el alumno no esta retirado ?>
                                <td <?php if( $n < 4 AND $n > 0 ){ ?> style="color: RED;" <?php } ?> >
                                        <?php if( is_numeric($n) ) {
                                                if( $n > 0 ){
                                                    echo $n;
                                                }

                                            } else{
                                                echo $n;
                                            }
                                ?></td>
                        <?php }
                            if( $n > 0 ){
                                $prom_alum += $n;
                                $count_alum ++;
                            }
                    }?>

                   <?php
                        if( $count_alum > 0 AND $a['retiro'] != $id_retiro ){ //  no se le calcula el promedio final a los alumnos retirados
                                $final_alum = $prom_alum/$count_alum;

                                if( strlen($final_alum) == 1 ){
                                    $final_alum = $final_alum .".0";
                                }else{
                                    $final_alum = number_format((float) $final_alum, 1, '.', '');
                                }

                                // calculo del promedio  final  del curso
                                $prom_curso+= $final_alum;
                                $count_curso++;

                                //echo $final_alum;
                           ?>
                           <td style="background-color: #EEEEEE;"><?php echo $final_alum; ?></td>
                           <?php } else{ ?>
                                <td></td>
                           <?php }

                     ?>
                    <td><?php if($a['asistencia'] > 0) echo $a['asistencia'] ?></td>
                    <td class="mat_est" ><?php

                                echo CHtml::dropDownList($a['mat_id'], '',$estados,
                                        array('class' => 'input-medium',
                                                'options' => array(
                                                            $a['retiro'] => array('selected' => true)
                                                        ),
                                                'prompt' => " " ,
                                                ));



                    ?></td>
                    <td  class="mat_des"> <?php echo TbHtml::textField($a['mat_id'], $a['mat_desc'], array('placeholder' => '')); ?> </td>
                </tr>
            <?php } ?>

            <tr>
                <td>Prom.</td>
                <td></td>
                <?php foreach ($asigs as $key => $a) { // promedio asignatura VERTICAL?>
                        <td><?php
                            if( $a['n'] == "RELIGION" ){
                                $final = "";
                                if( $a['prom'] >= 6  ) {
                                    $final = "MB";
                                }else if( $a['prom'] < 6 AND $a['prom'] >= 5  ){
                                    $final = "B";
                                }else if( $a['prom'] < 5 AND $a['prom'] >= 4 ){
                                    $final = "S";
                                }else if( $a['prom'] < 4 AND $a['prom'] > 0 ){
                                    $final = "I";
                                }
                                echo $final;
                            } else{
                                echo $a['prom'];
                            }
                        ?></td>
                <?php  } ?>
                <td style="background-color: #EEEEEE;">
                    <?php
                        if( $count_curso > 0){
                                $final_curso = $prom_curso/$count_curso;

                                if( strlen($final_curso) == 1 ){
                                    $final_curso = $final_curso .".0";
                                }else{
                                    $final_curso = number_format((float) $final_curso, 1, '.', '');
                                }

                                echo $final_curso;
                        }

                     ?>
                </td>
                <td></td>
                <td></td>
            </tr>
        </table>









    </div>
</div>


<script type="text/javascript">
$(document).ready(function() {

    $('#act_button').on('click', function(){
        var alum = [];

        $('#table_sit').find('tr').each(function(){
            id_mat = $(this).find('td.mat_des').children().attr('id');
            if(  !isNaN(id_mat) ){
                estado = null;
                descripcion = null;
                descripcion = $(this).find('td.mat_des').children().val();
                estado = $(this).find('td.mat_est').children().val();
                if( estado > 0 || descripcion != ""){ //  solo si  tienen datos ingresados
                    alum.push({
                            'estado': estado,
                            'des': descripcion,
                            'mat_id': id_mat,
                        })
                }

            }

        }) // end each

        $.ajax({
            url: '<?php echo CController::createUrl("notas/save_sit")?>',
            type: 'POST',
            data: {alumnos: alum},
            success: function(data){
                 swal({
                    title: "Guardado!",
                    timer: 600,
                    type: "success",
                    showConfirmButton: false
                });

            }
        })
     })



})
</script>

<?php
if( $lock == 0 OR Yii::app()->user->checkAccess('evaluador') OR Yii::app()->user->checkAccess('director') ){

}else if( $lock != 0 AND Yii::app()->user->checkAccess('profesor') AND !Yii::app()->user->isSuperAdmin){ ?>

<script type="text/javascript">
    $('#table_sit').find('tr').each(function(){
        $(this).find('td.mat_des').children().prop('disabled', true);
        $(this).find('td.mat_est').children().prop('disabled', true);
    })
</script>

<?php } ?>
