<?php
/* @var $this InformeDesarrolloController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Informe Desarrollos',
);

$this->menu=array(
	array('label'=>'Create InformeDesarrollo', 'url'=>array('create')),
	array('label'=>'Manage InformeDesarrollo', 'url'=>array('admin')),
);
?>

<h1>Informe Desarrollos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
