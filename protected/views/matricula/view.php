<?php
/* @var $this MatriculaController */
/* @var $model Matricula */
/* @var $nota1 Notas */
/* @var $nota2 Notas */
/* @var $curso Lista_curso */
?>

<?php
/*
$this->breadcrumbs=array(
	'Matriculas'=>array('index'),
	$model->mat_id,
);

$this->menu=array(
	array('label'=>'List Matricula', 'url'=>array('index')),
	array('label'=>'Create Matricula', 'url'=>array('create')),
	array('label'=>'Update Matricula', 'url'=>array('update', 'id'=>$model->mat_id)),
	array('label'=>'Delete Matricula', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->mat_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Matricula', 'url'=>array('admin')),
);
*/
?>

<div class="row">
	<div class="span10 offset1 text-left" style="border-bottom: 1px solid; border-color: green">
		<h3><?php echo $model->matAlu->getNombre_completo_3(); ?></h3>
	</div>
</div>
<br>

<div class="row">
	<div class="span10 offset1">
		<p class="text-info"><strong>Datos personales</strong></p>
	</div>
</div>

<div class="row">
	<div class="span10 offset1" style="border: 1px solid; border-radius: 15px 15px 15px 15px; border-color: green">
		<?php $this->widget('zii.widgets.CDetailView',array(
		    'htmlOptions' => array(
		        'class' => 'table',
		    ),
		    'data'=>$model,
		    'attributes'=>array(
		    	'matAlu.alum_f_nac',
		    	'matAlu.direccion',
				'mat_numero',
				'mat_fingreso',
				'mat_fretiro',
				'mat_fcambio',
				'matAlu.salud',
				'matAlu.obs',
			),
		)); ?>
	</div>
</div>
<br>

<div class="row">
	<div class="span10 offset1">
		<p class="text-info"><strong>Datos academicos</strong></p>
	</div>
</div>

<div class="row">
	<div class="span10 offset1" style="border: 1px solid; border-radius: 15px 15px 15px 15px; border-color: green">
		<?php $this->widget('zii.widgets.CDetailView',array(
		    'htmlOptions' => array(
		        'class' => 'table',
		    ),
		    'data'=>$curso,
		    'attributes'=>array(
		    	array(
		    		'name'=>'Curso',
		    		'value'=>$curso->listCurso->getCurso(),
		    	),
		    	array(
		    		'name'=>'Profesor Jefe',
		    		'value'=>$curso->listCurso->curPjefe->getNombreCorto(),
		    	),
		    	array(
		    		'name'=>'Jornada',
		    		'value'=>$curso->listCurso->curJornada->par_descripcion,
		    	),
			),
		)); ?>
	</div>
</div>
<br>

<div class="row">
	<div class="span10 offset1">
		<div class="tabbable"> <!-- Only required for left/right tabs -->
		  	<ul class="nav nav-tabs">
		    	<li class="active"><a href="#tab1" data-toggle="tab">Periodo 1</a></li>
		    	<li><a href="#tab2" data-toggle="tab">Periodo 2</a></li>
		  	</ul>
		  	<div class="tab-content">
		    	<div class="tab-pane active" id="tab1">
		      		<table width="100%" class="table table-bordered table-hover">
						<thead>
							<tr>
								<th width="35%">Asignatura</th>
								<th width="5%">N1</th>
								<th width="5%">N2</th>
								<th width="5%">N3</th>
								<th width="5%">N4</th>
								<th width="5%">N5</th>
								<th width="5%">N6</th>
								<th width="5%">N7</th>
								<th width="5%">N8</th>
								<th width="5%">N9</th>
								<th width="5%">N10</th>
								<th width="5%">N11</th>
								<th width="5%">N12</th>
								<th width="5%">P1</th>
							</tr>
						</thead>
						<tbody>
							<?php
								foreach ($notas1 as $nota) {
							?>
							<tr>
								<td><?php echo $nota->notAsig->asi_descripcion; ?></td>
								<td><?php echo $nota->not_01; ?></td>
								<td><?php echo $nota->not_02; ?></td>
								<td><?php echo $nota->not_03; ?></td>
								<td><?php echo $nota->not_04; ?></td>
								<td><?php echo $nota->not_05; ?></td>
								<td><?php echo $nota->not_06; ?></td>
								<td><?php echo $nota->not_07; ?></td>
								<td><?php echo $nota->not_08; ?></td>
								<td><?php echo $nota->not_09; ?></td>
								<td><?php echo $nota->not_10; ?></td>
								<td><?php echo $nota->not_11; ?></td>
								<td><?php echo $nota->not_12; ?></td>
								<td><?php echo $nota->not_prom; ?></td>
							</tr>
							<?php
								}	
							?>
						</tbody>
					</table>
		    	</div>
		    	<div class="tab-pane" id="tab2">
		      		<table width="100%" class="table table-bordered table-hover">
						<thead>
							<tr>
								<th width="35%">Asignatura</th>
								<th width="5%">N1</th>
								<th width="5%">N2</th>
								<th width="5%">N3</th>
								<th width="5%">N4</th>
								<th width="5%">N5</th>
								<th width="5%">N6</th>
								<th width="5%">N7</th>
								<th width="5%">N8</th>
								<th width="5%">N9</th>
								<th width="5%">N10</th>
								<th width="5%">N11</th>
								<th width="5%">N12</th>
								<th width="5%">P2</th>
							</tr>
						</thead>
						<tbody>
							<?php
								foreach ($notas2 as $nota) {
							?>
							<tr>
								<td><?php echo $nota->notAsig->asi_descripcion; ?></td>
								<td><?php echo $nota->not_01; ?></td>
								<td><?php echo $nota->not_02; ?></td>
								<td><?php echo $nota->not_03; ?></td>
								<td><?php echo $nota->not_04; ?></td>
								<td><?php echo $nota->not_05; ?></td>
								<td><?php echo $nota->not_06; ?></td>
								<td><?php echo $nota->not_07; ?></td>
								<td><?php echo $nota->not_08; ?></td>
								<td><?php echo $nota->not_09; ?></td>
								<td><?php echo $nota->not_10; ?></td>
								<td><?php echo $nota->not_11; ?></td>
								<td><?php echo $nota->not_12; ?></td>
								<td><?php echo $nota->not_prom; ?></td>
							</tr>
							<?php
								}	
							?>
						</tbody>
					</table>
		    	</div>
		  	</div>
		</div>
	</div>
</div>