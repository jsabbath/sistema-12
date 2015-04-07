<?php
/* @var $this MatriculaController */
/* @var $model Matricula */
/*
$this->breadcrumbs=array(
	'Matriculas'=>array('index'),
	'Create',
);
$this->menu=array(
	array('label'=>'List Matricula', 'url'=>array('index')),
	array('label'=>'Manage Matricula', 'url'=>array('admin')),
);
*/
?>
<div class="row">
	<div class="span12 text-center">
		<h2>Nueva Matricula</h2>
	</div>
</div>
<?php $this->renderPartial('_form', array(
	'model'=>$model,
	'alumno'=>$alumno,
	'region'=>$region,
	'genero'=>$genero,
	)); ?>