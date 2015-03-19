


<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/edi-table.css">             
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/mindmup-editabletable.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/numeric-input-example.js"></script>



<!-- boton  de carga  -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/modernizr.custom.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/classie.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/progressButton.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/component.css">





<h1><?php echo $nombre_curso.", ".$nombre_asignatura." ".$periodo ?></h1>


<div><!-- TABLA  -->
	<div class="alert alert-error hide">
				That would cost too much
			</div>

	<table id="notasTable" class="table table-hover">
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

					<td data-editable= 'false'><?php echo $alum['nombre']; ?></td>	

					<?php $not = $notas[$key]->notas;  ?>
					<?php  for ($i=1; $i <= $notas_p ; $i++) { ?>	
							<td><?php
									if(empty($not[$i])) {
										echo 1;
									} else{
										echo "".$not[$i] ;
									}?></td>
					<?php } ?>	
					<td data-editable= 'false'> </td>
			</tr>
			<?php } ?>
			   
	    </tbody>


	</table>


</div>



<!-- BOTON DE CARGA -->
<button id="bottonop" class="progress-button" data-style="shrink" data-horizontal>Subir Notas</button>



<script>
  $('#textAreaEditor').editableTableWidget({editor: $('<textarea>')});

  $('#notasTable').editableTableWidget().numericInputExample().find('td:first');
</script>

<script>
	[].slice.call( document.querySelectorAll( 'button.progress-button' ) ).forEach( function( bttn ) {
	new ProgressButton( bttn, {
	  callback : function( instance ) {
	    var progress = 0,
	      interval = setInterval( function() {
	      	//  AKA HAY  QUE CAMBIAR SI SE QUIERE CARGAR LEGAL
	        progress = Math.min( progress + Math.random() * 0.1, 1 );
	        instance._setProgress( progress );

	        if( progress === 1 ) {
	          instance._stop(1);
	          clearInterval( interval );
	        }
	      }, 200 );
	  }
	} );
	} );
</script>

