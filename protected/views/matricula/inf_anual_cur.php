<!DOCTYPE html>
<html>
<head>
<title>HTML Reference</title>
</head>

<style>
        @page 
        {
            margin-top: 10;
            margin-bottom: 50;
            margin-left: 25;
            margin-right: 25;
        }

        *
        {
            margin:0;
            padding:0;
            font-family:Arial;
            font-size:9pt;
            color:#000;
        }
        body
        {
            width:100%;
            font-family:Arial;
            font-size:10pt;
            margin:0;
            padding:0;
        }
         
        p
        {
            margin:0;
            padding:0;
        }
         
        #wrapper
        {
            width:180mm;
            margin:0 15mm;
        }
         
        .page
        {
            height:297mm;
            width:210mm;
            page-break-after:always;
        }
 
        table
        {
            border-left: 1px solid #000;
            border-top: 1px solid #000;
             
            border-spacing:0;
            border-collapse: collapse; 
             
        }
         
        table td 
        {
            border-right: 1px solid #000;
            border-bottom: 1px solid #000;
            padding: 1.5mm;
        }
         
        table.heading
        {
            height:50mm;
        }
         
        h1.heading
        {
            font-size:14pt;
            color:#000;
            font-weight:normal;
        }
         
        h2.heading
        {
            font-size:9pt;
            color:#000;
            font-weight:normal;
        }
         
        hr
        {
            color:#000;
            background:#000;
        }
         
        #invoice_body
        {
            height: 149mm;
        }
         
        #invoice_body , #invoice_total
        {   
            width:100%;
        }
        #invoice_body table , #invoice_total table
        {
            width:100%;
            border-left: 1px solid #000;
            border-top: 1px solid #000;
     
            border-spacing:0;
            border-collapse: collapse; 
             
            margin-top:5mm;
        }
         
        #invoice_body table td , #invoice_total table td
        {
            text-align:center;
            font-size:9pt;
            border-right: 1px solid #000;
            border-bottom: 1px solid #000;
            padding:2mm 0;
        }
         
        #invoice_body table td.mono  , #invoice_total table td.mono
        {
            font-family:monospace;
            text-align:right;
            padding-right:3mm;
            font-size:10pt;
        }
         
        #footer
        {   
            width:180mm;
            margin:0 15mm;
            padding-bottom:3mm;
        }
        #footer table
        {
            width:100%;
            border-left: 1px solid #000;
            border-top: 1px solid #000;
             
            background:#eee;
             
            border-spacing:0;
            border-collapse: collapse; 
        }
        #footer table td
        {
            width:25%;
            text-align:center;
            font-size:9pt;
            border-right: 1px solid #000;
            border-bottom: 1px solid #000;
        }
    </style>

<body>


<?php 

    foreach ($alu_list as $key => $alu) {
        $id = $alu['id'];

        $model = $this->loadModel($id);
        $notas = array();

        $evaluaciones = Notas::model()->findAll(array('condition' => 'not_mat=:x AND not_periodo=:y','params' =>  array( ':x' => $id, ':y' => 1 )));
        $evaluaciones2 = Notas::model()->findAll(array('condition' => 'not_mat=:x AND not_periodo=:y','params' =>  array( ':x' => $id, ':y' => 2 )));

        if( empty($evaluaciones) OR empty($evaluaciones2)){
           throw new CHttpException(404, 'Alumno sin Curso.');
        }


        $ano = $evaluaciones[0]['not_ano'];
        $curso  = Curso::model()->findByPk($id_cur);

        foreach ($evaluaciones as $key => $alum) { // tabla notas
            $final = 0;
            
            $asi = Asignatura::model()->findByPk($alum->not_asig);
            $n2 = $evaluaciones2[$key]['notas'];
            $prom2 = $evaluaciones2[$key]['not_prom'];
            if( $prom2 > 0 AND $alum->not_prom > 0 ){
                $final = ($alum->not_prom + $prom2)/2;
            } else{
                if( $prom2 > 0 ){
                    $final = $prom2;
                }
                if( $alum->not_prom > 0){
                    $final = $alum->not_prom;
                }
            }
            

            if( strlen($final) == 1 ){
                $final = $final .".0";
            }else{
                $precision = 1;
                $final = number_format((float) $final, $precision, '.', '');
            }

            $notas[$asi->asi_orden] = array(
                  'nota1'   => $alum->notas,
                  'nota2'   => $n2,
                  'prom_alu'=> $alum->not_prom,
                  'prom_alu2'=>$prom2,
                  'nom_asi' => $asi->asi_descripcion,
                  'prom_f'  => $final,
                );

        }
        ksort($notas); // se ordena por asignatura
       
        $alumnos = array_unique($notas, SORT_REGULAR); 
 


?>



<table width="100%" style="border: 0;">
	<tr>
		<td width="6%" style="border: 0;"><img style="width: 60px" src="<?php echo Yii::app()->request->baseUrl."/images/". $cole->col_logo; ?>"></td>
		<td width="32%" style="border: 0;">
			<h2><?php echo $cole->col_nombre_colegio ?></h2>
			<p><?php echo $cole->col_direccion. " - ". $cole->col_telefono; ?></p>
		</td>
        <td style="border: 0;">
            <h2>Informe Anual Estudio</h2>
        </td>
	</tr>
</table>

<br>

<table style="border: 0;">
	<tr style="border: 0;">
		<td style="border: 0;" >
			<p>Nombre </p>
		</td>
		<td style="border: 0;" >
			<strong>: <?php echo $model->matAlu->alum_nombres." ".$model->matAlu->alum_apepat
			." ".$model->matAlu->alum_apemat; ?></strong>
		</td>

        <td style="border: 0; padding-left: 50"> 
            <p>Rut </p>
        </td>
        <td style="border: 0;">
         <strong>: <?php echo $model->matAlu->alum_rut;?></strong>
        </td>


        <td style="border: 0; padding-left: 50"> 
            <p>Curso </p>
        </td>
        <td style="border: 0;">
         <strong>: <?php echo $curso_nombre;?></strong>
         </td>



        <td style="border: 0; padding-left: 50"> 
            <p>Año </p>
        </td>
        <td>
         <strong>: <?php echo $ano;?></strong>
         </td>
	</tr>	
</table>



<table width="100%" style="border: 1;">
    <tr>
        <td></td>
        <td colspan="<?php echo $max_not ?>">Primer Semestre</td>
        <td style="border-bottom: 0"></td>
        <td colspan="<?php echo $max_not ?>">Segundo Semestre</td>
        <td colspan="3" ></td>
    </tr>
    <tr>
        <?php  for ($i=0; $i <= $max_not ; $i++) { 
                    if( $i == 0 ) { ?>
                        <td><strong>Asignatura</strong></td>
                <?php }else { ?>    
                        <td><?php echo "N".$i; ?></td>
        <?php }} ?>
            <?php  for ($i=0; $i <= $max_not ; $i++) { 
                    if( $i == 0 ) { ?>
                        <td style="border-top: 0; border-bottom: 0"> </td>
                <?php }else { ?>    
                        <td><?php echo "N".$i; ?></td>
            <?php }} ?>

            <td>P1</td>
            <td>P2</td>
            <td>PF</td>          
    </tr>   

    <?php 
        $count1 = 0;
        $count2 = 0;
        $countf = 0;
        $p_1 = 0;
        $p_2 = 0;
        $p_f = 0;
        $precision = 1;

        // se recorren las asignaturas 
        foreach ($notas as $key => $a) { 
            $n1 = $a['nota1'];
            $n2 = $a['nota2'];
            $prom1 = $a['prom_alu'];
            $prom2 = $a['prom_alu2'];
            $pf    = $a['prom_f'];
    ?>     
        <tr>
            <td><p><strong><?php echo $a['nom_asi'] ?></strong></p></td>

            <?php for ($i=1; $i <= $max_not; $i++) { ?>

                <?php if( $a['nom_asi'] == "RELIGION" ){ // nota religion?>

                    <td class="text-center"> <strong><?php 
                        if( $n1[$i] >= 6  ) {
                            echo "MB"; 
                        }else if( $n1[$i] < 6 AND $n1[$i] >= 5  ){
                            echo "B"; 
                        }else if( $n1[$i] < 5 AND $n1[$i] >= 4 ){ 
                            echo "S"; 
                        }else if( $n1[$i] < 4 AND $n1[$i] > 0 ){
                            echo "I"; 
                        } ?></strong>
                    </td>

                <?php } else if( $n1[$i] < 4 ){ // nota menor a 4 primer semestre?>

                        <td style="color: RED;" ><strong>
                            <?php if( $n1[$i] > 0 ){ 
                                if ( strlen($n1[$i]) == 1 ){
                                    echo  ''.$n1[$i] . '.0';
                                } else{
                                    echo $n1[$i]; 
                                }
                            }?></strong>
                        </td>

                    <?php }else{ // nota mayor  a 4 primer semestre?>

                        <td><strong>
                            <?php 
                                if ( strlen($n1[$i]) == 1 ){
                                    echo  ''.$n1[$i] . '.0';
                                } else{
                                    echo $n1[$i]; 
                                }
                            ?></strong> 
                        </td>

                    <?php } ?>

            <?php } ?>

            <td style="border-top: 0; border-bottom: 0"></td>

            <?php for ($i=1; $i <= $max_not; $i++) { ?> 
                <?php if( $a['nom_asi'] == "RELIGION" ){ // religion ?>

                    <td class="text-center"> <strong><?php 
                        if( $n2[$i] >= 6  ) {
                            echo "MB"; 
                        }else if( $n2[$i] < 6 AND $n2[$i] >= 5  ){
                            echo "B"; 
                        }else if( $n2[$i] < 5 AND $n2[$i] >= 4 ){ 
                            echo "S"; 
                        }else if( $n2[$i] < 4 AND $n2[$i] > 0 ){
                            echo "I"; 
                        } ?></strong>
                    </td>

                <?php } else if( $n2[$i] < 4 ){ // nota menor a 4 segundo semestre ?>

                    <td style="color: RED;" ><strong>
                        <?php if( $n2[$i] > 0 ){ 
                            if ( strlen($n2[$i]) == 1 ){
                                echo  ''.$n2[$i] . '.0';
                            } else{
                                echo $n2[$i]; 
                            }
                        }?></strong>
                    </td>

                <?php }else{ // nota mayor a 4 segundo semestre ?>

                    <td><strong>
                        <?php 
                            if ( strlen($n2[$i]) == 1 ){
                                echo  ''.$n2[$i] . '.0';
                            } else{
                                echo $n2[$i]; 
                            }
                        ?></strong> 
                    </td>

                <?php } ?>

            <?php } ?>

            <?php if( $a['nom_asi'] != "RELIGION" ){ // promedio finales para asignaturas normales ?> 
                <td <?php if( $prom1 < 4 ){ // primer semestre?> 
                            style="color: RED;" 
                    <?php } ?> ><strong>
                    <?php   if( $prom1 > 0 ){ 
                                if( strlen($prom1) == 1 ){
                                    $prom1 = $prom1.".0"; 
                                } 
                                $p_1 += $prom1;
                                $count1++;   
                                echo $prom1; 
                            }  
                    ?></strong>
                </td>

                <td <?php if( $prom2 < 4 ){ // segundo semestre?> 
                            style="color: RED;" 
                    <?php } ?> ><strong>
                    <?php   if( $prom2 > 0 ){ 
                                if( strlen($prom2) == 1 ){
                                    $prom2 = $prom2.".0"; 
                                }
                                $p_2 += $prom2;
                                $count2++;  
                                echo $prom2; 
                            } 
                    ?></strong>
                </td>

                <td <?php if( $pf < 4 ){ // final?> 
                            style="color: RED;" 
                    <?php } ?> ><strong>
                    <?php   if($pf > 0 ){
                                echo $pf;
                                $p_f += $pf;
                                $countf++;  
                            } 
                    ?></strong>
                </td>

            <?php } else{ // promedios finales para religion?>

                <td class="text-center"> <strong><?php 
                        if( $prom1 >= 6  ) {
                            echo "MB"; 
                        }else if( $prom1 < 6 AND $prom1 >= 5  ){
                            echo "B"; 
                        }else if( $prom1 < 5 AND $prom1 >= 4 ){ 
                            echo "S"; 
                        }else if( $prom1 < 4 AND $prom1 > 0 ){
                            echo "I"; 
                } ?></strong></td>

                <td class="text-center"> <strong><?php 
                        if( $prom2 >= 6  ) {
                            echo "MB"; 
                        }else if( $prom2 < 6 AND $prom2 >= 5  ){
                            echo "B"; 
                        }else if( $prom2 < 5 AND $prom2 >= 4 ){ 
                            echo "S"; 
                        }else if( $prom2 < 4 AND $prom2 > 0 ){
                            echo "I"; 
                } ?></strong></td>

                <td class="text-center"> <strong><?php 
                        if( $pf >= 6  ) {
                            echo "MB"; 
                        }else if( $pf < 6 AND $pf >= 5  ){
                            echo "B"; 
                        }else if( $pf < 5 AND $pf >= 4 ){ 
                            echo "S"; 
                        }else if( $pf < 4 AND $pf > 0 ){
                            echo "I"; 
                } ?></strong></td>

            <?php } ?>

        </tr>


    <?php  }// fin foreach asignatura ?>

    <tr>
        <td><strong>Prom</strong></td>
        <td colspan="<?php echo $max_not ?>"> </td>
        <td ></td>
        <td colspan="<?php echo $max_not ?>"></td>

        <td><strong><?php // promedio vertical primer semestre
            if( $count1 > 0 ){
                $p1 = $p_1 / $count1;
            }
            if( strlen($p1) == 1 ){
                $p1 = $p1 .".0";
            }else{  
                $p1 = number_format((float) $p1, $precision, '.', '');
            }
            echo $p1;
            ?>
        </strong></td>

        <td><strong><?php // promedio vertical segundo semestre
            if( $count2 > 0 ){
                $p2 = $p_2 / $count2;
            }
            if( strlen($p2) == 1 ){
                $p2 = $p2 .".0";
            }else{  
                $p2 = number_format((float) $p2, $precision, '.', '');
            }
            echo $p2;
            ?>  
        </strong></td>

        <td><strong><?php // promedio vertical final
            if( $countf > 0 ){
                $ff = $p_f / $countf;
            }
            if( strlen($ff) == 1 ){
                $ff = $ff .".0";
            }else{  
                $ff = number_format((float) $ff, $precision, '.', '');
            }
            echo $ff;
            ?>
        </strong></td>

    </tr>

</table>

<br>
<div>
	<p><strong>Observaciones:</strong><?php for ($i=0; $i < 392; $i++) { 
        echo "_";
    } ?></p>
	
</div>


      
    <table class="heading" style="width:100%; border: 0;">
        <tr>
            <td style="width:50%; text-align: center; border: 0;">
                <img style="width: 12%"  src="<?php echo Yii::app()->request->baseUrl; ?>/images/firmas/<?php echo $firma_profe; ?>">
                <p><?php echo $profe; ?></p>
                <p>PROFESOR(A)</p>
            </td>
            <td  align="center" style="border: 0;">
                <img style="width: 12%"  src="<?php echo Yii::app()->request->baseUrl; ?>/images/firmas/<?php echo $firma_dir; ?>">
                <p><?php echo strtoupper($nom_director); ?></p>
                <p>DIRECTOR(A)</p>
            </td>
        </tr>
    </table>
      <pagebreak />   
<?php 
    }
?>
     
</body>
</html>
