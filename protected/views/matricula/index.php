<?php
/* @var $this MatriculaController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Matriculas',
);

$this->menu=array(
	array('label'=>'Create Matricula','url'=>array('create')),
	array('label'=>'Manage Matricula','url'=>array('admin')),
);
?>

<h1>Matriculas</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>