<?php
/* @var $this CursoController */
/* @var $model Curso */
/*
$this->breadcrumbs=array(
	'Cursos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Curso', 'url'=>array('index')),
	array('label'=>'Manage Curso', 'url'=>array('admin')),
);
*/
?>

<div class="row">
    <div class="span12 text-center">
        <h2>Crear curso</h2>
    </div>
</div>
<div class="row">
    <div class="span12 text-center">
        <p class="text-info">Los campos con <span class="required">*</span> son obligatorios.</p>
    </div>
</div>

<?php $this->renderPartial('_form', array('model'=>$model, 
                                            'niveles' => $niveles,
                                            'ano' => $ano,
                                            'tp' => $tp,
                                            'jornada' => $jornada,
                                            'letra' => $letra,
        )); ?>