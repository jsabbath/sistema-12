<?php
/* @var $this NotasController */
/* @var $model Notas */

$this->breadcrumbs=array(
	'Notases'=>array('index'),
	$model->not_id=>array('view','id'=>$model->not_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Notas', 'url'=>array('index')),
	array('label'=>'Create Notas', 'url'=>array('create')),
	array('label'=>'View Notas', 'url'=>array('view', 'id'=>$model->not_id)),
	array('label'=>'Manage Notas', 'url'=>array('admin')),
);
?>

<h1>Update Notas <?php echo $model->not_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>