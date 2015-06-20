<?php
/* @var $this EventoController */
/* @var $model Evento */

$this->breadcrumbs=array(
	'Eventos'=>array('index'),
	$model->eve_id=>array('view','id'=>$model->eve_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Evento', 'url'=>array('index')),
	array('label'=>'Create Evento', 'url'=>array('create')),
	array('label'=>'View Evento', 'url'=>array('view', 'id'=>$model->eve_id)),
	array('label'=>'Manage Evento', 'url'=>array('admin')),
);
?>

<h1>Update Evento <?php echo $model->eve_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>