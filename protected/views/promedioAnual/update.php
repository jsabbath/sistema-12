<?php
/* @var $this PromedioAnualController */
/* @var $model PromedioAnual */
?>

<?php
$this->breadcrumbs=array(
	'Promedio Anuals'=>array('index'),
	$model->PRO_ID=>array('view','id'=>$model->PRO_ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List PromedioAnual', 'url'=>array('index')),
	array('label'=>'Create PromedioAnual', 'url'=>array('create')),
	array('label'=>'View PromedioAnual', 'url'=>array('view', 'id'=>$model->PRO_ID)),
	array('label'=>'Manage PromedioAnual', 'url'=>array('admin')),
);
?>

    <h1>Update PromedioAnual <?php echo $model->PRO_ID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>