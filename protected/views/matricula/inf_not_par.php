<?php

function fecha(){
	$dias = array('1'=>'Lunes','2'=>'Martes','3'=>'Miercoles','4'=>'Jueves','5'=>'Viernes','6'=>'Sabado','7'=>'Domingo');
	$meses = array('1'=>'Enero','2'=>'Febrero','3'=>'Marzo','4'=>'Abril','5'=>'Mayo','6'=>'Junio','7'=>'Julio','8'=>'Agosto',
		'9'=>'Septiembre','10'=>'Octubre','11'=>'Noviembre','12'=>'Diciembre');
	$dia = $dias[date('N')];
	$dia_numero = date('d');
	$mes = $meses[date('n')];
	$anio = date('Y');
	$fecha_actual = $dia.", ".$dia_numero." de ".$mes.". ".$anio;

	return $fecha_actual;
}

?>

<!DOCTYPE html>
<html>

<style>
        *
        {
            margin:0;
            padding:0;
            font-family:Arial;
            font-size:10pt;
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
		<td width="20%" style="border: 0;"><img style="width: 80px" src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo_colegio.png"></td>
		<td width="80%" style="border: 0;">
			<h2>Colegio Alborada</h2>
			<p>Ruta 160 N° 3573 - Concepcion, San Pedro de la Paz - F(41) 2278599</p>
		</td>
	</tr>
</table>

<br>
<br>

<div style="text-align: center">
	<h2>Informe de Notas Parciales</h2>
</div>
<br>

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
</table>

<br>

<?php foreach ($notas as $key => $a) {
	var_dump($a['nom_asi']);
} ?>


<table width="100%" style="border: 1;">
	
	<tr>
		<td><strong>Asignatura</strong></td>
		<td>n1</td>
		<td>n2</td>
		<td>n3</td>
		<td>n4</td>
		<td>n5</td>
		<td>n6</td>
	</tr>	
	
	<tr>
		<td><p><strong>Matematicas</strong></p></td>
		<td><p>7.0</p></td>
		<td><p>7.0</p></td>
		<td><p>5.5</p></td>
		<td><p>7.0</p></td>
		<td><p>7.0</p></td>
		<td><p>7.0</p></td>
	</tr>
	
</table>
<br>
<br>
<div>
	<p>Asiste regularmente a este establecimiento educacional, cursando actualmente :</p>
	<h4><?php echo "Inserte su curso aqui"; ?></h4>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<div style="text-align:center">
	<p>el nombre del director</p>
	<p>DIRECTOR(A)</p>
</div>


     
</body>
</html>
