<?php
/* @var $this ColegioController */
/* @var $model Colegio */
/*
$this->breadcrumbs=array(
	'Colegios'=>array('index'),
	$model->col_id=>array('view','id'=>$model->col_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Colegio', 'url'=>array('index')),
	array('label'=>'Create Colegio', 'url'=>array('create')),
	array('label'=>'View Colegio', 'url'=>array('view', 'id'=>$model->col_id)),
	array('label'=>'Manage Colegio', 'url'=>array('admin')),
);
*/
?>
<div class="row">
	<div class="span12">
		<h2>Modificar Parametros Colegio <?php echo $model->col_id; ?></h2>	
	</div>
</div>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>