<?php
/* @var $this ConceptoController */
/* @var $model Concepto */

$this->breadcrumbs=array(
	'Conceptos'=>array('index'),
	$model->con_id,
);

$this->menu=array(
	array('label'=>'List Concepto', 'url'=>array('index')),
	array('label'=>'Create Concepto', 'url'=>array('create')),
	array('label'=>'Update Concepto', 'url'=>array('update', 'id'=>$model->con_id)),
	array('label'=>'Delete Concepto', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->con_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Concepto', 'url'=>array('admin')),
);
?>

<h1>View Concepto #<?php echo $model->con_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'con_id',
		'con_descripcion',
		'con_area',
	),
)); ?>
