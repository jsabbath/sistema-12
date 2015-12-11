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

        div > table {
            float: left
        }
    </style>

<body>

<table width="100%" style="border: 0;">
    <tr>
        <td style="border: 0; text-align: center;" width="20%">

                REPUBLICA DE CHILE<br>
                MINISTERIO DE EDUCACION <br>
                DIVISION DE EDUCACION GENERAL <br>
                SECRETARIA REGIONAL MINISTERIAL <br>
                DE EDUCACION

        </td>
        <td style="border: 0; padding: 0; text-align: center;" colspan="2" width="50%">
            <h3>ACTA DE CALIFICACIONES FINALES Y PROMOCION ESCOLAR </h3>
            <h4>RAMA DE ENSEÑANZA BASICA</h4>
            <P>(calificaciones finales)</P>
        </td>

        <td style="border: ; padding: 10;"></td>
        <td colspan="2" style="border: 0; padding: 0; text-align: center; font-size: 8pt;" >
                <strong><?php echo $cole->col_nombre_colegio; ?></strong> <br> NOMBRE DEL ESTABLECIMIENTO
        </td>

    </tr>
    <tr>
    <td style="border: 0;"></td>
        <td style="border: 0; text-align: left; padding: 0; padding-left: 0%">
            Reglamento de Evaluacion y Promocion escolar decreto Supremo exento
        </td>
        <td style="border: 0; padding: 0;">: <?php echo "N° ". $cole->numero_promocion_evaluacion . " de ". $cole->ano_promocion_evaluacion; ?></td>
        <td style="border: 0; padding: 0;"></td>
        <td style="border: 0; padding: 0; padding-left: 35;" width="20%">REGION: <?php echo $cole->col_region; ?></td>
        <td style="border: 0; padding: 0;" width="15%">CIUDAD: <?php echo $cole->col_ciudad; ?></td>
    </tr>
    <tr>
    <td style="border: 0;"></td>
        <td style="border: 0; text-align: left; padding: 0;  padding-left: 0%">
           Plan y programas de estudio aprobado por:(Descreto Supremo; Decreto Supremo Exento)
        </td>
        <td style="border: 0; padding: 0;">:  <?php echo "N° ". $curso->numero_plan_programa . " de ". $curso->ano_plan_programa; ?></td>
        <td style="border: 0; padding: 0;"></td>
        <td  style="border: 0; padding: 0; padding-left: 35;">CURSO: <?php echo $nombre; ?></td>
        <td  style="border: 0; padding: 0;">ROL Base de Datos: <?php echo $cole->col_rolRBD; ?></td>
    </tr>
    <tr>
    <td style="border: 0;"></td>
        <td style="border: 0; text-align: left; padding: 0;  padding-left: 0%">
           Documento que lo declara reconocido oficialmente por el Ministerio de la Republica de Chile, <br>
           (Ley, Decreto Supremo, Decreto o Resolucion Exenta de Educacion)
        </td>
        <td style="border: 0; padding: 0;">: <?php echo "N° ". $cole->numero_decreto_supremo . " de ". $cole->ano_decreto_supremo; ?></td>
        <td style="border: 0; padding: 0;"></td>
        <td  style="border: 0; padding: 0; padding-left: 35;">AÑO ESCOLAR: <?php echo $ano; ?></td>
        <td  style="border: 0; padding: 0;"></td>
    </tr>
</table>
<BR>

<table width="100%" >
    <tr>
        <td width="2%"> N° </td>
        <td width="20%">Apellido paterno y materno, Nombres</td>
        <td width="5%">RUT</td>
        <td width="3%" >SEXO</td>
        <td width="5%">F.NACIM.</td>
        <td width="9%" >COMUNA RESIDENCIA</td>
        <?php
            $asd = 1;
            foreach ($asigs as $key => $a) { ?>
                <td  width="2%"><?php echo $asd++; ?></td>
        <?php  } ?>
        <td width="3%">Prom.</td>
        <td width="2.5%" style="text-align: center">% ASI.</td>
        <td style="text-align: center;" width="2%">SF</td>
        <td style="text-align: center;">OBSERVACIONES</td>
    </tr>

    <?php
        $prom_curso = 0;
        $count_curso = 0;
        $final_curso = 0;
        // numero
        $m = 0;
        $f = 0;
        // retirados
        $y_m  = 0;
        $y_f = 0;
        // promovidos
        $p_m = 0;
        $p_f = 0;
        // reprobados
        $r_m = 0;
        $r_f = 0;
        foreach ($alumnos as $key => $a) {
            $prom_alum = 0;
            $count_alum = 0;
            $final_alum = 0;

            if( $a['genero'][0] == "M" ){ // hombre
                $m++;
                if( $a['retiro'] == $id_retiro ){ // retirado
                    $y_m++;
                }else if( $a['situacion'][0] == "R" ){ // alumno reprobado
                    $r_m++;
                }
                if( $a['situacion'][0] == "P" ){ // promovido
                    $p_m++;
                }
            }
            if( $a['genero'][0] == "F" ){ // mujer
                $f++;
                if( $a['retiro'] == $id_retiro ){ // alumnos retirado
                    $y_f++;
                }else if( $a['situacion'][0] == "R" ){ // alumno reprobado
                    $r_f++;
                }
                if( $a['situacion'][0] == "P" ){ // promovido
                    $p_f++;
                }
            }
    ?>


       <tr>
            <td style="border: 1"><?php echo $a['pos']; ?></td>
            <td style="border: 1"><?php echo $a['nombre']; ?></td>
            <td style="border: 1"><?php echo $a['rut']; ?></td>
            <td style="text-align: center; border: 1" ><?php echo $a['genero'][0]; ?></td>
            <td style="border: 1"><?php echo $a['f_nac']; ?></td>
            <td style="border: 1" ><?php echo $a['comuna']->com_descripcion; ?></td>
            <?php foreach ($a['notas'] as $key => $n) { ?>
                <?php if( $a['retiro'] == $id_retiro  ){ // si el alumno  esta retirado ?>
                <td style="background-color: #EEEEEE; border: 1; <?php  if( $n < 4  AND $n > 0) echo 'color: RED;' ?>" ><?php if( $n > 0 )echo $n ?></td>
                <?php } else{ //  si  el alumno no esta retirado ?>
                    <td style="border: 1; <?php if( $n < 4 AND $n > 0 ){ ?> color: RED; <?php } ?>" >
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



                   ?>
                   <td style="background-color: #EEEEEE;  border: 1"><?php echo $final_alum; ?></td>
                   <?php } else{ ?>
                        <td style=" border: 1;"></td>
                   <?php }

             ?>
            <td style=" border: 1;"><?php if( $a['asistencia'] > 0 ) echo $a['asistencia']; ?></td>
            <td style="text-align: center; border: 1;"><?php
                    if( $a['situacion'][0] != 'A'){
                        if( $a['retiro'] == $id_retiro ){ // si  esta retirado
                            echo "Y";
                        }else{ // alumnos no retirados
                            echo $a['situacion'][0];

                        }
                    }
            ?></td>
            <td style="text-align: center; border: 1;" ><?php if( $a['retiro'] == $id_retiro ){ echo $a['f_retiro']; }else{ echo $a['obs'];  }?></td>
        </tr>
    <?php } ?>


</table>
<br>

<table width="100%" style="border: 0;" >
    <tr>
        <td style="border: 1;" width="2%" >N°</td>
        <td style="border: 1;">Subsectores de Aprendizaje</td>
        <td style="border: 1;">Nombre Profesor</td>
        <td style="border: 1;">RUT</td>
        <td style="border: 1;" width="15%">Firma</td>
        <td style="border: 0;"></td>
        <td style="border: 1; text-align: center;" width="20%">RESULTADO FINAL  DEL CURSO</td>
        <td style="border: 1; text-align: center;" width="5%">Hombres</td>
        <td style="border: 1; text-align: center;" width="5%">Mujeres</td>
        <td style="border: 1; text-align: center;" width="5%">Total</td>
    </tr>
        <?php
            $asd = 1;
            foreach ($asigs as $key => $a) {  ?>
            <tr>
                 <td style="border: 1;" ><?php echo $asd++; ?></td>
                 <td style="border: 1;"> <?php echo $a['n']; ?></td>
                 <td style="border: 1;"><?php echo $a['prof_nom']; ?></td>
                 <td style="border: 1;"><?php echo $a['prof_rut']; ?></td>
                 <td style="border: 1;"></td>
                 <td  style="border: 0;"></td>
                <?php if( $asd == 2 ){ ?>
                    <td style="border: 1;">1.- Matricula Final</td>
                    <td style="border: 1; text-align: center; font-size: 8pt;"><?php echo $m; ?></td>
                    <td style="border: 1; text-align: center; font-size: 8pt;"><?php echo $f; ?></td>
                    <td style="border: 1; text-align: center; font-size: 8pt;"><?php echo $f + $m; ?></td>
                <?php } ?>
                <?php if( $asd == 3 ){ ?>
                    <td style="border: 1;">2.- Retirados durante el año</td>
                    <td style="border: 1; text-align: center; font-size: 8pt;"><?php echo $y_m; ?></td>
                    <td style="border: 1; text-align: center; font-size: 8pt;"><?php echo $y_f; ?></td>
                    <td style="border: 1; text-align: center; font-size: 8pt;"><?php echo $y_f + $y_m; ?></td>
                <?php } ?>
                <?php if( $asd == 4 ){ ?>
                    <td style="border: 1;">3.- Promovidos</td>
                    <td style="border: 1; text-align: center; font-size: 8pt;"><?php echo $p_m; ?></td>
                    <td style="border: 1; text-align: center; font-size: 8pt;"><?php echo $p_f; ?></td>
                    <td style="border: 1; text-align: center; font-size: 8pt;"><?php echo $p_f + $p_m; ?></td>
                <?php } ?>
                <?php if( $asd == 5 ){ ?>
                    <td style="border: 1;">4.- Reprobados por:</td>
                    <td style="border: 1; text-align: center;"></td>
                    <td style="border: 1; text-align: center;"></td>
                    <td style="border: 1; text-align: center;"></td>
                <?php } ?>
                <?php if( $asd == 6 ){ ?>
                    <td style="border: 1;">  &nbsp;&nbsp;  4.1.- Inasistencia</td>
                    <td style="border: 1; text-align: center; font-size: 8pt;"><?php  ?></td>
                    <td style="border: 1; text-align: center; font-size: 8pt;"><?php  ?></td>
                    <td style="border: 1; text-align: center; font-size: 8pt;"><?php  ?></td>
                <?php } ?>
                <?php if( $asd == 7 ){ ?>
                    <td style="border: 1;">  &nbsp;&nbsp;  4.2.- Rendimiento</td>
                    <td style="border: 1; text-align: center; font-size: 8pt;"><?php  ?></td>
                    <td style="border: 1; text-align: center; font-size: 8pt;"><?php  ?></td>
                    <td style="border: 1; text-align: center; font-size: 8pt;"><?php  ?></td>
                <?php } ?>
                <?php if( $asd == 8 ){ ?>
                    <td style="border: 1;">  &nbsp;&nbsp;  TOTAL REPROBADOS</td>
                    <td style="border: 1; text-align: center; font-size: 8pt;"><?php echo $r_m; ?></td>
                    <td style="border: 1; text-align: center; font-size: 8pt;"><?php echo $r_f; ?></td>
                    <td style="border: 1; text-align: center; font-size: 8pt;"><?php echo $r_f + $r_m; ?></td>
                <?php } ?>
                </tr>

        <?php  } ?>
</table>
<br>
<p>
    Observaciones: <?php for ($i=0; $i < 170 ; $i++) {
        echo "_";
    } ?>
     <br><br> Situacion Final: P= PROMOVIDO, R= REPROBADO, Y= Retirados
</p>

<table width="100%" style="border: 0;">
    <tr>
        <td width="25%" style="text-align: center; border: 0;"  valign="bottom">
            FIRMA ENCARGADO(A) CONFECCION DE ACTAS
        </td>
        <td width="25%" style="text-align: center; border: 0;"  valign="bottom">
            <img style="width: 10%"  src="<?php echo Yii::app()->request->baseUrl; ?>/images/firmas/<?php echo $firma_profe; ?>"><br>
            <strong> <?php echo $profe;  ?></strong><br>
            NOMBRE, APELLIDO Y FIRMA PROFESOR(A) JEFE
        </td>
        <td width="25%" style="text-align: center; border: 0;"  valign="bottom">
            <img style="width: 10%"  src="<?php echo Yii::app()->request->baseUrl; ?>/images/firmas/<?php echo $firma_dir; ?>"><br>
            <strong><?php echo $nom_director; ?></strong><br>
            DIRECTOR(A)
        </td>
    </tr>
</table>

</body>
</html>
