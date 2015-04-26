<?php
/* @var $this NoticiaController */
/* @var $model Noticia */
/*
$this->breadcrumbs=array(
	'Noticias'=>array('index'),
	$model->not_id=>array('view','id'=>$model->not_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Noticia', 'url'=>array('index')),
	array('label'=>'Create Noticia', 'url'=>array('create')),
	array('label'=>'View Noticia', 'url'=>array('view', 'id'=>$model->not_id)),
	array('label'=>'Manage Noticia', 'url'=>array('admin')),
);
*/
?>

<h1>Update Noticia <?php echo $model->not_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>