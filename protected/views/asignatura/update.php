<?php
/* @var $this AsignaturaController */
/* @var $model Asignatura */
/*
$this->breadcrumbs=array(
	'Asignaturas'=>array('index'),
	$model->asi_id=>array('view','id'=>$model->asi_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Asignatura', 'url'=>array('index')),
	array('label'=>'Create Asignatura', 'url'=>array('create')),
	array('label'=>'View Asignatura', 'url'=>array('view', 'id'=>$model->asi_id)),
	array('label'=>'Manage Asignatura', 'url'=>array('admin')),
);
*/
?>

<div class="row">
	<div class="span12">
		<h2>Modificar <?php echo $model->asi_descripcion; ?></h2>
	</div>
</div>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>