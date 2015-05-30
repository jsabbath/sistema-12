<?php
/* @var $this AsignaturaController */
/* @var $model Asignatura */
/*
$this->breadcrumbs=array(
	'Asignaturas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Asignatura', 'url'=>array('index')),
	array('label'=>'Manage Asignatura', 'url'=>array('admin')),
);
*/
?>

<div class="row">
	<div class="span12 text-center">
		<h2>Nueva Asignatura</h2>	
	</div>
</div>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>