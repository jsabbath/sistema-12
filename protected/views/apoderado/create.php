<?php
/* @var $this ApoderadoController */
/* @var $model Apoderado */
/*
$this->breadcrumbs=array(
	'Apoderados'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Apoderado', 'url'=>array('index')),
	array('label'=>'Manage Apoderado', 'url'=>array('admin')),
);
*/
?>

<div class="row">
	<div class="span12 text-center">
		<h2>Ingresar Apoderado</h2>
	</div>
</div>

<?php $this->renderPartial('_form', array(
	'model'=>$model,
	'ano'=>$ano,
)); ?>