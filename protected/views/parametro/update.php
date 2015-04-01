<?php
/* @var $this ParametroController */
/* @var $model Parametro */

$this->breadcrumbs=array(
	'Parametros'=>array('index'),
	$model->par_id=>array('view','id'=>$model->par_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Parametro', 'url'=>array('index')),
	array('label'=>'Create Parametro', 'url'=>array('create')),
	array('label'=>'View Parametro', 'url'=>array('view', 'id'=>$model->par_id)),
	array('label'=>'Manage Parametro', 'url'=>array('admin')),
);
?>

<h1>Update Parametro <?php echo $model->par_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>