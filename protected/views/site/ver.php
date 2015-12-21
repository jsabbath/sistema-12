<?php
if( $dataProvider->totalItemCount > 0 ){ // si hay noticias, se muestran 
	$this->widget('zii.widgets.CListView', array(
		'dataProvider'=>$dataProvider,
		'summaryText'=>'',
		'itemView'=>'//noticia/_view',
	));
} else{ ?>

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

<table class="table table-bordered" style="border: 1px solid; border-color: #D2FAF8" width=100%>
  <tr>
    <th class="otro" width=25%><p class="margen" style="font-weight: bold">Hoy</p></th>
    <th class="titulo" width=50%><p class="margen">No hay Noticias</p> </th>
    <th class="otro" width=25%><p class="margen"></p></th>
  </tr>
  <tr>
    <td class="" width=25%><p class="margen">ANUNCIO</p></td>
    <td class="" colspan="2" width=75%><p class="margen"></p></td>
  </tr>
</table>



<?php

}

?>