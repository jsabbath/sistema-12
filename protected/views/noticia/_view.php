<?php
/* @var $data Noticia */
if($data->not_fecha==date('Y-m-d')){
	$fecha = 'Hoy';
}else{
	$fecha = $data->not_fecha;
}


?>

<style type="text/css">

.titulo{
	background-color:#43ADCB;
	color: #FFFFFF;
	font-size: 20px;
	font-family: sans-serif;
	font-variant: small-caps;
}

.otro{
	background-color: #D2FAF8;
}

</style>

<table class="table table-bordered" width=100%>
  <tr>
    <th class="otro" width=25%><p class="margen" style="font-weight: bold"><?php echo CHtml::encode($fecha); ?></p></th>
    <th class="titulo" width=50%><p class="margen"><?php echo CHtml::encode($data->not_titulo); ?></p> </th>
    <th class="otro" width=25%><p class="margen"><?php echo CHtml::encode($data->not_responsable); ?></p></th>
  </tr>
  <tr>
    <td class="" width=25%><p class="margen"><?php echo CHtml::encode($data->not_programa); ?></p></td>
    <td class="" colspan="2" width=75%><p class="margen"><?php echo CHtml::encode($data->not_texto); ?></p></td>
  </tr>
</table>
