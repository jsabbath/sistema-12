<?php
/* @var $this ListaCursoController */
/* @var $model ListaCurso */
?>

<?php
$this->breadcrumbs=array(
	'Lista Cursos'=>array('index'),
	$model->list_id=>array('view','id'=>$model->list_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ListaCurso', 'url'=>array('index')),
	array('label'=>'Create ListaCurso', 'url'=>array('create')),
	array('label'=>'View ListaCurso', 'url'=>array('view', 'id'=>$model->list_id)),
	array('label'=>'Manage ListaCurso', 'url'=>array('admin')),
);
?>

    <h1>Update ListaCurso <?php echo $model->list_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>