<?php
/* @var $this ParametroController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Parametros',
);

$this->menu=array(
	array('label'=>'Create Parametro','url'=>array('create')),
	array('label'=>'Manage Parametro','url'=>array('admin')),
);
?>

<h1>Parametros</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>