<?php
/* @var $this PreCursoController */
/* @var $model PreCurso */
/*
$this->breadcrumbs=array(
	'Pre Cursos'=>array('index'),
	$model->pre_id=>array('view','id'=>$model->pre_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List PreCurso', 'url'=>array('index')),
	array('label'=>'Create PreCurso', 'url'=>array('create')),
	array('label'=>'View PreCurso', 'url'=>array('view', 'id'=>$model->pre_id)),
	array('label'=>'Manage PreCurso', 'url'=>array('admin')),
);
*/
?>

<div class="row">
	<div class="span12 text-center">
		<h2>Actualizar <?php echo $model->preNivel->par_descripcion." ".$model->preLetra->par_descripcion; ?></h2>
	</div>
</div>

<?php $this->renderPartial('_form', array(
	'model'=>$model,
	'ano'=>$ano,
	'nivel'=>$nivel,
	'letra'=>$letra,
	'informe'=>$informe,
	'jornada'=>$jornada,
	'nom_p' => $nom_p,
	'ape_p'	=> $ape_p,
	)); ?>