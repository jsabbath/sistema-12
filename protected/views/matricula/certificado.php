<table width="100%">
	<tr>
		<td width="20%"><img style="width: 80px" src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo_colegio.png"></td>
		<td width="80%">
			<h2>Colegio Alborada</h2>
			<p>Ruta 160 N° 3573 - Concepcion, San Pedro de la Paz - F(41) 2278599</p>
		</td>
	</tr>
</table>
<br>
<br>
<br>
<br>
<div style="text-align: center">
	<h2>Certificado de Alumno Regular</h2>
</div>
<br>
<br>
<div>
	<p>Decreto Cooperador : un numero</p>
</div>
<div>
	<p>Certifico que el alumno <strong><?php echo $model->matAlu->alum_nombres." ".$model->matAlu->alum_apepat
		." ".$model->matAlu->alum_apemat; ?></strong>, Rut numero <strong><?php echo $model->matAlu->alum_rut;?></strong></p>
</div>
<table width="100%">
	<tr>
		<td width="50%"><p>Inscrito con el N°: <?php echo $model->mat_numero; ?></p></td>
		<td width="50%"><p>Del registro año: <?php echo $model->mat_ano;?></p></td>
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