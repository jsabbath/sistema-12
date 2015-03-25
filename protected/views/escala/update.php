<?php
/* @var $this EscalaController */
/* @var $model Escala */

$this->breadcrumbs=array(
	'Escalas'=>array('index'),
	$model->esc_id=>array('view','id'=>$model->esc_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Escala', 'url'=>array('index')),
	array('label'=>'Create Escala', 'url'=>array('create')),
	array('label'=>'View Escala', 'url'=>array('view', 'id'=>$model->esc_id)),
	array('label'=>'Manage Escala', 'url'=>array('admin')),
);
?>

<h1>Update Escala <?php echo $model->esc_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>