
<?php
/* @var $this SiteController */
$nombre = 'admin';
$modelo_usuario = Usuario::model()->findByAttributes(array('usu_iduser' => Yii::app()->user->id));
if ($modelo_usuario) {
    $nombre = "" . $modelo_usuario->usu_nombre1 . " " . $modelo_usuario->usu_apepat;
}


$this->pageTitle=Yii::app()->name;
?>

<div class="row">
	<div class="span8 offset1">
		<h3 class="text-center">Noticias</h3>
		<?php $this->actionVer(); ?>
	</div>
	<div class="span3 text-center hidden-phone">
		<br>
		<?php  
		//echo CHtml::link('Mis Eventos',array('Evento/calendario'),array('class'=>'btn btn-success btn-block'));
		?>
		<br>
		<div style="text-align:center;width:112px;"><!-- LiveZilla Chat Button Link Code (ALWAYS PLACE IN BODY ELEMENT) --><!-- LiveZilla Tracking Code (ALWAYS PLACE IN BODY ELEMENT) --><div id="livezilla_tracking" style="display:none"></div><script type="text/javascript">
		var script = document.createElement("script");script.async=true;script.type="text/javascript";var src = "http://www.antumalen.cl/helpdesk/server.php?a=e6f85&rqst=track&output=jcrpt&intgroup=U29wb3J0ZS1BbXN5cw__&nse="+Math.random();setTimeout("script.src=src;document.getElementById('livezilla_tracking').appendChild(script)",1);</script><noscript><img src="http://www.antumalen.cl/helpdesk/server.php?a=e6f85&amp;rqst=track&amp;output=nojcrpt&intgroup=U29wb3J0ZS1BbXN5cw__" width="0" height="0" style="visibility:hidden;" alt=""></noscript><!-- http://www.LiveZilla.net Tracking Code --><a href="javascript:void(window.open('http://www.antumalen.cl/helpdesk/chat.php?a=81f67&amp;intgroup=U29wb3J0ZS1BbXN5cw__&amp;epc=I2ZmODAwMA__','','width=590,height=760,left=0,top=0,resizable=yes,menubar=no,location=no,status=yes,scrollbars=yes'))" class="lz_cbl"><img src="http://www.antumalen.cl/helpdesk/image.php?a=084d7&amp;id=3&amp;type=inlay" width="112" height="32" style="border:0px;" alt="LiveZilla Live Chat Software"></a><!-- http://www.LiveZilla.net Chat Button Link Code --><div style="margin-top:2px;"><a href="http://www.livezilla.net" target="_blank" title="LiveZilla  Live Support Software" style="font-size:11px;color:#b7b7b7;text-decoration:none;font-family:verdana,arial,tahoma;"></a></div></div>
		<br>
		<?php 
		//Descomentar el boton para ver la funcionalidad de apoderados
		//echo CHtml::link('Ver Notas Apoderado',array('Apoderado/notas'),array('class'=>'btn btn-warning btn-block')); 
		?>
	</div>
</div>
