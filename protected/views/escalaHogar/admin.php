<?php
/* @var $this EscalaHogarController */
/* @var $model EscalaHogar */
/*
$this->breadcrumbs=array(
	'Escala Hogars'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List EscalaHogar', 'url'=>array('index')),
	array('label'=>'Create EscalaHogar', 'url'=>array('create')),
);
*/
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#escala-hogar-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="row">
	<div class="span12 text-center">
		<h2>Administrar Escala Hogar</h2>
	</div>
</div>

<div class="row">
	<div class="span12 text-center">
		<p class="text-info">Aqui se puede administrar la <strong>Escala</strong> para el <strong>Informe al Hogar</strong></p>
	</div>
</div>

<div class="row">
	<div class="span12 text-right">
		<?php echo CHtml::link('Ingresar Escala',array('EscalaHogar/create'),array('class'=>'btn btn-warning')); ?>
	</div>
</div>
<br>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'escala-hogar-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'eh_id',
		'eh_descripcion',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
<br>