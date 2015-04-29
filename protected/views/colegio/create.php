<?php
/* @var $this ColegioController */
/* @var $model Colegio */
/*
$this->breadcrumbs=array(
	'Colegios'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Colegio', 'url'=>array('index')),
	array('label'=>'Manage Colegio', 'url'=>array('admin')),
);
*/
?>
<div class="row">
	<div class="span12 text-center">
		<h2>Registrar Colegio</h2>	
	</div>
</div>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>