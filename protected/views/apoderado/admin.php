<?php
/* @var $this ApoderadoController */
/* @var $model Apoderado */
/*
$this->breadcrumbs=array(
	'Apoderados'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Apoderado', 'url'=>array('index')),
	array('label'=>'Create Apoderado', 'url'=>array('create')),
);
*/
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#apoderado-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="row">
	<div class="span12 text-center">
		<h2>Administrar Apoderados</h2>
	</div>
	<div class="span12 text-center">
		<p class="text-info">Aqui se pueden administrar los distintos <strong>apoderados</strong> del sistema</p>
	</div>
</div>

<div class="row">
	<div class="span12 text-right">
		<?php echo CHtml::link('Ingresar Apoderado',array('Apoderado/create'),array('class'=>'btn btn-warning')); ?>
	</div>
</div>
<br>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'apoderado-grid',
	'dataProvider'=>$model->buscar($this->actionAnoactual()),
	'filter'=>$model,
	'columns'=>array(
		//'apo_id',
		//'apo_nombre1',
		//'apo_nombre2',
		//'apo_apepat',
		//'apo_apemat',
		//'apo_rut',
		/*
		'apo_hijo',
		*/
		array(
			'name'=>'apo_nombre1',
			'type'=>'raw',
			'value'=>'$data->apo_nombre1',
		),
		array(
			'name'=>'apo_nombre2',
			'type'=>'raw',
			'value'=>'$data->apo_nombre2',
		),
		array(
			'name'=>'apo_apepat',
			'type'=>'raw',
			'value'=>'$data->apo_apepat',
		),
		array(
			'name'=>'apo_apemat',
			'type'=>'raw',
			'value'=>'$data->apo_apemat',
		),
		array(
			'name'=>'apoHijo.matAlu.alum_nombres',
			'type'=>'raw',
			'filter'=> CHtml::activeTextField($model,'alumno_nombres'),
		),
		array(
			'name'=>'apoHijo.matAlu.alum_apepat',
			'type'=>'raw',
			'filter'=> CHtml::activeTextField($model,'alumno_apepat'),
		),
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
