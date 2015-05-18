<?php
/* @var $this ConceptoHogarController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Concepto Hogars',
);

$this->menu=array(
	array('label'=>'Create ConceptoHogar', 'url'=>array('create')),
	array('label'=>'Manage ConceptoHogar', 'url'=>array('admin')),
);
?>

<h1>Concepto Hogars</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
