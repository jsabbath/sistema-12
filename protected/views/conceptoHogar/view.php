<?php
/* @var $this ConceptoHogarController */
/* @var $model ConceptoHogar */

$this->breadcrumbs=array(
	'Concepto Hogars'=>array('index'),
	$model->ch_id,
);

$this->menu=array(
	array('label'=>'List ConceptoHogar', 'url'=>array('index')),
	array('label'=>'Create ConceptoHogar', 'url'=>array('create')),
	array('label'=>'Update ConceptoHogar', 'url'=>array('update', 'id'=>$model->ch_id)),
	array('label'=>'Delete ConceptoHogar', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ch_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ConceptoHogar', 'url'=>array('admin')),
);
?>

<h1>View ConceptoHogar #<?php echo $model->ch_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ch_id',
		'ch_descripcion',
		'ch_area_hogar',
	),
)); ?>
