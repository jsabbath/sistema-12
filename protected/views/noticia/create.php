<?php
/* @var $this NoticiaController */
/* @var $model Noticia */
/*
$this->breadcrumbs=array(
	'Noticias'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Noticia', 'url'=>array('index')),
	array('label'=>'Manage Noticia', 'url'=>array('admin')),
);
*/
?>
<div class="row">
	<div class="span12 text-center">
		<h2>Crear Noticia</h2>
	</div>
	<div class="span12 text-center">
		<p class="text-info">Los campos con <span class="required">*</span> son requeridos.</p>
	</div>
</div>


<?php $this->renderPartial('_form', array('model'=>$model)); ?>