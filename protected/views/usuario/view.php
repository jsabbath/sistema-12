<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
/*
$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	$model->usu_id,
);

$this->menu=array(
	array('label'=>'List Usuario', 'url'=>array('index')),
	array('label'=>'Create Usuario', 'url'=>array('create')),
	array('label'=>'Update Usuario', 'url'=>array('update', 'id'=>$model->usu_id)),
	array('label'=>'Delete Usuario', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->usu_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Usuario', 'url'=>array('admin')),
);
*/
?>
<div class="row">
	<div class="span12 text-center">
		<h2><?php echo $model->getNombreCorto(); ?></h2>	
	</div>
</div>



<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'usu_id',
		'usu_nombre1',
        'usu_nombre2',
		'usu_apepat',
		'usu_apemat',
		'usu_rut',
		//'usu_estado',
		array(
			'name'=>'usu_estado',
			'value'=>$model->usuEstado->par_descripcion,
		),
	),
)); ?>
<div class="span6 text-center">
	<h2>Firma:</h2>
	<img style="width: 37%" src="<?php echo Yii::app()->baseUrl; ?>/images/firmas/<?php echo $model->usu_firma; ?>">
</div>