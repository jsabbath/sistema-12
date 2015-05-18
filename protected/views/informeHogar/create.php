<?php
/* @var $this InformeHogarController */
/* @var $model InformeHogar */
/*
$this->breadcrumbs=array(
	'Informe Hogars'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List InformeHogar', 'url'=>array('index')),
	array('label'=>'Manage InformeHogar', 'url'=>array('admin')),
);
*/
?>

<div class="row">
	<div class="span12 text-center">
		<h2>Crear Informe al Hogar</h2>
	</div>
</div>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>