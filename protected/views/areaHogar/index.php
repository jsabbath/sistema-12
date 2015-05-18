<?php
/* @var $this AreaHogarController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Area Hogars',
);

$this->menu=array(
	array('label'=>'Create AreaHogar', 'url'=>array('create')),
	array('label'=>'Manage AreaHogar', 'url'=>array('admin')),
);
?>

<h1>Area Hogars</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
