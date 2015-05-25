<?php
/* @var $this EscalaHogarController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Escala Hogars',
);

$this->menu=array(
	array('label'=>'Create EscalaHogar', 'url'=>array('create')),
	array('label'=>'Manage EscalaHogar', 'url'=>array('admin')),
);
?>

<h1>Escala Hogars</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
