<?php
/* @var $this NotasController */
/* @var $model Notas */

$this->breadcrumbs=array(
	'Notases'=>array('index'),
	$model->not_id,
);

$this->menu=array(
	array('label'=>'List Notas', 'url'=>array('index')),
	array('label'=>'Create Notas', 'url'=>array('create')),
	array('label'=>'Update Notas', 'url'=>array('update', 'id'=>$model->not_id)),
	array('label'=>'Delete Notas', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->not_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Notas', 'url'=>array('admin')),
);
?>

<h1>View Notas #<?php echo $model->not_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'not_id',
		'not_aa',
		'not_01',
		'not_02',
		'not_03',
		'not_04',
		'not_05',
		'not_06',
		'not_07',
		'not_08',
		'not_09',
		'not_10',
		'not_11',
		'not_12',
		'not_13',
		'not_14',
		'not_15',
		'not_16',
		'not_17',
		'not_18',
		'not_19',
		'not_20',
		'not_21',
		'not_22',
		'not_23',
		'not_24',
		'not_25',
		'not_26',
		'not_27',
		'not_28',
		'not_29',
		'not_30',
	),
)); ?>
