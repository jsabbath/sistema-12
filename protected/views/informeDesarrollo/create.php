<?php
/* @var $this InformeDesarrolloController */
/* @var $model InformeDesarrollo */

$this->breadcrumbs=array(
	'Informe Desarrollos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List InformeDesarrollo', 'url'=>array('index')),
	array('label'=>'Manage InformeDesarrollo', 'url'=>array('admin')),
);
?>

<h1>Create InformeDesarrollo</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>