
<?php if( !empty($lista) ){ ?>

<div>
	<button id="bt_subir_asistencia" class="btn btn-primary" style="display:none">
				<div id="btext">Guardar</div>
				<div id="loader" >SUBIENDO...</div>
	</button>

	<button id="unlock" class="btn btn-success">Editar <i id="lock_icon" class="icon-lock"></i></button>
</div>

<br>
	<table class="table table-hover" id="table_asi">
	  	<thead>
		    <tr>
		    <th style="display:none">id</th>
		      <th>Nombre Alumno</th>
		      
		      	<?php  if( $tperiodo == "SEMESTRE" ){  ?>
			      	<th>S1%</th>
			      	<th>S2%</th>
		      	<?php } else if( $tperiodo == "TRIMESTRE" ){ ?>
			      	<th>S1%</th>
			      	<th>S2%</th>
			      	<th>S3%</th>
		      	<?php } ?>
		      	<th>Final</th>
		    </tr>
	  	</thead>

	  	<tbody>
	      <?php  foreach ($lista as $key => $value) {  ?>
	       <tr>
	       		<td id="notas_id" style="display:none;"><?php echo $value['mat_id'];  ?></td>
	       		 <td data-editable= 'false'><?php  echo strtoupper($value['nombre']);?></td>
	       		<td tabindex="1" ><?php echo $value['asi_1'] ?></td>
	       		<td tabindex="1"><?php echo $value['asi_2'] ?></td>
	       		<?php if( $tperiodo == "TRIMESTRE" ){ ?><td tabindex="1"><?php echo $value['asi_3'];} ?></td>
	       		<td data-editable= 'false' id="final"></td>
	       	</tr>
	      <?php } ?>
	   
	  	</tbody>
	</table>






<script type="text/javascript">
	$('#table_asi').numericInputExample().find('td:first').next().next().focus();



	$('#unlock').on('click',function(){ 

		swal({      
			title: "Ingrese su Password!",   
			type: "input",
			inputType: "password",   
			showCancelButton: true,   
			closeOnConfirm: false,   
			animation: "slide-from-top" 
		},
		function(inputValue){

			$.ajax({
				url: '<?php echo CController::createUrl("curso/validar_asistencia")?>',
				type: 'POST',
				dataType: "JSON",
				data: {curso: <?php echo $id_curso; ?>, pass: inputValue},
				success: function(response){
					if(!response){
                		swal.showInputError("Ingrese datos nuevamente");     
						return false;   
                	}
                	if( response == 2 ){
                		swal.showInputError("usted no  tiene permisos para editar la asistencia de este curso");
                		return false;
                	} 

					swal({   
	            		title: "Correcto!",     
	            		timer: 600,
	            		type: "success",   
	            		showConfirmButton: false 
	            	});

	            	 window.onbeforeunload = function() {
	                            return "";
	                        }

					$('#table_asi').editableTableWidget();
					$('#table_asi').numericInputExample().find('td:first').next().next().focus();
					$('#lock_icon').addClass("icon-ok").removeClass("icon-lock");
					$('#unlock').prop("disabled",true);

					$('#bt_subir_asistencia').show();
					}
			})


		});
	});




// subir las notas ajax
	$("#bt_subir_asistencia").on('click',function(){
		var tabla = document.getElementById('table_asi');
		var rowLength = tabla.rows.length;
		var curso_asi = [];
		
		for(var i = 1; i < rowLength; i++ ){

			var alumno = [];
			var asistencia = [];
			var cells = tabla.rows.item(i).cells;
			var numero_cells = cells.length;

			for(var j = 0; j < numero_cells-1; j++){// numero_cells-1 para no contar al promedio
				if( j == 0){  // posicion 0 esta escondida y  es la id de las matriculas 
					alumno.push(cells.item(j).innerHTML); //  se guarda la id_matrula del alumno

				}else if( j > 1 ){ // posicion 1 = nombre del alumno
					asistencia.push(cells.item(j).innerHTML); // se crea un array con la asistencia del alumno 

				}		  	
           }
           
           	alumno.push(asistencia); //  se guardan la asistencia del alumno
			curso_asi.push(alumno); //  se agrega el alumno  al curso
		}
		console.log(curso_asi);
		$.ajax({
			url: '<?php echo CController::createUrl("curso/guardar_asistencia")?>',
			type: 'POST',
			data: {curso_asi: curso_asi},
			success: function(data){
				
			}
		})
	})


	// LOAD BUTTON
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

<?php 
	}else if ( $lista == null && $lista != 0 ){ 
		echo "no tiene asignaturas"; 
	} else if( $lista == 0 ){
		echo "no tiene alumnos";
	}
?>