<?php
/* @var $this RegionController */
/* @var $model Region */

$this->breadcrumbs=array(
	'Regions'=>array('index'),
	$model->reg_id,
);

$this->menu=array(
	array('label'=>'List Region', 'url'=>array('index')),
	array('label'=>'Create Region', 'url'=>array('create')),
	array('label'=>'Update Region', 'url'=>array('update', 'id'=>$model->reg_id)),
	array('label'=>'Delete Region', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->reg_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Region', 'url'=>array('admin')),
);
?>

<h1>View Region #<?php echo $model->reg_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'reg_id',
		'reg_descripcion',
	),
)); ?>
