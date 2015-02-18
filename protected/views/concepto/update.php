<?php
/* @var $this ConceptoController */
/* @var $model Concepto */
?>

<?php
$this->breadcrumbs=array(
	'Conceptos'=>array('index'),
	$model->con_id=>array('view','id'=>$model->con_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Concepto', 'url'=>array('index')),
	array('label'=>'Create Concepto', 'url'=>array('create')),
	array('label'=>'View Concepto', 'url'=>array('view', 'id'=>$model->con_id)),
	array('label'=>'Manage Concepto', 'url'=>array('admin')),
);
?>

    <h1>Update Concepto <?php echo $model->con_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>