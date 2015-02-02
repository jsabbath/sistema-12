<?php
/* @var $this AsignaturaController */
/* @var $model Asignatura */

$this->breadcrumbs=array(
	'Asignaturas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Asignatura', 'url'=>array('index')),
	array('label'=>'Manage Asignatura', 'url'=>array('admin')),
);
?>

<h1>Create Asignatura</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>