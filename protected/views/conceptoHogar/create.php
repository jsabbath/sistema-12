<?php
/* @var $this ConceptoHogarController */
/* @var $model ConceptoHogar */

$this->breadcrumbs=array(
	'Concepto Hogars'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ConceptoHogar', 'url'=>array('index')),
	array('label'=>'Manage ConceptoHogar', 'url'=>array('admin')),
);
?>

<h1>Create ConceptoHogar</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>