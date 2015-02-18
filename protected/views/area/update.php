<?php
/* @var $this AreaController */
/* @var $model Area */
?>

<?php
$this->breadcrumbs=array(
	'Areas'=>array('index'),
	$model->are_id=>array('view','id'=>$model->are_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Area', 'url'=>array('index')),
	array('label'=>'Create Area', 'url'=>array('create')),
	array('label'=>'View Area', 'url'=>array('view', 'id'=>$model->are_id)),
	array('label'=>'Manage Area', 'url'=>array('admin')),
);
?>

    <h1>Update Area <?php echo $model->are_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>