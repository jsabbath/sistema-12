<?php
/* @var $this InformeHogarController */
/* @var $model InformeHogar */

$this->breadcrumbs=array(
	'Informe Hogars'=>array('index'),
	$model->ih_id,
);

$this->menu=array(
	array('label'=>'List InformeHogar', 'url'=>array('index')),
	array('label'=>'Create InformeHogar', 'url'=>array('create')),
	array('label'=>'Update InformeHogar', 'url'=>array('update', 'id'=>$model->ih_id)),
	array('label'=>'Delete InformeHogar', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ih_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage InformeHogar', 'url'=>array('admin')),
);
?>

<h1>View InformeHogar #<?php echo $model->ih_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ih_id',
		'ih_descripcion',
	),
)); ?>
