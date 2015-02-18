<?php
/* @var $this EscalaController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Escalas',
);

$this->menu=array(
	array('label'=>'Create Escala','url'=>array('create')),
	array('label'=>'Manage Escala','url'=>array('admin')),
);
?>

<h1>Escalas</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>