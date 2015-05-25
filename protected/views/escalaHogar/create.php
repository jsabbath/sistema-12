<?php
/* @var $this EscalaHogarController */
/* @var $model EscalaHogar */
/*
$this->breadcrumbs=array(
	'Escala Hogars'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List EscalaHogar', 'url'=>array('index')),
	array('label'=>'Manage EscalaHogar', 'url'=>array('admin')),
);
*/
?>

<div class="row">
	<div class="span12 text-center">
		<h2>Create EscalaHogar</h2>
	</div>
</div>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>