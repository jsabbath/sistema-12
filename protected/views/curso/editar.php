
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/edi-table.css">             
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/mindmup-editabletable.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/numeric-input-example.js"></script>




<div class="row">

<h1><?php echo $nombre_curso.", ".$nombre_asignatura." ".$periodo ?></h1>


	<div><!-- TABLA  -->
		<div class="alert alert-error hide">
					That would cost too much
		</div>

		<table id="notasTable" class="table table-bordered">
		    <thead>

		    	<tr>

		    		<?php  for ($i=0; $i <= $notas_p ; $i++) { 
		    			if( $i == 0 ) { ?>
		        			<th>Alumno/Notas</th>
		        		<?php }else { ?>	
		        			<th><?php echo "N".$i; ?></th>
		    		<?php }} ?>

		    		<th>Prom</th>
		    	</tr>
		    </thead>

		    <tbody>
			    <?php  foreach ($alumnos as $key => $alum) { ?><tr>
						<td id="notas_id" style="display:none;"><?php echo $alum['not_id'];  ?></td>
						<td data-editable= 'false'> <?php echo strtoupper($alum['nombre']); ?></td>	

						<?php $nota_alu = $alum['notas']; ?> <!--  ['notas'] = array de las 30 notas -->
						<?php  for ($i=1; $i <= $notas_p ; $i++) { ?>	
								<td class="nota"><?php
										if(empty($nota_alu[$i])) {
											//echo 1;
										} else if ( $nota_alu[$i] != 0 ){
											if ( $nota_alu[$i] < 4 ){
												echo  ''.$nota_alu[$i];
											} else {
												echo "".$nota_alu[$i];
											}
										} 
										if( $nota_alu[$i] == 0 ){

										}
										?></td>
						<?php } ?>	
						<td data-editable= 'false' class="nota" style="background-color: #eee"> </td>

				</tr>
				<?php } ?>
				   
		    </tbody>


		</table>
	</div>


	<!-- BOTON DE CARGA -->
	<button id="bt_subir_notas" class="btn btn-primary">
				<div id="btext">Subir Notas</div>
				<div id="loader" >SUBIENDO...</div>
	</button>


</div>





<script>
  $('#textAreaEditor').editableTableWidget({editor: $('<textarea>')});

  $('#notasTable').editableTableWidget().numericInputExample().find('td:first').next().next().focus();
</script>


 
<!-- subir las notas ajax -->
<script>
	$("#bt_subir_notas").on('click',function(){
		var tabla = document.getElementById('notasTable');
		var rowLength = tabla.rows.length;
		var curso_notas = [];
		
		for(var i = 1; i < rowLength; i++ ){

			var alumno = [];
			var notas = [];
			var cells = tabla.rows.item(i).cells;
			var numero_cells = cells.length;

			for(var j = 0; j < numero_cells-1; j++){// numero_cells-1 para no contar al promedio
				if( j == 0){  // posicion 0 esta escondida y  es la id de las notas 
					alumno.push(cells.item(j).innerHTML); //  se guarda la id_notas del alumno

				}else if( j > 1 ){ // posicion 1 = nombre del alumno
					notas.push(cells.item(j).innerHTML); // se crea un array de notas 

				}		  	
           }
           
           	alumno.push(notas); //  se guardan las notas del alumno
			curso_notas.push(alumno); //  se agrega el alumno  al curso
		}

		$.ajax({
			url: '<?php echo CController::createUrl("notas/subir_notas")?>',
			type: 'POST',
			data: {curso_notas: curso_notas},
		})
	})
</script>


<!-- LOAD BUTTON -->
<script>
	var $loading = $('#loader').hide();
	var $btext = $('#btext');
	$(document)
	  .ajaxStart(function () {
	  	$btext.hide();
	    $loading.show();
	  })
	  .ajaxStop(function () {
	    $loading.hide();
	    $btext.show();
	  });
</script>

<script>

	$('.nota').each(function(i, n) {
   		if($(n).text() < 4) $(n).css('color', 'red');
	});

	$('#notasTable').on('change',function(){

		$('.nota').each(function(i, n) {
	   		if($(n).text() < 4) $(n).css('color', 'red');
	   		if($(n).text() >= 4) $(n).css('color', 'black');
		});

	})

</script>

