
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/edi-table.css">             
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/mindmup-editabletable.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/numeric-input-example.js"></script>


<h1><?php echo $nombre_curso.", ".$nombre_asignatura." ".$periodo ?></h1>

<div class="alert alert-error hide">
			That would cost too much
		</div>

<table id="mainTable" class="table table-hover">
    <thead>
    	<tr>
    		<?php  for ($i=0; $i <= $notas_p ; $i++) { 
    			if( $i == 0 ) { ?>
        			<th>Alumno/Notas</th>
        		<?php }else { ?>	
        			<th><?php echo $i; ?></th>
    		<?php }} ?>
    	</tr>
    </thead>

    <tbody>
	    <?php  foreach ($alumnos as $key => $alum) { ?>
			<tr>
				<td data-editable= 'false'><?php echo $alum['nombre']; ?></td>	

				<?php $not = $notas[$key]->notas;  ?>
				<?php  for ($i=1; $i <= $notas_p ; $i++) { ?>	

						<td>
							<?php
								if(empty($not[$i])) {
									echo "0";
								} else{
									echo $not[$i] ;
								}?>
						</td>

				<?php } ?>	
			</tr>

		<?php } ?>
		   
    </tbody>

		<tfoot><tr><th><strong>TOTAL</strong></th><th></th><th></th><th></th></tr></tfoot>

</table>

<script>
  $('#mainTable').editableTableWidget().numericInputExample().find('td:first').focus();
  $('#textAreaEditor').editableTableWidget({editor: $('<textarea>')});
  window.prettyPrint && prettyPrint();
</script>

