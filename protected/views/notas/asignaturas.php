
<div class="row">
	<div class="span12 text-center">
		<h3><strong>Mis Asignaturas</strong></h3>
	</div>
</div>

<?php //var_dump($asignaturas); ?>

<div class="row">
	<div class="span12">
		<table class="table table-bordered" width="100%">
		  	<thead>
		    	<tr>
		      		<th class="text-center" width="60%">Asignatura</th>
		      		<th class="text-center" width="20%">Curso</th>
		      		<th class="text-center" width="20%">Periodo</th>
		    	</tr>
		  	</thead>
		  	<tbody>
		  		<?php foreach ($asignaturas as $asignatura) { ?>
		    	<tr>
		    		<td><div class="text-center"><?php echo $asignatura->aaAsignatura->asi_descripcion; ?></div></td>
		      		<td><div class="text-center"><?php echo $asignatura->aaCurso->getCurso(); ?></div></td>
		      		<td>
		      			<div class="text-center">
		      				<?php echo CHtml::link("1", array('Notas/asignatura','a'=>$asignatura->aa_asignatura,'c'=>$asignatura->aa_curso,'p'=>1),array('class'=>'btn btn-info')); ?>
		      				<?php echo CHtml::link("2", array('Notas/asignatura','a'=>$asignatura->aa_asignatura,'c'=>$asignatura->aa_curso,'p'=>2),array('class'=>'btn btn-info')); ?>
		      			</div>
		      		</td>
		    	</tr>
		    	<?php } ?>
		  	</tbody>
		</table>
	</div>
</div>