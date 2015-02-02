<?php
/* @var $this NotasController */
/* @var $model Notas */

$this->breadcrumbs=array(
	'Notases'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Notas', 'url'=>array('index')),
	array('label'=>'Create Notas', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#notas-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Notases</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'notas-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'not_id',
		'not_aa',
		'not_01',
		'not_02',
		'not_03',
		'not_04',
		/*
		'not_05',
		'not_06',
		'not_07',
		'not_08',
		'not_09',
		'not_10',
		'not_11',
		'not_12',
		'not_13',
		'not_14',
		'not_15',
		'not_16',
		'not_17',
		'not_18',
		'not_19',
		'not_20',
		'not_21',
		'not_22',
		'not_23',
		'not_24',
		'not_25',
		'not_26',
		'not_27',
		'not_28',
		'not_29',
		'not_30',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
