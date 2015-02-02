<?php
/* @var $this PermisoController */
/* @var $model Permiso */

$this->breadcrumbs=array(
	'Permisos'=>array('index'),
	$model->per_id,
);

$this->menu=array(
	array('label'=>'List Permiso', 'url'=>array('index')),
	array('label'=>'Create Permiso', 'url'=>array('create')),
	array('label'=>'Update Permiso', 'url'=>array('update', 'id'=>$model->per_id)),
	array('label'=>'Delete Permiso', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->per_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Permiso', 'url'=>array('admin')),
);
?>

<h1>View Permiso #<?php echo $model->per_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'per_id',
		'per_descripcion',
		'per_estado',
		'per_cargo',
	),
)); ?>
