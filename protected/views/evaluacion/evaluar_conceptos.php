
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
        </ul>

        <div class="tab-content">
            <?php foreach ($i['areas'] as $key => $a) { 
                    $conce = $a['are_con'];
                ?>

              <div <?php if( $key == 0 ){ ?>class="tab-pane active"<?php } else{ ?> class="tab-pane"<?php } ?> id="tab<?php echo $a['are_id']; ?>">
                 
                    <?php foreach ($conce as $key => $c) { ?>
                        
                        <p><?php echo "C".$key ." = ". $c['texto']; ?></p>

                    <?php } ?>

                        <table class="table table-condensed">
                          <thead>
                            <tr>
                                <th>nombre</th>
                                <?php foreach ($conce as $key => $c) { ?>
                        
                                    <th><?php echo "C".$key; ?></th>

                                <?php } ?>
                            </tr>
                          </thead>

                           <tbody>
                                <?php  foreach ($alumnos as $key => $alum) { 
                                        $notas = $alum['notas_alu'];
                                        
                                    ?>
                                    <tr>
                                        <td data-editable= 'false' hidden> <?php echo strtoupper($alum['mat_id']); ?></td>    
                                        <td data-editable= 'false' > <?php echo strtoupper($alum['nombre']); ?></td>    


                                        <?php foreach ($conce as $key => $c) { 
                                            $posicion = array_search($c['con_id'], array_column($notas, 'id_con'));
                                        ?>
                                
                                            <td><?php echo $notas[$posicion]['eva_nota']; ?></td>

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

 
<?php } ?>