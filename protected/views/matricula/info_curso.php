
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
	</tbody>
</table>
