<?php
/* @var $this AAsignaturaController */
/* @var $model AAsignatura */

$this->breadcrumbs=array(
	'Aasignaturas'=>array('index'),
	$model->aa_id,
);

$this->menu=array(
	array('label'=>'List AAsignatura', 'url'=>array('index')),
	array('label'=>'Create AAsignatura', 'url'=>array('create')),
	array('label'=>'Update AAsignatura', 'url'=>array('update', 'id'=>$model->aa_id)),
	array('label'=>'Delete AAsignatura', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->aa_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AAsignatura', 'url'=>array('admin')),
);
?>

<h1>View AAsignatura #<?php echo $model->aa_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'aa_id',
		'aa_curso',
		'aa_asignatura',
		'aa_docente',
	),
)); ?>
