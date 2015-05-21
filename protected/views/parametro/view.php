<?php
/* @var $this ParametroController */
/* @var $model Parametro */
/*
$this->breadcrumbs=array(
	'Parametros'=>array('index'),
	$model->par_id,
);

$this->menu=array(
	array('label'=>'List Parametro', 'url'=>array('index')),
	array('label'=>'Create Parametro', 'url'=>array('create')),
	array('label'=>'Update Parametro', 'url'=>array('update', 'id'=>$model->par_id)),
	array('label'=>'Delete Parametro', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->par_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Parametro', 'url'=>array('admin')),
);
*/
?>
<div class="row">
	<div class="span12 text-center">
		<h2>Parametro : <?php echo $model->par_item; ?></h2>
	</div>
</div>


<div class="row">
    <div class="span12 text-center">
    <table class="table table-bordered table-hover" width="100%">
        <tr>
            <td width="50%" style="background-color: #5EB59A"><p class="text-right"><strong>Nivel</strong></p></td>
            <td width="50%"><p><?php echo $model->par_item;?></p></td>
        </tr>
        <tr>
            <td width="50%" style="background-color: #5EB59A"><p class="text-right"><strong>Letra</strong></p></td>
            <td width="50%"><p><?php echo $model->par_descripcion;?></p></td>
        </tr>
    </table>
    </div>
</div>

<div class="row">
    <div class="span12 text-center">
        <?php echo CHtml::link('Regresar',array('Parametro/admin'),array('class'=>'btn btn-warning')); ?>
    </div>
</div>
<br>