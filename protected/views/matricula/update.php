<?php
/* @var $this MatriculaController */
/* @var $model Matricula */
?>

<?php
/*
$this->breadcrumbs=array(
	'Matriculas'=>array('index'),
	$model->mat_id=>array('view','id'=>$model->mat_id),
	'Update',
);
*/
?>

<h1>Update Matricula <?php echo $model->mat_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model,'alumno'=>$alumno,'region'=>$region,'genero'=>$genero)); ?>