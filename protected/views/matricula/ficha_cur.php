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
    foreach ($lista as $key => $l) {
        $id_mat = $l['id'];
        $mat = Matricula::model()->findByPk($id_mat);
        $alum = Alumno::model()->findByPk($mat->mat_alu_id);

?>


<?php 
    $fonos = $alum->alum_fonos_emergencia;

    list($f1,$f2) = explode('//',$fonos);
    list($nom1,$fon1) = explode('::',$f1);
    list($nom2,$fon2) = explode('::',$f2);
?>


<table width="100%" style="border: 0;">
    <tr>
        <td width="13%" style="border: 0;"><img style="width: 80px" src="<?php echo Yii::app()->request->baseUrl."/images/". $cole->col_logo; ?>"></td>
        <td width="50%" style="border: 0;">
            <h2><?php echo $cole->col_nombre_colegio ?></h2>
            <p><?php echo $cole->col_direccion. " - ". $cole->col_telefono. " - Rbd: ".$cole->col_rolRBD; ?></p>
        </td>
        <td style="border: 1;">
           Fecha Matricula: <strong>  <?php echo $mat->mat_fingreso; ?></strong> <br>
           Numero Matricula: <strong><?php echo $mat->mat_numero ?></strong> <br>
           Curso: <strong><?php echo $curso_nombre; ?></strong>
        </td>
    </tr>
</table>



<div style="text-align: center">
    <h2>Ficha Matricula <?php echo $ano ?></h2>
</div>

<h3>Alumno</h3>
<table width="100%">
    <tr>
        <td>
            Nombres: <br>
            <strong> <?php echo $alum->alum_nombres; ?></strong>

        </td>

        <td>
            Apellido Paterno:<br>
            <strong> <?php echo $alum->alum_apepat; ?> </strong>
        </td>

        <td>
            Apellido Materno: <br>
            <strong> <?php echo $alum->alum_apemat; ?> </storng>
        </td>
    </tr>

    <tr>
        <td>
            RUT: <br>
            <strong> <?php echo $alum->alum_rut;?></strong>
        </td>

        <td>
            Genero: <br>
            <strong> <?php echo $alum->alumGenero->par_descripcion; ?> </strong>
        </td>


        <td>
            Fecha Nacimiento: <br>
            <strong> <?php echo $alum->alum_f_nac; ?> </strong>
        </td>

    </tr>

    <tr>
        <td colspan="3">
            Direccion: <br>
            <strong> <?php echo $alum->alum_direccion; ?> </strong>
        </td>
    </tr>

    <tr>
        <td>
            Region: <br>
            <strong> <?php echo $alum->alumRegion->reg_descripcion; ?></strong>
        </td>

        <td>
            Ciudad: <br>
            <strong> <?php echo $alum->alumCiudad->ciu_descripcion; ?></strong>
        </td>

        <td>
            Comuna: <br>
            <strong> <?php echo $alum->alumComuna->com_descripcion; ?></strong>
        </td>
    </tr>



    <tr>
        <td>
            Religion: <br>
            <strong><?php echo $alum->alumReligion->par_descripcion; ?></strong>
        </td>

        <td>
            Metodo Transporte: <br>
            <strong><?php echo $alum->alum_transporte; ?></strong>
        </td>

        <td>
            Colegio Procedencia: <br>
            <strong><?php echo $alum->alum_procedencia; ?></strong>
        </td>
    </tr>

    <tr>
        <td>
            Estado Academico: <br>
            <strong><?php echo $alum->alum_aprendizaje; ?></strong>
        </td>

        <td colspan="2">
            Obserbaciones: <br>
            <strong><?php echo $alum->alum_obs; ?></strong>
        </td>
    </tr>

</table>

<h3>Estado de salud</h3>
<table width="100%">
    <tr>
        <td>
            Situacion Salud: <br>
            <strong><?php echo $alum->alum_salud; ?></strong>
        </td>

        <td>
            Enfermedad: <br>
            <strong><?php echo $alum->alum_enfermedad; ?></strong>
        </td>

        <td>
            Medicamentos: <br>
            <strong><?php echo $alum->alum_medicamentos; ?></strong>
        </td>
    </tr>
</table>

<br>
<h3>Familia</h3>
<table  width="100%">
    <tr>
        <td>
            Nombre Madre: <br>
            <strong><?php echo $alum->alum_madre_nombre; ?></strong>
        </td>

        <td>
            RUT Madre: <br>
            <strong><?php echo $alum->alum_madre_rut; ?></strong>
        </td>

        <td>
            Nive Educacional: <br>
            <strong><?php echo $alum->alumMadrenivel->par_descripcion; ?></strong>
        </td>
    </tr>

    <tr>
        <td>
            Nombre Padre: <br>
            <strong><?php echo $alum->alum_padre_nombre; ?></strong>
        </td>

        <td>
            RUT Padre: <br>
            <strong><?php echo $alum->alum_padre_rut; ?></strong>
        </td>

        <td>
            Nive Educacional: <br>
            <strong><?php echo $alum->alumPadrenivel->par_descripcion; ?></strong>
        </td>
    </tr>

    <tr>
        <td >
            Alumno vive con: <br>
            <strong><?php echo $alum->alum_vive_con; ?></strong>
        </td>

        <td style="border-right: 0;">
            Fonos de Emergencia: <br>
            <strong><?php echo $nom1 . " : " . $fon1;?></strong>
        </td>

         <td style="border-left: 0;">
            <br>
            <strong><?php echo $nom2 . " : " . $fon2;?></strong>
        </td>
    </tr>


</table>

<h3>Apoderados</h3>
<table width="100%">
    <tr>
        <td>
            Nombre Apoderado Oficial: <br>
            <strong><?php echo $alum->alum_apo1_nombre; ?></strong>
        </td>

        <td>
            Rut Apodrado Oficial: <br>
            <strong><?php echo $alum->alum_apo1_rut; ?></strong>
        </td>

        <td>
            Fono Apoderado Oficial: <br>
            <strong><?php echo $alum->alum_apo1_telefono; ?></strong>
        </td>
    </tr>

    <tr>
        <td>
            Nombre Apoderado Suplente: <br>
            <strong><?php echo $alum->alum_apo2_nombre; ?></strong>
        </td>

        <td>
            Rut Apodrado Oficial: <br>
            <strong><?php echo $alum->alum_apo2_rut; ?></strong>
        </td>

        <td>
            Fono Apoderado Oficial: <br>
            <strong><?php echo $alum->alum_apo2_telefono; ?></strong>
        </td>
    </tr>
</table>


<h3>Ingresos</h3>
<table width="100%">
    <tr>
        <td>
            Activida Madre: <br>
            <strong><?php echo $alum->alum_madre_actividad; ?></strong>
        </td>

        <td>
            Lugar o Empresa: <br>
            <strong><?php echo $alum->alum_madre_act_tipo; ?></strong>
        </td>

        <td>
            Ingresos: <br>
            <strong><?php echo $alum->alum_madre_ingresos; ?></strong>
        </td>
    </tr>

    <tr>
        <td>
            Activida Padre: <br>
            <strong><?php echo $alum->alum_padre_actividad; ?></strong>
        </td>

        <td>
            Lugar o Empresa: <br>
            <strong><?php echo $alum->alum_padre_act_tipo; ?></strong>
        </td>

        <td>
            Ingresos: <br>
            <strong><?php echo $alum->alum_padre_ingresos; ?></strong>
        </td>
    </tr>
    <tr>
        <td colspan="3" ></td>
    </tr>

    <tr>
        <td>
            Activida Otro Familiar: <br>
            <strong><?php echo $alum->alum_fam1_actividad; ?></strong>
        </td>

        <td>
            Lugar o Empresa: <br>
            <strong><?php echo $alum->alum_fam1_actividad; ?></strong>
        </td>

        <td>
            Ingresos: <br>
            <strong><?php echo $alum->alum_fam1_ingreso; ?></strong>
        </td>
    </tr>

    <tr>
        <td>
             Activida Otro Familiar: <br>
            <strong><?php echo $alum->alum_fam2_actividad; ?></strong>
        </td>

        <td>
            Lugar o Empresa: <br>
            <strong><?php echo $alum->alum_fam2_actividad; ?></strong>
        </td>

        <td>
            Ingresos: <br>
            <strong><?php echo $alum->alum_fam2_ingreso; ?></strong>
        </td>
    </tr>
</table>

<br>

<h3>Vivienda</h3>
<table width="100%">
    <tr>
        <td>
            Vivienda: <br>
            <strong><?php echo $alum->alumVivienda->par_descripcion; ?></strong>
        </td>

        <td>
            Tipo Construccion: <br>
            <strong><?php echo $alum->alumConstruccion->par_descripcion; ?></strong>
        </td>

        <td>
            Cantida de Dormitorios: <br>
            <strong><?php echo $alum->alum_dormitorios; ?></strong>
        </td>
    </tr>

    <tr>
        <td colspan="2">
            Tipo  de baño: <br>
            <strong><?php echo $alum->alumBañotipo->par_descripcion; ?></strong>
        </td>

        <td>
            Cantida de Baños: <br>
            <strong><?php echo $alum->alum_baño_cantidad ?></strong>
        </td>
    </tr>
</table>

<br>
<table width="100%">
    <tr>
        <td colspan="3">
            Documentos Recibidos: <br>
            <strong><?php echo $mat->mat_documentos; ?></strong>
        </td>
    </tr>
</table>


<br><br>
<p align="justify"> 
    <strong>    
        <?php echo $cole->col_text_ficha; ?>
    </strong>
</p>



<br><br><br><br>

    <table style="width:100%; border: 0;">
        <tr>
            <td style="width:50%; text-align: center; border: 1;">
                <p > Nombre Apoderado: <br> <strong><?php echo $alum->alum_apo1_nombre; ?> </strong></p> 
                <p> RUT Apoderado: <br><strong><?php echo $alum->alum_apo1_rut; ?></strong></p> 
                <p> Firma Apoderado: </p> <br> <br> <br> <br>
            </td>

            <td style="border: 0;">
                
            </td>
            <td style="width:50%; text-align: center;  border: 1;">
                <p > Nombre Funcionario:  <br> <br> </p> 
                <p> RUT Funcionario: <br>  <br></p> 
                <p> Firma Funcionario: </p> <br> <br> <br> <br>
            </td>

            
        </tr>
    </table>
    <pagebreak />


<?php } ?>
</body>
</html>
