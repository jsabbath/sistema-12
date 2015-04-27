<?php
/* @var $this ListaCursoController */
/* @var $model ListaCurso */
?>

<?php
$this->breadcrumbs=array(
	'Lista Cursos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ListaCurso', 'url'=>array('index')),
	array('label'=>'Manage ListaCurso', 'url'=>array('admin')),
);
?>

<h1>Create ListaCurso</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>