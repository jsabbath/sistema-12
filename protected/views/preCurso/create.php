<?php
/* @var $this PreCursoController */
/* @var $model PreCurso */
/*
$this->breadcrumbs=array(
	'Pre Cursos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List PreCurso', 'url'=>array('index')),
	array('label'=>'Manage PreCurso', 'url'=>array('admin')),
);
*/
?>

<div class="row">
	<div class="span12 text-center">
		<h2>Crear Pre-Curso</h2>
	</div>
</div>

<?php $this->renderPartial('_form', array(
	'model'=>$model,
	'informe'=> $informe,
	'ano'=>$ano,
	'nivel'=>$nivel,
	'letra'=>$letra,
	'jornada'=>$jornada,
	)); ?>