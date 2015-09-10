
<div class="row">
	<div class="span12 text-center">
		<h3>Asignaturas de <?php echo $usuario->getNombreCorto(); ?></h3>
	</div>
</div>

<?php //var_dump($asignaturas); ?>

<div class="row">
	<div class="span12">
		<table class="table table-bordered">
		  	<thead>
		    	<tr>
		      		<th class="text-center">Asignatura</th>
		      		<th class="text-center">Curso</th>
		    	</tr>
		  	</thead>
		  	<tbody>
		  		<?php foreach ($asignaturas as $asignatura) { ?>
		    	<tr>
		    		<td><?php echo CHtml::link($asignatura->aaAsignatura->asi_descripcion, array('Notas/asignatura','a'=>$asignatura->aa_asignatura,'c'=>$asignatura->aa_curso),array('class'=>'btn btn-block')); ?></td>
		      		<td><div class="text-center"><?php echo $asignatura->aaCurso->getCurso(); ?></div></td>
		    	</tr>
		    	<?php } ?>
		  	</tbody>
		</table>
	</div>
</div>