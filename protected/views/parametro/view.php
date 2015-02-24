<?php
/* @var $this ParametroController */
/* @var $model Parametro */
?>

<?php
$this->breadcrumbs=array(
	'Parametros'=>array('index'),
	$model->par_id,
);

$this->menu=array(
	array('label'=>'List Parametro', 'url'=>array('index')),
	array('label'=>'Create Parametro', 'url'=>array('create')),
	array('label'=>'Update Parametro', 'url'=>array('update', 'id'=>$model->par_id)),
	array('label'=>'Delete Parametro', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->par_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Parametro', 'url'=>array('admin')),
);
?>

<h1>View Parametro #<?php echo $model->par_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'par_id',
		'par_item',
		'par_descripcion',
	),
)); ?>