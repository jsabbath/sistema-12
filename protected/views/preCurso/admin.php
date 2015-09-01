<?php
/* @var $this PreCursoController */
/* @var $model PreCurso */
/*
$this->breadcrumbs=array(
	'Pre Cursos'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List PreCurso', 'url'=>array('index')),
	array('label'=>'Create PreCurso', 'url'=>array('create')),
);
*/
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#pre-curso-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="row">
	<div class="span12 text-center">
		<h2>Administrar Pre-Cursos</h2>
	</div>
</div>

<div class="row">
	<div class="span12 text-center">
		<p class="text-info">Aqui se pueden administrar los <strong>Pre-Cursos</strong></p>
	</div>
</div>

<div class="row">
	<div class="span12 text-right">
		<?php echo CHtml::link('Crear Pre-Curso',array('PreCurso/create'),array('class'=>'btn btn-success')); ?>
		<?php echo CHtml::link('Cursos',array('Curso/lista_cursos'),array('class'=>'btn btn-warning')); ?>
	</div>
</div>
<br>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'pre-curso-grid',
	'type' => TbHtml::GRID_TYPE_BORDERED,
	'dataProvider'=>$model->buscar($this->actionAnoactual()),
	'filter'=>$model,
	'columns'=>array(
		//'pre_id',
		'pre_ano',
		array(
			'name'=>'pre_nivel',
			'value'=>'$data->preNivel->par_descripcion',
		),
		array(
			'name'=>'pre_letra',
			'value'=>'$data->preLetra->par_descripcion',
		),
		array(
			'name'=>'pre_jornada',
			'value'=>'$data->preJornada->par_descripcion',
		),
		array(
			'name'=>'pre_pjefe',
			'value'=>'$data->prePjefe->getNombreCorto()',
		),
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
