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
		<p class="text-info">Lista de todas las asignaturas del sistema</p>
	</div>


<div class="span10 offset1">
	
<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'asignatura-grid',
	'type' => TbHtml::GRID_TYPE_BORDERED,
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
			'name'=>'asi_orden',
			'type'=>'raw',
			'htmlOptions'=>array('style'=>'text-align:center; width: 20px;'),
		),
		'asi_descripcion',
		'asi_codigo',
		'asi_nombrecorto',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{update}',
			'buttons'=>array(
				'update'=>array(
					'label'=>'<i class="icon-search"></i>',
					'options'=>array(
						'class'=>"btn btn-success",
						'data-toggle'=>'tooltip',
						'title'=>'borrar',
					),
				),
			),
		),
	),
)); ?>
</div>

</div>


