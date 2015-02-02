<?php
/* @var $this AAsignaturaController */
/* @var $model AAsignatura */

$this->breadcrumbs=array(
	'Aasignaturas'=>array('index'),
	$model->aa_id=>array('view','id'=>$model->aa_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List AAsignatura', 'url'=>array('index')),
	array('label'=>'Create AAsignatura', 'url'=>array('create')),
	array('label'=>'View AAsignatura', 'url'=>array('view', 'id'=>$model->aa_id)),
	array('label'=>'Manage AAsignatura', 'url'=>array('admin')),
);
?>

<h1>Update AAsignatura <?php echo $model->aa_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>