<?php
/* @var $this InformeDesarrolloController */
/* @var $model InformeDesarrollo */

$this->breadcrumbs=array(
	'Informe Desarrollos'=>array('index'),
	$model->id_id,
);

$this->menu=array(
	array('label'=>'List InformeDesarrollo', 'url'=>array('index')),
	array('label'=>'Create InformeDesarrollo', 'url'=>array('create')),
	array('label'=>'Update InformeDesarrollo', 'url'=>array('update', 'id'=>$model->id_id)),
	array('label'=>'Delete InformeDesarrollo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage InformeDesarrollo', 'url'=>array('admin')),
);
?>

<h1>View InformeDesarrollo #<?php echo $model->id_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_id',
		'id_descripcion',
	),
)); ?>
