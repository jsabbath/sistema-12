
<?php if( !empty($lista) ){ ?>

<table class="table table-hover" id="asistencia_table">
  <thead>
    <tr>

      <th>Nombre Alumno</th>
      
      	<?php  if( $tperiodo == "SEMESTRE" ){  ?>
	      	<th>S1</th>
	      	<th>S2</th>
      	<?php } else if( $tperiodo == "TRIMESTRE" ){ ?>
	      	<th>S1</th>
	      	<th>S2</th>
	      	<th>S3</th>
      	<?php } ?>
      	<th>Final</th>
    </tr>
  </thead>
  <tbody>
   
      <?php  foreach ($lista as $key => $value) {  ?>
       <tr>
       		<td><?php  echo $value['nombre'];?></td>
       		<td><?php echo $value['asi_1'] ?></td>
       		<td><?php echo $value['asi_2'] ?></td>
       		<?php if( $tperiodo == "TRIMESTRE" ){ ?><td><?php echo $value['asi_3'];} ?></td>
       		<td id="final"></td>
       	</tr>
      <?php } ?>
   
  </tbody>
</table>

	<button id="bt_subir_notas" class="btn btn-primary" style="display:none">
				<div id="btext">Subir Notas</div>
				<div id="loader" >SUBIENDO...</div>
	</button>

	<button id="unlock" class="btn btn-info"><i id="lock_icon" class="icon-lock"></i></button>





<script type="text/javascript">
	
		$('#unlock').on('click',function(){ 

			swal({      
				title: "Ingrese su Password!",   
				type: "input",
				inputType: "password",   
				showCancelButton: true,   
				closeOnConfirm: false,   
				animation: "slide-from-top" 
			}),
			function(inputValue){
				
			}
		});

// $('#asistencia_table').numericInputExample().find('td:first').focus();
</script>

<?php 
	}else if ( $lista == null && $lista != 0 ){ 
		echo "no tiene asignaturas"; 
	} else if( $lista == 0 ){
		echo "no tiene alumnos";
	}
?>