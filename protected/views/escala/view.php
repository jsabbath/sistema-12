<?php
/* @var $this EscalaController */
/* @var $model Escala */
?>

<?php
$this->breadcrumbs=array(
	'Escalas'=>array('index'),
	$model->esc_id,
);

$this->menu=array(
	array('label'=>'List Escala', 'url'=>array('index')),
	array('label'=>'Create Escala', 'url'=>array('create')),
	array('label'=>'Update Escala', 'url'=>array('update', 'id'=>$model->esc_id)),
	array('label'=>'Delete Escala', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->esc_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Escala', 'url'=>array('admin')),
);
?>

<h1>View Escala #<?php echo $model->esc_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'esc_id',
		'esc_descripcion',
		'esc_concepto',
	),
)); ?>