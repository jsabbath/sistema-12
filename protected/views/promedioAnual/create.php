<?php
/* @var $this PromedioAnualController */
/* @var $model PromedioAnual */
?>

<?php
$this->breadcrumbs=array(
	'Promedio Anuals'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List PromedioAnual', 'url'=>array('index')),
	array('label'=>'Manage PromedioAnual', 'url'=>array('admin')),
);
?>

<h1>Create PromedioAnual</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>