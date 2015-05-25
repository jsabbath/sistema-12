<?php
/* @var $this PreCursoController */
/* @var $model PreCurso */
/*
$this->breadcrumbs=array(
	'Pre Cursos'=>array('index'),
	$model->pre_id,
);

$this->menu=array(
	array('label'=>'List PreCurso', 'url'=>array('index')),
	array('label'=>'Create PreCurso', 'url'=>array('create')),
	array('label'=>'Update PreCurso', 'url'=>array('update', 'id'=>$model->pre_id)),
	array('label'=>'Delete PreCurso', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->pre_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PreCurso', 'url'=>array('admin')),
);
*/
?>

<div class="row">
	<div class="span12 text-center">
		<h2><?php echo $model->preNivel->par_descripcion." ".$model->preLetra->par_descripcion; ?></h2>
	</div>
</div>

<div class="row">
	<div class="span12 text-right">
		<?php echo CHtml::link('Regresar',array('PreCurso/admin'),array('class'=>'btn btn-warning')); ?>
	</div>
</div>
<br>

<div class="row">
    <div class="span12 text-center">
    <table class="table table-bordered table-hover" width="100%">
        <tr>
            <td width="50%" style="background-color: #5EB59A"><p class="text-right"><strong>Año</strong></p></td>
            <td width="50%"><p><?php echo $model->pre_ano;?></p></td>
        </tr>
        <tr>
            <td width="50%" style="background-color: #5EB59A"><p class="text-right"><strong>Nivel</strong></p></td>
            <td width="50%"><p><?php echo $model->preNivel->par_descripcion;?></p></td>
        </tr>
        <tr>
            <td width="50%" style="background-color: #5EB59A"><p class="text-right"><strong>Letra</strong></p></td>
            <td width="50%"><p><?php echo $model->preLetra->par_descripcion;?></p></td>
        </tr>
        <tr>
            <td width="50%" style="background-color: #5EB59A"><p class="text-right"><strong>Jornada</strong></p></td>
            <td width="50%"><p><?php echo $model->preJornada->par_descripcion;?></p></td>
        </tr>
        <tr>
            <td width="50%" style="background-color: #5EB59A"><p class="text-right"><strong>Profesor Jefe</strong></p></td>
            <td width="50%"><p><?php echo $model->prePjefe->getNombreCorto();?></p></td>
        </tr>
    </table>
    </div>
</div>

<?php 
/*
$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'pre_id',
		'pre_ano',
		'pre_nivel',
		'pre_letra',
		'pre_jornada',
		'pre_pjefe',
	),
)); 
*/
?>
