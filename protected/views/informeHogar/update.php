<?php
/* @var $this InformeHogarController */
/* @var $model InformeHogar */

$this->breadcrumbs=array(
	'Informe Hogars'=>array('index'),
	$model->ih_id=>array('view','id'=>$model->ih_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List InformeHogar', 'url'=>array('index')),
	array('label'=>'Create InformeHogar', 'url'=>array('create')),
	array('label'=>'View InformeHogar', 'url'=>array('view', 'id'=>$model->ih_id)),
	array('label'=>'Manage InformeHogar', 'url'=>array('admin')),
);
?>

<h1>Update InformeHogar <?php echo $model->ih_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>