<?php
/* @var $this AreaHogarController */
/* @var $model AreaHogar */

$this->breadcrumbs=array(
	'Area Hogars'=>array('index'),
	$model->ah_id,
);

$this->menu=array(
	array('label'=>'List AreaHogar', 'url'=>array('index')),
	array('label'=>'Create AreaHogar', 'url'=>array('create')),
	array('label'=>'Update AreaHogar', 'url'=>array('update', 'id'=>$model->ah_id)),
	array('label'=>'Delete AreaHogar', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ah_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AreaHogar', 'url'=>array('admin')),
);
?>

<h1>View AreaHogar #<?php echo $model->ah_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ah_id',
		'ah_descripcion',
		'ah_inf_hogar',
	),
)); ?>
