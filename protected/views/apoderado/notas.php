
<div class="row">
	<div class="span12 text-center">
		<h2>Notas</h2>
	</div>
</div>

<div class="row">
	<div class="span12 text-center">
		<?php echo CHtml::textField('apoderado','',array('placeholder'=>'Rut Apoderado','id'=>'apoderado')); ?>
		<?php echo CHtml::textField('alumno','',array('placeholder'=>'Rut Alumno','id'=>'alumno')); ?>
		<?php echo CHtml::button('Ver Notas',array(
			'class'=>'btn btn-primary',
			'style'=>'margin-bottom:10px',
			'ajax' => array(
	                'type' => 'POST',
	                'url' => CController::createUrl('Apoderado/vernotas'),
	                'update' => '#notas',
	                'data' => array('rut_apo'=>'js:getRutapo()','rut_alum'=>'js:getRutalum()'),
            ),
			)) ?>
	</div>
</div>

<div class="row">
	<div class="span12" id="notas">
		
	</div>
</div>
<br>

<script type="text/javascript">
	
function getRutapo(){ 
    var value= $("#apoderado").val();
    if( value != "")
        return value;
}

function getRutalum(){ 
    var value= $("#alumno").val();
    if( value != "")
        return value;
}

</script>