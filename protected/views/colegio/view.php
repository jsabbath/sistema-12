<?php
/* @var $this ColegioController */
/* @var $model Colegio */
/*
$this->breadcrumbs=array(
	'Colegios'=>array('index'),
	$model->col_id,
);

$this->menu=array(
	array('label'=>'List Colegio', 'url'=>array('index')),
	array('label'=>'Create Colegio', 'url'=>array('create')),
	array('label'=>'Update Colegio', 'url'=>array('update', 'id'=>$model->col_id)),
	array('label'=>'Delete Colegio', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->col_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Colegio', 'url'=>array('admin')),
);
*/
?>
<div class="row">
	<div class="span12">
		<h2>Ver Parametros Colegio <?php echo $model->col_id; ?></h2>	
	</div>
</div>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'col_id',
		'col_rolRBD',
		'col_nombre_colegio',
		'col_letra',
		'col_numero',
		'col_ano',
		'col_periodo',
		'col_nombre_director',
		'col_director_email',
		'col_encargado_actas',
		'col_fecha_resol_rec_ofic',
		'col_numero_resol_rec_ofic',
		'col_lema',
		'col_mision',
		'col_vision',
		'col_area',
		'col_regimen',
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
	),
)); ?>
