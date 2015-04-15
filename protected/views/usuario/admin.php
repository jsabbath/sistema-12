<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
/*
$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Usuario', 'url'=>array('index')),
	array('label'=>'Create Usuario', 'url'=>array('create')),
);
*/
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#usuario-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="row">
	<div class="span12 text-center">
		<h1>Administrar Usuarios</h1>	
	</div>
</div>

<div class="row">
	<div class="span12">
		<p class="text-center text-info">Aqui se muestra la lista de usuarios con sus respectivas opciones</p>
	</div>
</div>

</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'usuario-grid',
	'type' => TbHtml::GRID_TYPE_BORDERED,
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'usu_id',
		'usu_rut',
		'usu_nombre1',
        'usu_nombre2',
		'usu_apepat',
		'usu_apemat',
		//'usu_estado',
		array(
			'name'=>'usu_estado',
			'type'=>'raw',
			'value'=>array($this,'gridEstado'),
			'filter' => CHtml::listData(Parametro::model()->findAll(array('condition'=>'par_descripcion="ACTIVO"')), 'par_id','par_descripcion'),
			'htmlOptions'=>array('style'=>'text-align:center'),
		),
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
