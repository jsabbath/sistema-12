<?php
/* @var $this InfHogarController */
/* @var $model InfHogar */
/*
$this->breadcrumbs=array(
	'Inf Hogars'=>array('index'),
	$model->ih_id=>array('view','id'=>$model->ih_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List InfHogar', 'url'=>array('index')),
	array('label'=>'Create InfHogar', 'url'=>array('create')),
	array('label'=>'View InfHogar', 'url'=>array('view', 'id'=>$model->ih_id)),
	array('label'=>'Manage InfHogar', 'url'=>array('admin')),
);
*/
?>

<div class="row">
	<div class="span12 text-center">
		<h2>Actualizar <?php echo $model->ih_informe; ?></h2>
	</div>
</div>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>