<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
/*
$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	$model->usu_id=>array('view','id'=>$model->usu_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Usuario', 'url'=>array('index')),
	array('label'=>'Create Usuario', 'url'=>array('create')),
	array('label'=>'View Usuario', 'url'=>array('view', 'id'=>$model->usu_id)),
	array('label'=>'Manage Usuario', 'url'=>array('admin')),
);
*/
?>
<div class="row">
	<div class="span12 text-center">
		<h2>Modificar a <?php echo $model->getNombrecorto(); ?></h2>
	</div>
</div>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>