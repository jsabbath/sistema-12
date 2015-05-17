<?php
/* @var $this AAsignaturaController */
/* @var $model AAsignatura */

// $this->breadcrumbs=array(
// 	'Aasignaturas'=>array('index'),
// 	'Create',
// );

$this->menu=array(
	array('label'=>'List AAsignatura', 'url'=>array('index')),
	array('label'=>'Manage AAsignatura', 'url'=>array('admin')),
);
?>

<div class="row">
	<div class="span12 text-center">
		<h2>Asignacion de Asignaturas</h2>
	</div>
</div>

<?php $this->renderPartial('_form', array('model'=>$model, 'cursos' => $cursos)); ?>