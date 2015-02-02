<?php
/* @var $this CiudadController */
/* @var $model Ciudad */

$this->breadcrumbs=array(
	'Ciudads'=>array('index'),
	$model->ciu_id=>array('view','id'=>$model->ciu_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Ciudad', 'url'=>array('index')),
	array('label'=>'Create Ciudad', 'url'=>array('create')),
	array('label'=>'View Ciudad', 'url'=>array('view', 'id'=>$model->ciu_id)),
	array('label'=>'Manage Ciudad', 'url'=>array('admin')),
);
?>

<h1>Update Ciudad <?php echo $model->ciu_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>