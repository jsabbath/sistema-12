<?php
/* @var $this AAsignaturaController */
/* @var $model AAsignatura */

$this->breadcrumbs=array(
	'Aasignaturas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AAsignatura', 'url'=>array('index')),
	array('label'=>'Manage AAsignatura', 'url'=>array('admin')),
);
?>


<?php $this->renderPartial('_form', array('model'=>$model,/* 'id_curso' => $id_curso*/)); ?>