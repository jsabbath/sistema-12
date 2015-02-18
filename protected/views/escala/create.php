<?php
/* @var $this EscalaController */
/* @var $model Escala */
?>

<?php
$this->breadcrumbs=array(
	'Escalas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Escala', 'url'=>array('index')),
	array('label'=>'Manage Escala', 'url'=>array('admin')),
);
?>

<h1>Create Escala</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>