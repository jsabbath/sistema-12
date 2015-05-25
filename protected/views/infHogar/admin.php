<?php
/* @var $this InfHogarController */
/* @var $model InfHogar */
/*
$this->breadcrumbs=array(
	'Inf Hogars'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List InfHogar', 'url'=>array('index')),
	array('label'=>'Create InfHogar', 'url'=>array('create')),
);
*/
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#inf-hogar-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="row">
	<div class="span12 text-center">
		<h2>Administrar Informe Hogar</h2>
	</div>
</div>

<div class="row">
	<div class="span12 text-center">
		<p class="text-info">Aqui se puede administrar los <strong>Elementos</strong> del <strong>Informe al Hogar</strong></p>
	</div>
</div>

<div class="row">
	<div class="span12 text-right">
		<?php echo CHtml::link('Crear Informe a Hogar',array('InfHogar/create'),array('class'=>'btn btn-warning')); ?>
	</div>
</div>
<br>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'inf-hogar-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'ih_id',
		'ih_informe',
		'ih_area',
		'ih_concepto',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
<br>