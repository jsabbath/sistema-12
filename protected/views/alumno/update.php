<?php
/* @var $this AlumnoController */
/* @var $model Alumno */
?>

<?php
$this->breadcrumbs=array(
	'Alumnos'=>array('index'),
	$model->alum_id=>array('view','id'=>$model->alum_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Alumno', 'url'=>array('index')),
	array('label'=>'Create Alumno', 'url'=>array('create')),
	array('label'=>'View Alumno', 'url'=>array('view', 'id'=>$model->alum_id)),
	array('label'=>'Manage Alumno', 'url'=>array('admin')),
);
?>

    <h1>Update Alumno <?php echo $model->alum_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>