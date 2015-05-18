<?php
/* @var $this AreaHogarController */
/* @var $model AreaHogar */

$this->breadcrumbs=array(
	'Area Hogars'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AreaHogar', 'url'=>array('index')),
	array('label'=>'Manage AreaHogar', 'url'=>array('admin')),
);
?>

<h1>Create AreaHogar</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>