<?php
/* @var $this ComunaController */
/* @var $model Comuna */

$this->breadcrumbs=array(
	'Comunas'=>array('index'),
	$model->com_id,
);

$this->menu=array(
	array('label'=>'List Comuna', 'url'=>array('index')),
	array('label'=>'Create Comuna', 'url'=>array('create')),
	array('label'=>'Update Comuna', 'url'=>array('update', 'id'=>$model->com_id)),
	array('label'=>'Delete Comuna', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->com_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Comuna', 'url'=>array('admin')),
);
?>

<h1>View Comuna #<?php echo $model->com_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'com_id',
		'com_descripcion',
		'com_ciu',
	),
)); ?>
