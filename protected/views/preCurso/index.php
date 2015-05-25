<?php
/* @var $this PreCursoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Pre Cursos',
);

$this->menu=array(
	array('label'=>'Create PreCurso', 'url'=>array('create')),
	array('label'=>'Manage PreCurso', 'url'=>array('admin')),
);
?>

<h1>Pre Cursos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
