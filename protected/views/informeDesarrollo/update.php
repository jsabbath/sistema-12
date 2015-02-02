<?php
/* @var $this InformeDesarrolloController */
/* @var $model InformeDesarrollo */

$this->breadcrumbs=array(
	'Informe Desarrollos'=>array('index'),
	$model->id_id=>array('view','id'=>$model->id_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List InformeDesarrollo', 'url'=>array('index')),
	array('label'=>'Create InformeDesarrollo', 'url'=>array('create')),
	array('label'=>'View InformeDesarrollo', 'url'=>array('view', 'id'=>$model->id_id)),
	array('label'=>'Manage InformeDesarrollo', 'url'=>array('admin')),
);
?>

<h1>Update InformeDesarrollo <?php echo $model->id_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>