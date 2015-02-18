<?php
/* @var $this ConceptoController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Conceptos',
);

$this->menu=array(
	array('label'=>'Create Concepto','url'=>array('create')),
	array('label'=>'Manage Concepto','url'=>array('admin')),
);
?>

<h1>Conceptos</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>