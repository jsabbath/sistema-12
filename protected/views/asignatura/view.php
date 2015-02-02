<?php
/* @var $this AsignaturaController */
/* @var $model Asignatura */

$this->breadcrumbs=array(
	'Asignaturas'=>array('index'),
	$model->asi_id,
);

$this->menu=array(
	array('label'=>'List Asignatura', 'url'=>array('index')),
	array('label'=>'Create Asignatura', 'url'=>array('create')),
	array('label'=>'Update Asignatura', 'url'=>array('update', 'id'=>$model->asi_id)),
	array('label'=>'Delete Asignatura', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->asi_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Asignatura', 'url'=>array('admin')),
);
?>

<h1>View Asignatura #<?php echo $model->asi_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'asi_id',
		'asi_descripcion',
		'asi_codigo',
		'asi_nombrecorto',
	),
)); ?>
