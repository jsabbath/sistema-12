<?php
/* @var $this InfHogarController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Inf Hogars',
);

$this->menu=array(
	array('label'=>'Create InfHogar', 'url'=>array('create')),
	array('label'=>'Manage InfHogar', 'url'=>array('admin')),
);
?>

<h1>Inf Hogars</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
