<?php
/* @var $this EvaluacionController */
/* @var $model Evaluacion */

$this->breadcrumbs=array(
	'Evaluacions'=>array('index'),
	$model->eva_id=>array('view','id'=>$model->eva_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Evaluacion', 'url'=>array('index')),
	array('label'=>'Create Evaluacion', 'url'=>array('create')),
	array('label'=>'View Evaluacion', 'url'=>array('view', 'id'=>$model->eva_id)),
	array('label'=>'Manage Evaluacion', 'url'=>array('admin')),
);
?>

<h1>Update Evaluacion <?php echo $model->eva_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>