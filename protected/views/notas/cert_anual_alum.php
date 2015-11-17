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
            font-size:9pt;
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



<table width="100%" style="border: 0;">
	<tr>
		<td width="6%" style="border: 0;"><img style="width: 60px" src="<?php echo Yii::app()->request->baseUrl."/images/". $cole->col_logo; ?>"></td>
		<td width="32%" style="border: 0;">
			<h2><?php echo $cole->col_nombre_colegio ?></h2>
			<p><?php echo $cole->col_direccion. " - ". $cole->col_telefono; ?></p>
		</td>

        <td width="10%" style="border: 1; border-right: 0;">
            <p>Región</p>
            <p>año Escolar</p> 

            <td width="10%" style="border: 1; border-left: 0">
               <p><?php echo ": ". $cole->col_region; ?></p>
               <p><?php echo ": ". $ano; ?></p>
            </td>
        </td>
	</tr>
</table>



<h2 style="text-align: center">Certificado Anual de Estudio</h2>



<table style="border: 0;" width="100%">
	<tr style="border: 0;">
		<td style="border: 0; text-align: justify; text-justify: inter-word; font-size: 9.5pt">
			<p>RECONOCIDO OFICIALMENTE POR EL MINISTERIO  DE EDUCACION  DE LA REPÚBLICA DE CHILE SEGÚN Res. Rec. 
            Oficial/Doc. Transpaso N° <?php echo $cole->col_numero_resol_rec_ofic; ?> DEL AÑO <?php echo date("Y",$cole->col_fecha_resol_rec_ofic); ?> 
            ROL BASE DE DATOS N° <?php echo $cole->col_rolRBD; ?> OTORGA EL PRESENTE CERTIFICADO DE CALIFICACIONES ANUALES Y SITUACIÓN FINAL A DON(A)
            <strong><?php echo $model->matAlu->getNombre_completo_3(); ?> RUT: <?php echo $model->matAlu->alum_rut; ?> DEL <?php echo $curso_nombre; ?> DE ENSEÑANZA BÁSICA</strong>  
            DE ACUERDO AL PLAN Y PROGRAMAS DE ESTUDIO APROBADOS POR DECRETO O RESOL. EXENTA DE EDUCACION N° <?php echo $cole->numero_plan_programa; ?> DEL AÑO
            <?php echo $cole->ano_plan_programa; ?> Y REGLAMENTO DE EVALUACION Y PROMOCIÓN ESCOLAR DTO. EXENTO N° <?php echo $cole->numero_promocion_evaluacion; ?> 
            DEL <?php echo $cole->ano_promocion_evaluacion ?></p>
		</td>
	</tr>	
</table>

<br>
<br>

<table width="100%" style="border: 1;">
    <tr style="background-color: #EEEEEE;">
        <td></td>
        <td colspan="2"><strong>CALIFICACIÓN FINAL</strong></td>
    </tr>

    <tr style="background-color: #EEEEEE;">
        <td><strong>ASIGNATURA O ACTIVIDADES DE APRENDIZAJE</strong></td>
        <td><strong>CIFRAS</strong></td>
        <td><strong>PALABRAS</strong></td>
    </tr>

    <?php foreach ($notas as $key => $n) { ?>
            <tr>
                <td><?php echo $n["nom_asi"]; ?></td>
                <td><?php echo $n["nota"]; ?></td>
                <td><?php echo $n["not_pal"]; ?></td>
            </tr>
    <?php } ?>

    <tr>
        <td><strong>Promedio general</strong></td>
        <td><?php echo $final; ?></td>
        <td><?php echo Numero_a_palabra::convert($final); ?></td>
    </tr>

    <tr>
        <td><strong>Porcentaje Asistencia</strong></td>
        <td><?php if( $asistencia > 0 ) echo $asistencia."%"; ?></td>
        <td></td>
    </tr>

    <tr>
        <td><strong>Situcacion Final: <?php echo $model->matEstado->par_descripcion; ?></strong></td>
        <td></td>
        <td></td>
    </tr>

</table>

<br>
<div>
	<p><strong>Observaciones:</strong></p>
	
</div>

<br>
<br>
<br>
      
    <table class="heading" style="width:100%; border: 0;">
        <tr>
            <td style="width:50%; text-align: center; border: 0;">
                <img style="width: 25%"  src="<?php echo Yii::app()->request->baseUrl; ?>/images/firmas/<?php echo $firma_profe; ?>">
                <p><?php echo $profe; ?></p>
                <strong><p>PROFESOR(A)</p></strong>
            </td>
            <td  align="center" style="border: 0;">
                <img style="width: 25%"  src="<?php echo Yii::app()->request->baseUrl; ?>/images/firmas/<?php echo $firma_dir; ?>">
                <p><?php echo strtoupper($nom_director); ?></p>
                <strong><p>DIRECTOR(A)</p></strong>
            </td>
        </tr>
    </table>
         

     
</body>
</html>
