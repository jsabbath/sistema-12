<?php
/* @var $this ParametroController */
/* @var $model Parametro */
/*
$this->breadcrumbs=array(
	'Parametros'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Parametro', 'url'=>array('index')),
	array('label'=>'Create Parametro', 'url'=>array('create')),
);
*/
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#parametro-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="row">
	<div class="span12 text-center">
		<h2>Administrar Parametros</h2>
	</div>
	<div class="span12 text-center">
		<p class="text-info">Aqui se pueden administrar los <strong>Parametros</strong> del sistema</p>
	</div>
</div>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'parametro-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'par_id',
		//'par_item',
		array(
			'name'=>'par_item',
			'type'=>'raw',
			'value'=>'$data->par_item',
			'filter'=>CHtml::listData(Parametro::model()->findAll(),'par_item','par_item'),
		),
		'par_descripcion',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
