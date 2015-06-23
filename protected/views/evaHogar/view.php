<?php
/* @var $this EvaHogarController */
/* @var $model EvaHogar */
?>

<?php
$this->breadcrumbs=array(
	'Eva Hogars'=>array('index'),
	$model->eh_id,
);

$this->menu=array(
	array('label'=>'List EvaHogar', 'url'=>array('index')),
	array('label'=>'Create EvaHogar', 'url'=>array('create')),
	array('label'=>'Update EvaHogar', 'url'=>array('update', 'id'=>$model->eh_id)),
	array('label'=>'Delete EvaHogar', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->eh_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage EvaHogar', 'url'=>array('admin')),
);
?>

<h1>View EvaHogar #<?php echo $model->eh_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'eh_id',
		'eh_matricula',
		'eh_curso',
		'eh_concepto',
		'eh_eva1',
		'eh_eva2',
		'eh_eva3',
	),
)); ?>