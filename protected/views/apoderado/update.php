<?php
/* @var $this ApoderadoController */
/* @var $model Apoderado */
/*
$this->breadcrumbs=array(
	'Apoderados'=>array('index'),
	$model->apo_id=>array('view','id'=>$model->apo_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Apoderado', 'url'=>array('index')),
	array('label'=>'Create Apoderado', 'url'=>array('create')),
	array('label'=>'View Apoderado', 'url'=>array('view', 'id'=>$model->apo_id)),
	array('label'=>'Manage Apoderado', 'url'=>array('admin')),
);
*/
?>

<div class="row">
	<div class="span12 text-center">
		<h2>Actualizar <?php echo $model->apo_nombre1." ".$model->apo_apepat; ?></h2>
	</div>
</div>

<?php $this->renderPartial('_form', array(
	'model'=>$model,
	'ano'=>$ano,
	'nom_p'=>$nom_p,
	'ape_p'=>$ape_p,
)); ?>