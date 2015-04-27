<?php
/* @var $this ListaCursoController */
/* @var $model ListaCurso */
?>

<?php
$this->breadcrumbs=array(
	'Lista Cursos'=>array('index'),
	$model->list_id,
);

$this->menu=array(
	array('label'=>'List ListaCurso', 'url'=>array('index')),
	array('label'=>'Create ListaCurso', 'url'=>array('create')),
	array('label'=>'Update ListaCurso', 'url'=>array('update', 'id'=>$model->list_id)),
	array('label'=>'Delete ListaCurso', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->list_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ListaCurso', 'url'=>array('admin')),
);
?>

<h1>View ListaCurso #<?php echo $model->list_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'list_id',
		'list_mat_id',
		'list_posicion',
		'list_curso_id',
	),
)); ?>