<?php
/* @var $this InformeHogarController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Informe Hogars',
);

$this->menu=array(
	array('label'=>'Create InformeHogar', 'url'=>array('create')),
	array('label'=>'Manage InformeHogar', 'url'=>array('admin')),
);
?>

<h1>Informe Hogars</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
