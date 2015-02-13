<?php
/* @var $this MatriculaController */
/* @var $model Matricula */

$this->breadcrumbs=array(
	'Matriculas'=>array('index'),
	$model->mat_id=>array('view','id'=>$model->mat_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Matricula', 'url'=>array('index')),
	array('label'=>'Create Matricula', 'url'=>array('create')),
	array('label'=>'View Matricula', 'url'=>array('view', 'id'=>$model->mat_id)),
	array('label'=>'Manage Matricula', 'url'=>array('admin')),
);
?>

<h1>Update Matricula <?php echo $model->mat_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model,'alumno'=>$alumno,
	'region'=>$region)); ?>