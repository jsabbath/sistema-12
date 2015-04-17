<?php
/* @var $this CursoController */
/* @var $model Curso */
/*
$this->breadcrumbs=array(
	'Cursos'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Curso', 'url'=>array('index')),
	array('label'=>'Create Curso', 'url'=>array('create')),
);
*/

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#curso-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");

?>

<div class="row">
	<div class="span12 text-center">
		<h2>Lista de cursos</h2>
	</div>
	<dov class="span12 text-center">
		<p class="text-info">Lista de todos los cursos del colegio</p>
	</dov>
</div>


<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'curso-grid',
	'dataProvider'=>$model->buscar($this->actionAnoactual()),
	'filter'=>$model,
	'columns'=>array(
		//'cur_id',
		//'cur_ano',
		//'cur_nivel',
		array(
			'name'=>'cur_nivel',
			'value'=>'$data->curNivel->par_descripcion',
			'filter'=>$nivel,
		),
		//'cur_letra',
		array(
			'name'=>'cur_letra',
			'value'=>'$data->curLetra->par_descripcion',
			'filter'=>$letra,
		),
		array(
			'name'=>'cur_jornada',
			'value'=>'$data->curJornada->par_descripcion',
			'filter'=>$jorn,
		),
		array(
			'name'=>'cur_pjefe',
			'value'=>'$data->curPjefe->getNombreCorto()',	
		),
		'cur_notas_periodo',
		//'cur_jornada',
		/*
		'cur_pjefe',
		'cur_tperiodo',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>