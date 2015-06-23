<?php
/* @var $this EvaHogarController */
/* @var $model EvaHogar */
?>

<?php
$this->breadcrumbs=array(
	'Eva Hogars'=>array('index'),
	$model->eh_id=>array('view','id'=>$model->eh_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List EvaHogar', 'url'=>array('index')),
	array('label'=>'Create EvaHogar', 'url'=>array('create')),
	array('label'=>'View EvaHogar', 'url'=>array('view', 'id'=>$model->eh_id)),
	array('label'=>'Manage EvaHogar', 'url'=>array('admin')),
);
?>

    <h1>Update EvaHogar <?php echo $model->eh_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>