<?php
/* @var $this AlumnoController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Alumnos',
);

$this->menu=array(
	array('label'=>'Create Alumno','url'=>array('create')),
	array('label'=>'Manage Alumno','url'=>array('admin')),
);
?>

<h1>Alumnos</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>