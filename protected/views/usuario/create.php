<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
/*
$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Usuario', 'url'=>array('index')),
	array('label'=>'Manage Usuario', 'url'=>array('admin')),
);
*/
?>

<div class="row">
	<div class="span12 text-center">
		<h2>Ingresar Usuario</h2>	
	</div>
</div>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>