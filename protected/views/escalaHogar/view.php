<?php
/* @var $this EscalaHogarController */
/* @var $model EscalaHogar */
/*
$this->breadcrumbs=array(
	'Escala Hogars'=>array('index'),
	$model->eh_id,
);

$this->menu=array(
	array('label'=>'List EscalaHogar', 'url'=>array('index')),
	array('label'=>'Create EscalaHogar', 'url'=>array('create')),
	array('label'=>'Update EscalaHogar', 'url'=>array('update', 'id'=>$model->eh_id)),
	array('label'=>'Delete EscalaHogar', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->eh_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage EscalaHogar', 'url'=>array('admin')),
);
*/
?>

<div class="row">
	<div class="span12 text-center">
		<h2><?php echo $model->eh_descripcion; ?></h2>
	</div>
</div>

<div class="row">
	<div class="span12 text-right">
		<?php echo CHtml::link('Regresar',array('EscalaHogar/admin'),array('class'=>'btn btn-warning')); ?>
	</div>
</div>
<br>

<div class="row">
    <div class="span12 text-center">
    <table class="table table-bordered table-hover" width="100%">
        <tr>
            <td width="50%" style="background-color: #5EB59A"><p class="text-right"><strong>Escala</strong></p></td>
            <td width="50%"><p><?php echo $model->eh_descripcion;?></p></td>
        </tr>
    </table>
    </div>
</div>
<br>