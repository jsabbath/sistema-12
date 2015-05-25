<?php
/* @var $this InfHogarController */
/* @var $model InfHogar */

$this->breadcrumbs=array(
	'Inf Hogars'=>array('index'),
	$model->ih_id,
);

$this->menu=array(
	array('label'=>'List InfHogar', 'url'=>array('index')),
	array('label'=>'Create InfHogar', 'url'=>array('create')),
	array('label'=>'Update InfHogar', 'url'=>array('update', 'id'=>$model->ih_id)),
	array('label'=>'Delete InfHogar', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ih_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage InfHogar', 'url'=>array('admin')),
);
?>

<h1>View InfHogar #<?php echo $model->ih_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ih_id',
		'ih_informe',
		'ih_area',
		'ih_concepto',
	),
)); ?>
