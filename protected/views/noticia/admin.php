<?php
/* @var $this NoticiaController */
/* @var $model Noticia */
/*
$this->breadcrumbs=array(
	'Noticias'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Noticia', 'url'=>array('index')),
	array('label'=>'Create Noticia', 'url'=>array('create')),
);
*/
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#noticia-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="row">
	<div class="span12 text-center">
		<h1>Administrar noticias</h1>
	</div>
	<div class="span12 text-center">
		<p class="text-info">Aqui se pueden administrar las <strong>noticias</strong> que estan en el sistema</p>
	</div>
</div><br>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'noticia-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'not_id',
		//'not_user',
		array(
			'name'=>'not_user',
			'value'=>array($this,'getPublicador'),
		),
		'not_fecha',
		'not_titulo',
		'not_texto',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
