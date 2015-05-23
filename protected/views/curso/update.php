<?php
/* @var $this CursoController */
/* @var $model Curso */

$this->breadcrumbs=array(
	'Cursos'=>array('index'),
	$model->cur_id=>array('view','id'=>$model->cur_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Curso', 'url'=>array('index')),
	array('label'=>'Create Curso', 'url'=>array('create')),
	array('label'=>'View Curso', 'url'=>array('view', 'id'=>$model->cur_id)),
	array('label'=>'Manage Curso', 'url'=>array('admin')),
);
?>

<h1>Update Curso <?php echo $model->cur_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model,
                                            'niveles' => $niveles,
                                            'ano' => $ano,
                                            'tp' => $tp,
                                            'jornada' => $jornada,
                                            'letra' => $letra,
                                            'informe' => $informe,
                                            'nom_p' => $nom_p,
                                			'ape_p'	=> $ape_p,
    )); ?>