<?php
/* @var $this PromedioAnualController */
/* @var $model PromedioAnual */
?>

<?php
$this->breadcrumbs=array(
	'Promedio Anuals'=>array('index'),
	$model->PRO_ID,
);

$this->menu=array(
	array('label'=>'List PromedioAnual', 'url'=>array('index')),
	array('label'=>'Create PromedioAnual', 'url'=>array('create')),
	array('label'=>'Update PromedioAnual', 'url'=>array('update', 'id'=>$model->PRO_ID)),
	array('label'=>'Delete PromedioAnual', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->PRO_ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PromedioAnual', 'url'=>array('admin')),
);
?>

<h1>View PromedioAnual #<?php echo $model->PRO_ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'PRO_ID',
		'PRO_PROM_1',
		'PRO_PROM_2',
		'PRO_PROM_3',
		'PRO_NOMBRE_ASIGNATURA',
	),
)); ?>