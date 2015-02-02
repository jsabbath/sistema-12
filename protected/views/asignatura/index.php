<?php
/* @var $this AsignaturaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Asignaturas',
);

$this->menu=array(
	array('label'=>'Create Asignatura', 'url'=>array('create')),
	array('label'=>'Manage Asignatura', 'url'=>array('admin')),
);
?>

<h1>Asignaturas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
