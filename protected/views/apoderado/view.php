<?php
/* @var $this ApoderadoController */
/* @var $model Apoderado */
/*
$this->breadcrumbs=array(
	'Apoderados'=>array('index'),
	$model->apo_id,
);

$this->menu=array(
	array('label'=>'List Apoderado', 'url'=>array('index')),
	array('label'=>'Create Apoderado', 'url'=>array('create')),
	array('label'=>'Update Apoderado', 'url'=>array('update', 'id'=>$model->apo_id)),
	array('label'=>'Delete Apoderado', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->apo_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Apoderado', 'url'=>array('admin')),
);
*/
?>

<div class="row">
    <div class="span12 text-center">
        <h2><?php echo $model->apo_nombre1." ".$model->apo_apepat ?></h2>
    </div>
</div>

<div class="row">
	<div class="span12 text-right">
		<?php echo CHtml::link('Regresar',array('Apoderado/admin'),array('class'=>'btn btn-warning')); ?>
	</div>
</div>
<br>

<div class="row">
    <div class="span12 text-center">
    <table class="table table-bordered table-hover" width="100%">
        <tr>
            <td width="50%" style="background-color: #5EB59A"><p class="text-right"><strong>Rut</strong></p></td>
            <td width="50%"><p><?php echo $model->apo_rut; ?></p></td>
        </tr>
        <tr>
            <td width="50%" style="background-color: #5EB59A"><p class="text-right"><strong>Primer Nombre</strong></p></td>
            <td width="50%"><p><?php echo $model->apo_nombre1; ?></p></td>
        </tr>
        <tr>
            <td width="50%" style="background-color: #5EB59A"><p class="text-right"><strong>Segundo Nombre</strong></p></td>
            <td width="50%"><p><?php echo $model->apo_nombre2; ?></p></td>
        </tr>
        <tr>
            <td width="50%" style="background-color: #5EB59A"><p class="text-right"><strong>Apellido Paterno</strong></p></td>
            <td width="50%"><p><?php echo $model->apo_apepat; ?></p></td>
        </tr>
        <tr>
            <td width="50%" style="background-color: #5EB59A"><p class="text-right"><strong>Apellido Materno</strong></p></td>
            <td width="50%"><p><?php echo $model->apo_apemat; ?></p></td>
        </tr>
        <tr>
            <td width="50%" style="background-color: #5EB59A"><p class="text-right"><strong>Año</strong></p></td>
            <td width="50%"><p><?php echo $model->apo_ano; ?></p></td>
        </tr>
          <tr>
            <td width="50%" style="background-color: #5EB59A"><p class="text-right"><strong>Hijo</strong></p></td>
            <td width="50%"><p><?php echo $model->apoHijo->matAlu->getNombre_completo_3(); ?></p></td>
        </tr>
    </table>
    </div>
</div>
<br>