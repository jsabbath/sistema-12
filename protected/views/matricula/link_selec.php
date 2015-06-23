
<div class="row">
	<div class="span12">

		<div class="row">
			<div class="span12 text-center">
				<h2>Asignacion  de curso</h2>
			</div>
			<div class="span12 text-center">
				<p class="text-info">Seleccione el Tipo de <strong>Curso</strong> al cual desea asignar el <strong>alumno</strong></p>
			</div>
		</div>
		<div class="span11 text-center">
	           <button id="pre" class="btn btn-primary">Pre Curso</button>
	             <button id="curso" class="btn btn-success">Curso</button>
	        </div>

		<div class="row">
			<div class="span12 text-center" id="lista_curso">
				<br>
				
			</div>
		
			
        </div>
		
	</div>
</div>

</div><!-- form -->

<script type="text/javascript">

	$('#curso').on('click',function(){
		$.ajax({
			url: '<?php echo CController::createUrl('matricula/cur_link'); ?>',
			type: 'POST',
			data: { id: <?php echo $id_mat; ?> },
		})
		.done(function(response) {
			$('#lista_curso').html(response);
		});
		
	});

	$('#pre').on('click',function(){
		$.ajax({
			url: '<?php echo CController::createUrl('matricula/pre_link'); ?>',
			type: 'POST',
			data: { id: <?php echo $id_mat; ?> },
		})
		.done(function(response) {
			$('#lista_curso').html(response);
		});
		
	});
	

</script>
