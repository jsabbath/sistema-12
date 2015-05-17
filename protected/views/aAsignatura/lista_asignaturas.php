
<div class="row">
	<div class="span6">
		<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>Asignaturas <?php echo $model[0]->aaCurso->getCurso(); ?></th>
					<th>Profesor</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($model as $key){ ?>
				<tr>
					<td><?php echo $key->aaAsignatura->asi_descripcion; ?></td>
					<td><?php echo $key->aaDocente->getNombreCorto(); ?></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>