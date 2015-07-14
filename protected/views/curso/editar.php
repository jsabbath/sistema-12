
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/edi-table.css">             
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/mindmup-editabletable.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/numeric-input-example.js"></script>

<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/sweet-alert.css">
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/sweet-alert.min.js"></script>




<div class="row">

<div class="span12">

<div class="row">
	<div class="span7 text-center">
		<h1><?php echo $nombre_curso.": ".$nombre_asignatura.", ".$periodo ?></h1>
	</div>

<?php 
	$tp = $t_peri + 1;
	$tb = $t_peri -1;
 ?>
	<!-- Navegacion Periodos -->
	<div class="span5">
		<table style="margin-bottom: 0.1em">
			<!-- <td class="text-center">

				<a id="ax" class="link-negro" href="<?php echo Yii::app()->createUrl('site/index'); ?>" title="Editar">
		              <div><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/iconos/schedule.png"></div>
		        </a>
		        <strong>editar</strong>
			</td> -->
			<td>
				<!-- BOTON DE CARGA -->
				<div class="text-center">
					<button id="bt_subir_notas" class="btn btn-primary" style="display:none">
								<div id="btext">Subir Notas</div>
								<div id="loader" >SUBIENDO...</div>
					</button>

					<button id="unlock" class="btn btn-success"><i id="lock_icon" class="icon-lock"></i> Editar</button>
				</div>
			</td>

			<?php if( $t_peri > 1 ){ ?>
				<td class="text-center">
					<a id="ax" class="link-negro" href="<?php echo Yii::app()->createUrl('curso/poner_notas',array('a' => $asi_id, 'b' => $tb, 'c' => $cur_id )); ?>" title="Periodo Anterior">
			              <div><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/iconos/left.png"></div>
			        </a>
			        <strong>Periodo Anterior</strong>
				</td>
			<?php } ?>

			<?php if( $t_peri < $max_per ) {?>
			<td class="text-center">
				<a id="ax" class="link-negro" href="<?php echo Yii::app()->createUrl('curso/poner_notas',array('a' => $asi_id, 'b' => $tp, 'c' => $cur_id )); ?>" title="Siguiente Periodo">
		              <div><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/iconos/right.png"></div>
		        </a>
		         <strong>Siguiente Periodo</strong>
		    </td>
		    <?php } ?>
        </table>
	</div>
</div>

<div class="row">
	<div class="span12 text-center">
		<p class="text-info"> Ingrese notas <strong>SIN PUNTOS,</strong> nota minima <strong>2.0,</strong> nota maxima <strong>7.0</strong></p>
	</div>
</div>	


	<div><!-- TABLA  -->

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
			    <?php  
			    $count_final = 0;
			    	foreach ($alumnos as $key => $alum) { 
			    			
			    ?><tr>
						<td id="notas_id" style="display:none;"><?php echo $alum['not_id'];  ?></td>
						<td data-editable= 'false' <?php if( $alum['retirado'] ){ ?> style="color: red;" <?php } ?>  > <?php echo strtoupper($alum['nombre']); ?></td>	

						<?php $nota_alu = $alum['notas']; ?> <!--  ['notas'] = array de las 30 notas -->
						<?php  for ($i=1; $i <= $notas_p ; $i++) { ?>	
								<td class="nota"  tabindex="1"><?php
										if(empty($nota_alu[$i])) {
											//echo 1;
										} else if ( $nota_alu[$i] != 0 ){
											$count_final++;
											if ( strlen($nota_alu[$i]) == 1 ){
												echo  ''.$nota_alu[$i] . '.0';
											} else {
												echo "".$nota_alu[$i];
											}
										} 
										if( $nota_alu[$i] == 0 ){

										}
										?></td>
						<?php } ?>	
						<td data-editable= 'false' class="nota" style="background-color: #EEEEEE"></td>

				</tr>
				<?php } ?>
				<tr  style="background-color: #EEEEEE;">
					<td colspan="<?php echo $notas_p+1; ?>" style="text-align: center;"><strong>PROMEDIO ASIGNATURA</strong></td>
					<td data-editable="false" id="prom_final" style="background-color: #ABB7B7"></td>
				</tr>   
		    </tbody>
		</table>
	</div>




</div>


</div>





<script>
   // var prom_final = document.getElementById("prom_final");
	$('#notasTable').numericInputExample().find('td:first').next().next().focus();

	// dar permisos
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
                url: '<?php echo $this->createUrl('notas/validar_edicion'); ?>',
                type: 'POST',
                dataType: "JSON",
                data: { pass: inputValue, id_asi: <?php echo $asi_id; ?>, cur: <?php echo $cur_id; ?> },
                success: function(response) {
                	if(!response){
                		swal.showInputError("Ingrese datos nuevamente");     
						return false;   
                	}
                	if( response == 2 ){
                		swal.showInputError("usted no  tiene permisos para editar notas de este curso");
                		return false;
                	} 
                	swal({   
                		title: "Correcto!",     
                		timer: 600,
                		type: "success",   
                		showConfirmButton: false 
                	});

					$('#bt_subir_notas').show();
					$('#lock_icon').addClass("icon-ok").removeClass("icon-lock");
					$('#notasTable').editableTableWidget();
					$('#notasTable').numericInputExample().find('td:first').next().next().focus();
					$('#unlock').prop("disabled",true);
					window.onbeforeunload = function() {
				        return "";
				    }
                }               
            })	
		});
	});

 
// subir las asistencias ajax
	$("#bt_subir_notas").on('click',function(){
		var tabla = document.getElementById('notasTable');
		var rowLength = tabla.rows.length-1;
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
			success: function(data){
				location.reload();
				window.onbeforeunload = function() {
				       
				    }
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


	$('.nota').each(function(i, n) {
   		if($(n).text() < 4) $(n).css('color', 'red');
   		parseFloat($(n).text()).toFixed(2);
   		
	});

	$('#notasTable').on('change',function(){

		$('.nota').each(function(i, n) {
	   		if($(n).text() < 4) $(n).css('color', 'red');
	   		if($(n).text() >= 4) $(n).css('color', 'black');

		});

	})


</script>
