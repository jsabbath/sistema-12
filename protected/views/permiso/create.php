<?php
/* @var $this PermisoController */
/* @var $model Permiso */

$this->breadcrumbs=array(
	'Permisos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Permiso', 'url'=>array('index')),
	array('label'=>'Manage Permiso', 'url'=>array('admin')),
);
?>

<h1>Create Permiso</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>