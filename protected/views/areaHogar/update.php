<?php
/* @var $this AreaHogarController */
/* @var $model AreaHogar */

$this->breadcrumbs=array(
	'Area Hogars'=>array('index'),
	$model->ah_id=>array('view','id'=>$model->ah_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List AreaHogar', 'url'=>array('index')),
	array('label'=>'Create AreaHogar', 'url'=>array('create')),
	array('label'=>'View AreaHogar', 'url'=>array('view', 'id'=>$model->ah_id)),
	array('label'=>'Manage AreaHogar', 'url'=>array('admin')),
);
?>

<h1>Update AreaHogar <?php echo $model->ah_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>