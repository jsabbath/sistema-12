<h5>Seleccione conceptos</h5>


	<table class="table table-hover">
	<thead>
		<tr>
			<td><strong>Nombre</strong></td>
			<td><strong>Opcion</strong></td>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($concepto as $key => $value): ?>
		<tr>
			<td><?php echo $value; ?></td>
			<td><button><i class="icon-plus"></i></button></td>
		</tr>
		<?php endforeach ?>
	</tbody>
	</table>
