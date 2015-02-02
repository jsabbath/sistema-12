<?php
/* @var $this AlumnoController */
/* @var $model Alumno */

$this->breadcrumbs=array(
	'Alumnos'=>array('index'),
	$model->alum_id,
);

$this->menu=array(
	array('label'=>'List Alumno', 'url'=>array('index')),
	array('label'=>'Create Alumno', 'url'=>array('create')),
	array('label'=>'Update Alumno', 'url'=>array('update', 'id'=>$model->alum_id)),
	array('label'=>'Delete Alumno', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->alum_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Alumno', 'url'=>array('admin')),
);
?>

<h1>View Alumno #<?php echo $model->alum_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'alum_id',
		'alum_rut',
		'alum_nombres',
		'alum_apepat',
		'alum_apemat',
		'alum_f_nac',
		'alum_direccion',
		'alum_region',
		'alum_ciudad',
		'alum_comuna',
		'alum_genero',
		'alum_salud',
		'alum_obs',
		'alum_estado',
	),
)); ?>
