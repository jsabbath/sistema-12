<?php
/* @var $this EscalaHogarController */
/* @var $model EscalaHogar */
/*
$this->breadcrumbs=array(
	'Escala Hogars'=>array('index'),
	$model->eh_id=>array('view','id'=>$model->eh_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List EscalaHogar', 'url'=>array('index')),
	array('label'=>'Create EscalaHogar', 'url'=>array('create')),
	array('label'=>'View EscalaHogar', 'url'=>array('view', 'id'=>$model->eh_id)),
	array('label'=>'Manage EscalaHogar', 'url'=>array('admin')),
);
*/
?>

<div class="row">
	<div class="span12 text-center">
		<h2>Actualizar <?php echo $model->eh_descripcion; ?></h2>
	</div>
</div>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>