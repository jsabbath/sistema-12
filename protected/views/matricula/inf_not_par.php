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
            padding: 2mm;
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



<table width="100%" style="border: 0;">
	<tr>
		<td width="20%" style="border: 0;"><img style="width: 80px" src="<?php echo Yii::app()->request->baseUrl."/images/". $cole->col_logo; ?>"></td>
		<td width="80%" style="border: 0;">
			<h2><?php echo $cole->col_nombre_colegio ?></h2>
			<p><?php echo $cole->col_direccion. " - ". $cole->col_telefono; ?></p>
		</td>
	</tr>
</table>



<div style="text-align: center">
	<h2>Informe de Notas Parciales</h2>
</div>


<table style="border: 0;">
	<tr style="border: 0;">
		<td style="border: 0;">
			<p>Nombre </p>
		</td>
		<td>
			<strong>: <?php echo $model->matAlu->alum_nombres." ".$model->matAlu->alum_apepat
			." ".$model->matAlu->alum_apemat; ?></strong>
		</td>
	</tr>
	<tr style="border: 0;">
		<td style="border: 0;">	
			<p>Rut </p>
		</td>
		<td>
		 <strong>: <?php echo $model->matAlu->alum_rut;?></strong>
		 </td>
	</tr>
    <tr style="border: 0;">
        <td style="border: 0;"> 
            <p>Año Academico </p>
        </td>
        <td>
         <strong>: <?php echo $ano;?></strong>
         </td>
    </tr>
    <tr style="border: 0;">
        <td style="border: 0;"> 
            <p>Curso </p>
        </td>
        <td>
         <strong>: <?php echo $curso_nombre;?></strong>
         </td>
    </tr>
        <tr style="border: 0;">
        <td style="border: 0;"> 
            <p>Profesor Jefe </p>
        </td>
        <td>
         <strong>: <?php echo $profe;?></strong>
         </td>
    </tr>
    <tr style="border: 0;">
        <td style="border: 0;"> 
            <p>Periodo </p>
        </td>
        <td>
         <strong>: <?php echo $periodo;?></strong>
         </td>
    </tr>

</table>


<table width="100%" style="border: 1;">
	
	<tr>
	
            <?php  for ($i=0; $i <= $max_not ; $i++) { 
                        if( $i == 0 ) { ?>
                            <td><strong>Asignatura</strong></td>
                        <?php }else { ?>    
                            <td><?php echo "N".$i; ?></td>
            <?php }} ?>
                <td>FINAL</td>
	           <td>CURSO</td>          
	</tr>	


	<?php 
        foreach ($notas as $key => $a) { 
            $n = $a['nota'];
           
    ?>
        <tr>
            <td><p><strong><?php echo $a['nom_asi'] ?></strong></p></td>


            <?php if( $a['nom_asi'] == "RELIGION" ){ 
                $final = 0;
                $count = 0;
            ?>

                <?php for ($i=1; $i <= $max_not ; $i++){ ?>

                    <td class="text-center">
                        <?php if( $n[$i] != "" ){ 
                            $count ++;
                            $final += $n[$i];
                        ?>
                            <?php if( $n[$i] >= 6  ) { ?>
                                <strong>MB </strong>
                            <?php }else if( $n[$i] < 6 AND $n[$i] >= 5  ){ ?>
                                <strong>B </strong>
                            <?php }else if( $n[$i] < 5 AND $n[$i] >= 4 ){ ?>
                                <strong>S </strong>
                            <?php }else if( $n[$i] < 4 ){ ?>
                                 <strong>I </strong>
                            <?php }
                        } ?>
                    </td>

                <?php } 
                    if( $count != 0 ) $prom = $final/$count;
                ?>

                <td class="text-center" style="background-color: #EEEEEE"> <strong><?php 
                    if( $count !=0 ){
                        if( $prom >= 6  ) {
                            echo "MB"; 
                        }else if( $prom < 6 AND $prom >= 5  ){
                            echo "B"; 
                        }else if( $prom < 5 AND $prom >= 4 ){ 
                            echo "S"; 
                        }else if( $prom < 4 ){
                            echo "I"; 
                        }
                    }   

                ?></strong></td><!-- final -->

            <?php } else{ 
                $final = 0;
                $count = 0;
            ?> <!-- fin if religion -->

                <?php for ($i=1; $i <= $max_not ; $i++){ 
                    if( $n[$i] < 4 ) { 
                       
                    ?>
                        <td style="color: RED;" ><strong><?php if( $n[$i] != 0 ){ 
                            $count++;
                            $final += $n[$i];

                            if ( strlen($n[$i]) == 1 ){
                                echo  ''.$n[$i] . '.0';
                            } else{
                                echo $n[$i]; 
                            }
                        }?></strong></td>
                    <?php }else{ 
                       
                    ?>
                        <td> <strong><?php if( $n[$i] != 0 ){
                            $count++;
                            $final += $n[$i]; 
                            if ( strlen($n[$i]) == 1 ){
                                echo  ''.$n[$i] . '.0';
                            } else{
                                echo $n[$i]; 
                            }

                            }?></strong> </td>
                    <?php } ?>
                <?php } 
                    if( $count != 0 ) $prom = $final/$count;

                    if( strlen($prom) == 1 ){
                        $prom = $prom .".0";
                    }else{
                        $precision = 1;
                        $prom = number_format((float) $prom, $precision, '.', '');
                    }
                ?>
                <td  <?php if( $prom < 4 ){ ?>style="color: RED; background-color: #EEEEEE;" <?php }else{ ?>style="background-color: #EEEEEE" <?php } ?>>
                                    <strong><?php  if( $count != 0 ) echo $prom; ?></strong>
                </td><!-- final -->

            <?php } ?><!-- fin else religion -->

             <td><p><strong><?php 
                if( $a['prom_asi'] != 0){ 
                    if( $a['nom_asi'] == "RELIGION"){
                        if( $a['prom_asi'] >= 6  ) { 
                            echo "MB";
                        }else if( $a['prom_asi'] < 6 AND $a['prom_asi'] >= 5 ){ 
                            echo "B";
                        }else if( $a['prom_asi'] < 5 AND $a['prom_asi'] >= 4 ){ 
                            echo "S";
                        }else if( $a['prom_asi'] < 4 ){ 
                            echo "I";
                        }
                    } else{
                        echo $a['prom_asi'];
                    }
                }?></strong></p></td>
        </tr>


       <?php }?>

     

	  <tr style="border: 1;">
        <td><p><strong>ASITENCIA</strong></p></td>
            <?php for ($i=1; $i <= $max_not ; $i++){  ?>
                <td style="border: 0;"></td>
            <?php } ?>
            <td  style="border: 1; text-align: center;"><strong><?php if($asi_alu != "") echo $asi_alu."%"; ?></strong></td>
      </tr>
</table>
<br>
<div>
	<p><strong>Observaciones:</strong><?php for ($i=0; $i < 209; $i++) { 
        echo "_";
    } ?></p>
	
</div>
<br>

      
    <table class="heading" style="width:100%; border: 0;">
        <tr>
            <td style="width:50%; text-align: center; border: 0;">
                <img style="width: 30%"  src="<?php echo Yii::app()->request->baseUrl; ?>/images/firmas/<?php echo $firma_profe; ?>">
                <p><?php echo $profe; ?></p>
                <p>PROFESOR(A)</p>
            </td>
            <td  align="center" style="border: 0;">
                <img style="width: 30%"  src="<?php echo Yii::app()->request->baseUrl; ?>/images/firmas/<?php echo $firma_dir; ?>">
                <p><?php echo strtoupper($nom_director); ?></p>
                <p>DIRECTOR(A)</p>
            </td>
        </tr>
    </table>
         

     
</body>
</html>
