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
            font-size:8pt;
            color:#000;
        }
        body
        {
            width:100%;
            font-family:Arial;
            font-size:8pt;
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
			<p><?php echo $cole->col_direccion. " - F(41) ". $cole->col_telefono. " - RolDB: ".$cole->col_rolRBD; ?></p>
		</td>
	</tr>
</table>



<div style="text-align: center">
	<h2><?php echo $nombre_inf; ?></h2>
</div>


<table style="border: 0;">
	<tr style="border: 0;">
		<td style="border: 0;">
			<p>Nombre </p>
		</td>
		<td  style="border: 0;">
			<strong>: <?php echo $model->matAlu->alum_nombres." ".$model->matAlu->alum_apepat
			." ".$model->matAlu->alum_apemat; ?></strong>
		</td>
        <td style="border: 0;"> 
            <p>Rut </p>
        </td>
        <td  style="border: 0;">
         <strong>: <?php echo $model->matAlu->alum_rut;?></strong>
         </td>
	</tr>
	
    <tr style="border: 0;">
        <td style="border: 0;"> 
            <p>Año Academico </p>
        </td>
        <td style="border: 0;">
         <strong>: <?php echo $ano;?></strong>
         </td>
          <td style="border: 0;"> 
            <p>Curso </p>
        </td>
        <td style="border: 0;">
         <strong>: <?php echo $curso_nombre;?></strong>
         </td>
    </tr>

    <tr style="border: 0;">
        <td style="border: 0;"> 
            <p>Profesor Jefe </p>
        </td>
        <td style="border: 0;">
         <strong>: <?php echo $profe;?></strong>
         </td>
          <td style="border: 0;"> 
            <p>Periodo </p>
        </td>
        <td  style="border: 0;">
         <strong>: <?php echo $periodo;?></strong>
         </td>
    </tr>
   

</table>


<table width="100%" style="border: 0;">
	
<?php
	$areas = $inf[0]['areas'];

	foreach ($areas as $key => $are) {
		$notas = $are['are_nota'];
?>
		<tr>
			<td style="border-right: 0; border-left: 0; text-align: left;"><strong><?php echo $are['are_nombre']; ?></strong></td>
			<td style="border-left: 0; border-right: 0;" ></td>
		</tr>

	<?php 
		foreach ($notas as $key => $n) { 
	?>
		<tr>
			<td style="border: 1;"><?php echo $n['eva_nombre']; ?></td>
			<td class="text-center" ><?php echo $n['eva_nota']; ?></td>
		</tr>

	<?php } ?>
<?php } ?>

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
