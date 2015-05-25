<?php
/* @var $this InfHogarController */
/* @var $model InfHogar */
/*
$this->breadcrumbs=array(
	'Inf Hogars'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List InfHogar', 'url'=>array('index')),
	array('label'=>'Manage InfHogar', 'url'=>array('admin')),
);
*/
?>

<div class="row">
	<div class="span12 text-center">
		<h2>Crear Informe al Hogar</h2>
	</div>
</div>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>