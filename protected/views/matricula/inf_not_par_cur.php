<!DOCTYPE html>
<html>
<head>
<title>HTML Reference</title>
</head>

<style>
        @page {
         margin-top: 0px;
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
<?php 

foreach ($lista_alu as $key => $alu) {
               
    $id = $alu['id'];

    $model = Matricula::model()->findByPk($id);
    $notas = array();

    $evaluaciones = Notas::model()->findAll(array('condition' => 'not_mat=:x AND not_periodo=:y','params' =>  array( ':x' => $id, ':y' => $periodo )));

    if( empty($evaluaciones) ){
       throw new CHttpException(404, 'Alumno sin Curso.'.$id);
    }
    foreach ($evaluaciones as $key => $alum) {

        $asi = Asignatura::model()->findByPk($alum->not_asig);

        $notas[] = array(
              'nota'    => $alum->notas,
              'nom_asi' => $asi->asi_descripcion,
            );

    }
    $notas = array_unique($notas, SORT_REGULAR);
    $ano = $evaluaciones[0]['not_ano'];   



 ?>


<table width="100%" style="border: 0;">
    <tr>
        <td width="20%" style="border: 0;"><img style="width: 80px" src="<?php echo Yii::app()->request->baseUrl."/images/". $cole->col_logo; ?>"></td>
        <td width="80%" style="border: 0;">
            <h2><?php echo $cole->col_nombre_colegio ?></h2>
            <p><?php echo $cole->col_direccion. " - F(41) ". $cole->col_telefono; ?></p>
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
	
	</tr>	


	<?php 
        foreach ($notas as $key => $a) { 
                $n = $a['nota'];
    ?>
        <tr>
            <td><p><strong><?php echo $a['nom_asi'] ?></strong></p></td>

            <?php for ($i=1; $i <= $max_not ; $i++){ 
                if( $n[$i] < 4 ) { ?>
                    <td style="color: RED;" ><strong><?php if( $n[$i] != 0 ){ 
                        if ( strlen($n[$i]) == 1 ){
                            echo  ''.$n[$i] . '.0';
                        } else{
                            echo $n[$i]; 
                        }
                    }?></strong></td>
                <?php }else{ ?>
                    <td> <strong><?php if( $n[$i] != 0 ){ 
                        if ( strlen($n[$i]) == 1 ){
                            echo  ''.$n[$i] . '.0';
                        } else{
                            echo $n[$i]; 
                        }

                        }?></strong> </td>
                <?php } ?>
            <?php } ?>
            <td></td><!-- final -->
        </tr>

       <?php }?>
	
	
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
   <?php 

    
}

 ?>              

     
</body>
</html>
