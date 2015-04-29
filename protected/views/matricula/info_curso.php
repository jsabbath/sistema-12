
<table class="table table-bordered">
	<tbody>
		<tr>
			<td style="background-color: #eafadd"><label>Curso</label></td>
			<td><?php echo $model->getCurso(); ?></td>
		</tr>
		<tr>
			<td style="background-color: #eafadd"><label>Profesor Jefe</label></td>
			<td><?php echo $model->curPjefe->getNombrecorto(); ?></td>
		</tr>
		<tr>
			<td style="background-color: #eafadd"><label>Informe Desarrollo</label></td>
			<td><?php echo $model->curInfd->id_descripcion; ?></td>
		</tr>	
		<tr>
			<td style="background-color: #eafadd"><label>Numero de Alumnos</label></td>
			<td><?php echo $numero; ?></td>
		</tr>			
	</tbody>
</table>
