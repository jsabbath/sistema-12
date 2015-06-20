<?php
/* @var $this EventoController */
/* @var $model Evento */

$this->breadcrumbs=array(
	'Eventos'=>array('index'),
	$model->eve_id,
);

$this->menu=array(
	array('label'=>'List Evento', 'url'=>array('index')),
	array('label'=>'Create Evento', 'url'=>array('create')),
	array('label'=>'Update Evento', 'url'=>array('update', 'id'=>$model->eve_id)),
	array('label'=>'Delete Evento', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->eve_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Evento', 'url'=>array('admin')),
);
?>

<h1>View Evento #<?php echo $model->eve_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'eve_id',
		'eve_descripcion',
		'eve_fecha',
		'eve_inicio',
		'eve_fin',
		'eve_usuario',
	),
)); ?>
