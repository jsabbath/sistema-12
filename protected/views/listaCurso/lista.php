
<?php if( empty($lista) ){
	echo "no tiene alumnos";

	} else{ ?>
 <table class="table table-condensed">
  <thead>
    <tr>
    	<th></th>
      	<th>#</th>
      	<th>nombre</th>
     	<th>mat id</th>
    </tr>
  </thead>

  <tbody>
	<?php foreach ($lista as $key => $l) {  

	?>
    <tr>
    	<td> x</td>
	    <td><?php echo $l['posicion']; ?></td>
	    <td><?php echo $l['nombre']; ?></td>
    	<td><?php echo $l['mat_id']; ?></td>
    </tr>
	<?php   }  ?>
  </tbody>
</table>

<?php } ?>