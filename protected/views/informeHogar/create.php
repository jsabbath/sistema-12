<?php
/* @var $this InformeHogarController */
/* @var $model InformeHogar */

$this->breadcrumbs=array(
	'Informe Hogars'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List InformeHogar', 'url'=>array('index')),
	array('label'=>'Manage InformeHogar', 'url'=>array('admin')),
);
?>

<h1>Create InformeHogar</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>