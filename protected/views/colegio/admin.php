<?php
/* @var $this ColegioController */
/* @var $model Colegio */
/*
$this->breadcrumbs=array(
	'Colegios'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Colegio', 'url'=>array('index')),
	array('label'=>'Create Colegio', 'url'=>array('create')),
);
*/
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#colegio-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="row">
	<div class="span12 text-center">
		<h2>Administrar Colegio</h2>	
	</div>
	<div class="span12 text-center">
		<p class="text-info">Aqui se pueden administrar los <strong>parametros</strong> del colegio</p>
	</div>
</div>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'colegio-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'col_id',
		//'col_rolRBD',
		'col_nombre_colegio',
		'col_letra',
		'col_numero',
		//'col_ano',
		'col_nombre_director',
		'col_director_email',
		'col_area',
		'col_regimen',
		/*
		'col_periodo',
		'col_encargado_actas',
		'col_fecha_resol_rec_ofic',
		'col_numero_resol_rec_ofic',
		'col_lema',
		'col_mision',
		'col_vision',
		'col_logo',
		'col_razon_social',
		'col_rut_razon_social',
		'col_fecha_primer',
		'col_fecha_segundo',
		'col_fecha_tercer',
		'col_direccion',
		'col_comuna',
		'col_ciudad',
		'col_colegio_email',
		'col_telefono',
		'col_nota_minima',
		'col_nota_maxima',
		'col_nota_aprovacion',
		'col_aproximacion',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>

<div class="row">
	<div class="span12 text-center">
		<?php echo CHtml::link('Ingresar Nuevo',array('Colegio/create'),array('class'=>'btn btn-warning')); ?>
	</div>
</div>
<br>