<?php
/* @var $this EvaHogarController */
/* @var $model EvaHogar */
?>

<?php
$this->breadcrumbs=array(
	'Eva Hogars'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List EvaHogar', 'url'=>array('index')),
	array('label'=>'Manage EvaHogar', 'url'=>array('admin')),
);
?>

<h1>Create EvaHogar</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>