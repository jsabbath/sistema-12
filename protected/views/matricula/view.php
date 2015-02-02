<?php
/* @var $this MatriculaController */
/* @var $model Matricula */

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
?>

<h1>View Matricula #<?php echo $model->mat_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'mat_id',
		'mat_ano',
		'mat_cur',
		'mat_alu_id',
		'mat_fingreso',
		'mat_fretiro',
		'mat_fcambio',
		'mat_numero',
	),
)); ?>
