<?php
/* @var $this AAsignaturaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Aasignaturas',
);

$this->menu=array(
	array('label'=>'Create AAsignatura', 'url'=>array('create')),
	array('label'=>'Manage AAsignatura', 'url'=>array('admin')),
);
?>

<h1>Aasignaturas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
