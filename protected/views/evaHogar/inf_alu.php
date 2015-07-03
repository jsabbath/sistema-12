<!DOCTYPE html>
<html>
<head>
<title>HTML Reference</title>
</head>

<style>
        @page 
        {
            margin-top: 10;
            margin-bottom: 10;
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
            padding: 1mm;
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
        .firma
        {
            width: 12%; 
            border: 1;
            border-top: 0; 
            border-left: 0;
            border-right: 0;
            border-color: #000;
        }
    </style>

<body>



<table width="100%" style="border: 0;">
    <tr>
        <td width="20%" style="border: 0;"><img style="width: 65px" src="<?php echo Yii::app()->request->baseUrl."/images/". $cole->col_logo; ?>"></td>
        <td width="80%" style="border: 0;">
            <h2><?php echo $cole->col_nombre_colegio ?></h2>
            <p><?php echo $cole->col_direccion. " - F(41) ". $cole->col_telefono; ?></p>
            <p>AÑO <?php echo $ano; ?></p>
        </td>
    </tr>
</table>



<div style="text-align: center">
    <h3 style="margin-bottom: 0;">INFORME AL HOGAR</h3>
    <h3 style="margin-top: 0;"><?php echo $nombre_inf; ?></h3>
</div>


<table style="border: 1;" width="100%">
    <tr style="border: 0;">
        <td style="border: 0;">
            <p>Nombre </p>
        </td>
        <td  style="border: 0; ">
            <strong>: <?php echo $model->matAlu->alum_nombres." ".$model->matAlu->alum_apepat
            ." ".$model->matAlu->alum_apemat; ?></strong>
        </td>
        <td style="border: 0;"> 
            <p>RUT </p>
        </td>
        <td  style="border: 0;">
         <strong>: <?php echo $model->matAlu->alum_rut;?></strong>
         </td>
    </tr >
    
    <tr style="border: 0;;">
         <td style="border: 0;"> 
            <p>Fecha de Nacimiento </p>
        </td>
        <td style="border: 0;">
         <strong>: <?php $date =  $model->matAlu->alum_f_nac; echo date('d-m-Y',strtotime($date));?></strong>
         </td>
        <td style="border: 0;"> 
            <p>Curso </p>
        </td>
        <td style="border: 0;">
         <strong>: <?php echo $curso_nombre;?></strong>
         </td>
    </tr>

    <tr style="border: 0; ">
        <td style="border: 0;"> 
            <p>Educadora de Párvulos </p>
        </td>
        <td style="border: 0;">
         <strong>: <?php echo $profe;?></strong>
         </td>
          <td style="border: 0;"> 
            <p>Asistencia </p>
        </td>
         <td style="border: 0;">
         <strong>: <?php echo $model->mat_asistencia_1."% (I SEM) - ".$model->mat_asistencia_2."% (II SEM)"; ?></strong>
         </td>

    </tr>
   

</table>


<br>
    
<?php

    foreach ($areas as $key => $are) {
        $con = $are['area_con'];
        if( $are['nombre_area'] != "PERSONALIDAD"){  
?>
            <p><strong>AMBITO: <?php echo $are['nombre_area']; ?></strong></p>
            <table width="100%" style="border: 1;" >
                <tr>
                    <td style="text-align: center;"><strong>INDICADORES</strong></td>
                    <td style="text-align: center" width="8%">1°S</td>
                     <td style="text-align: center" width="8%" >2°S</td>
                </tr>
                <?php foreach ($con as $key => $c) { ?>
                 <tr style="border: 1;">
                    <td style="text-align: left;"><?php echo $c['nombre_con']; ?></td>
                    <td style="text-align: center" width="8%"><?php echo $c['nota1']; ?></td>
                     <td style="text-align: center" width="8%" ><?php echo $c['nota2']; ?></td>
                </tr>

                <?php } ?>

            </table>
<br>
<?php }else{ ?>

            <table width="100%" style="border: 1;">
                <tr>
                    <td style="text-align: center;"><strong>INDICADORES DE PERSONALIDAD</strong></td>
                    <td style="text-align: center" width="8%">1°S</td>
                     <td style="text-align: center" width="8%" >2°S</td>
                </tr>
                <?php foreach ($con as $key => $c) { ?>
                <tr style="border: 1;">
                    <td style="text-align: left;"><?php echo $c['nombre_con']; ?></td>
                    <td style="text-align: center" width="8%"><?php echo $c['nota1']; ?></td>
                     <td style="text-align: center" width="8%" ><?php echo $c['nota2']; ?></td>
                </tr>

                <?php } ?>

            </table>
            <br>
<?php }} ?>



<br>


      
    <table class="heading" style="width:100%;">
        <tr>
            <td colspan="3" style="text-align: center"><strong>OBSERVACIONES PRIMER SEMESTRE</strong></td>
        </tr>
         <tr>
            <td colspan="3" style="text-align: left;  border-bottom: 0; font-size: 9pt;"><?php echo $des1; ?></td>
        </tr>
       
        <tr >
            <td style="width:35%; text-align: center; border-top: 0; border-right: 0;">
                <img class="firma" style="width: 12%;"  src="<?php echo Yii::app()->request->baseUrl; ?>/images/firmas/<?php echo $firma_profe; ?>">     
                <p>PROFESOR(A)</p>
            </td>
            <td  align="center" style="width: 35%; border-top: 0; border-left: 0; border-right: 0;">
                <img class="firma" style="width: 12%;"  src="<?php echo Yii::app()->request->baseUrl; ?>/images/firmas/<?php echo $firma_dir; ?>">             
                <p>DIRECTOR(A)</p>
            </td>
             <td  align="center" style="width: 35%; border-top: 0; border-left: 0; ">
                 <img class="firma" style="width: 12%;"  src="<?php echo Yii::app()->request->baseUrl; ?>/images/firmas/apoderado.png"> 
                <p style="vertical-align: buttom">APODERADO</p>
            </td>
        </tr>
    </table>
<br>
    
    <table class="heading" style="width:100%;">
        <tr>
            <td colspan="3" style="text-align: center"><strong>OBSERVACIONES SEGUNDO SEMESTRE</strong></td>
        </tr>
         <tr>
            <td colspan="3" style="text-align: left;  border-bottom: 0; font-size: 9pt;"><?php echo $des2; ?></td>
        </tr>
         
        <tr >
            <td style="width:35%; text-align: center; border-top: 0; border-right: 0;">
                <img class="firma" style="width: 12%;"  src="<?php echo Yii::app()->request->baseUrl; ?>/images/firmas/<?php echo $firma_profe; ?>">     
                <p>PROFESOR(A)</p>
            </td>
            <td  align="center" style="width: 35%; border-top: 0; border-left: 0; border-right: 0;">
                <img class="firma" style="width: 12%;"  src="<?php echo Yii::app()->request->baseUrl; ?>/images/firmas/<?php echo $firma_dir; ?>">             
                <p>DIRECTOR(A)</p>
            </td>
             <td  align="center" style="width: 35%; border-top: 0; border-left: 0; ">
                 <img class="firma" style="width: 12%;"  src="<?php echo Yii::app()->request->baseUrl; ?>/images/firmas/apoderado.png"> 
                <p style="vertical-align: buttom">APODERADO</p>
            </td>
        </tr>
    </table>


<br>
      <table width="100%" style="vertical-align: bottom; border: 0; text-align: center">
        <tr>
        <td style="border: 0;">CRITERIOS: <?php 
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
        ?></td>
        </tr>
    </table>   

</body>

 

</html>
