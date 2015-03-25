<?php
/* @var $this EscalaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Escalas',
);

$this->menu=array(
	array('label'=>'Create Escala', 'url'=>array('create')),
	array('label'=>'Manage Escala', 'url'=>array('admin')),
);
?>

<h1>Escalas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
