<?php
/* @var $this AsignaturaController */
/* @var $model Asignatura */



Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#asignatura-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="row">
	<div class="span12 text-center">
		<h2>Lista de Asignaturas</h2>
	</div>
	<dov class="span12 text-center">
		<p class="text-info">Lista de todas las asignaturas del sistema</p>
	</dov>
</div>


<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'asignatura-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'asi_orden',
		'asi_descripcion',
		'asi_codigo',
		'asi_nombrecorto',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
