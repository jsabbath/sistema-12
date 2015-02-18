<?php
/* @var $this ConceptoController */
/* @var $model Concepto */
?>

<?php
$this->breadcrumbs=array(
	'Conceptos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Concepto', 'url'=>array('index')),
	array('label'=>'Manage Concepto', 'url'=>array('admin')),
);
?>

<h1>Create Concepto</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>