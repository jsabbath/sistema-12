<?php
/* @var $this ListaCursoController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Lista Cursos',
);

$this->menu=array(
	array('label'=>'Create ListaCurso','url'=>array('create')),
	array('label'=>'Manage ListaCurso','url'=>array('admin')),
);
?>

<h1>Lista Cursos</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>