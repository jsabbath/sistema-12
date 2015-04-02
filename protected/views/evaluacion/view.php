<?php
/* @var $this EvaluacionController */
/* @var $model Evaluacion */

$this->breadcrumbs=array(
	'Evaluacions'=>array('index'),
	$model->eva_id,
);

$this->menu=array(
	array('label'=>'List Evaluacion', 'url'=>array('index')),
	array('label'=>'Create Evaluacion', 'url'=>array('create')),
	array('label'=>'Update Evaluacion', 'url'=>array('update', 'id'=>$model->eva_id)),
	array('label'=>'Delete Evaluacion', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->eva_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Evaluacion', 'url'=>array('admin')),
);
?>

<h1>View Evaluacion #<?php echo $model->eva_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'eva_id',
		'eva_concepto',
		'eva_matricula',
		'eva_ano',
		'eva_nota',
	),
)); ?>
