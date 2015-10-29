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
            font-size:6.5pt;
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
         

    </style>

<body>



<div style="text-align: left">
	<h1>CONSOLIDADO DE NOTAS</h1>
    <h2>Curso: <?php echo $nombre; ?></h2>
</div>

<table width="100%">
    <tr>
        <td>N°</td>
        <td width="35%">Nombre</td>
        <?php foreach ($asigs as $key => $a) { ?>
                <td><?php echo $a['nom']; ?></td>
        <?php  } ?>
        <td>Prom.</td>
        <td width="5%">Asistencia</td>
        <td>Fec.Retiro</td>
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
            <td><?php echo $a['nombre']; ?></td>
            <?php foreach ($a['notas'] as $key => $n) { ?>
                <?php if( $a['retiro'] == $id_retiro  ){ // si el alumno  esta retirado ?> 
                        <td style="background-color: #EEEEEE; <?php  if( $n < 4  AND $n > 0) echo 'color: RED;' ?>" ><?php echo $n ?></td>
                <?php } else{ //  si  el alumno no esta retirado ?>
                        <td <?php if( $n < 4 AND $n > 0 ){ ?> style="color: RED;" <?php } ?> ><?php echo $n ?></td>
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
            <td><?php if( $a['retiro'] == $id_retiro ) echo $a['f_retiro']; ?></td>
        </tr>    
    <?php } ?>

    <tr>
        <td>Prom.</td>
        <td></td>
        <?php foreach ($asigs as $key => $a) { // promedio asignatura VERTICAL?>  
                <td><?php 
                    if( $a['n'] == "RELIGION" ){
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

     
</body>
</html>
