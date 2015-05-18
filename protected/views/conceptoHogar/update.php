<?php
/* @var $this ConceptoHogarController */
/* @var $model ConceptoHogar */

$this->breadcrumbs=array(
	'Concepto Hogars'=>array('index'),
	$model->ch_id=>array('view','id'=>$model->ch_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ConceptoHogar', 'url'=>array('index')),
	array('label'=>'Create ConceptoHogar', 'url'=>array('create')),
	array('label'=>'View ConceptoHogar', 'url'=>array('view', 'id'=>$model->ch_id)),
	array('label'=>'Manage ConceptoHogar', 'url'=>array('admin')),
);
?>

<h1>Update ConceptoHogar <?php echo $model->ch_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>