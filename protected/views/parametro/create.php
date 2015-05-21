<?php
/* @var $this ParametroController */
/* @var $model Parametro */
/*
$this->breadcrumbs=array(
	'Parametros'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Parametro', 'url'=>array('index')),
	array('label'=>'Manage Parametro', 'url'=>array('admin')),
);
*/
?>
<div class="row">
	<div class="span12 text-center">
		<h2>Ingresar Parametro</h2>
	</div>
</div>


<?php $this->renderPartial('_form', array('model'=>$model)); ?>