<?php
/* @var $this PromedioAnualController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Promedio Anuals',
);

$this->menu=array(
	array('label'=>'Create PromedioAnual','url'=>array('create')),
	array('label'=>'Manage PromedioAnual','url'=>array('admin')),
);
?>

<h1>Promedio Anuals</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>