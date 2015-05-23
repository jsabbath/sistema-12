<?php
/* @var $this ColegioController */
/* @var $model Colegio */
/*
$this->breadcrumbs=array(
	'Colegios'=>array('index'),
	$model->col_id,
);

$this->menu=array(
	array('label'=>'List Colegio', 'url'=>array('index')),
	array('label'=>'Create Colegio', 'url'=>array('create')),
	array('label'=>'Update Colegio', 'url'=>array('update', 'id'=>$model->col_id)),
	array('label'=>'Delete Colegio', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->col_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Colegio', 'url'=>array('admin')),
);
*/
?>
<div class="row">
	<div class="span6 text-center">
		<h2>Parametros : </h2>	
		<h2><?php echo $model->col_nombre_colegio; ?></h2>
	</div>
	<div class="span6 text-center">
		<h2>Logo</h2>
		<img src="<?php echo Yii::app()->baseUrl; ?>/images/<?php echo $model->col_logo; ?>">
	</div>
</div>

<div class="row">
    <div class="span12 text-center">
    <table class="table table-bordered table-hover" width="100%">
        <tr>
            <td width="50%" style="background-color: #5EB59A"><p class="text-right"><strong>Rol RBD</strong></p></td>
            <td width="50%"><p><?php echo $model->col_rolRBD;?></p></td>
        </tr>
        <tr>
            <td width="50%" style="background-color: #5EB59A"><p class="text-right"><strong>Nombre Colegio</strong></p></td>
            <td width="50%"><p><?php echo $model->col_nombre_colegio;?></p></td>
        </tr>
        <tr>
            <td width="50%" style="background-color: #5EB59A"><p class="text-right"><strong>Letra</strong></p></td>
            <td width="50%"><p><?php echo $model->col_letra;?></p></td>
        </tr>
        <tr>
            <td width="50%" style="background-color: #5EB59A"><p class="text-right"><strong>Numero</strong></p></td>
            <td width="50%"><p><?php echo $model->col_numero;?></p></td>
        </tr>
        <tr>
            <td width="50%" style="background-color: #5EB59A"><p class="text-right"><strong>Año</strong></p></td>
            <td width="50%"><p><?php echo $model->col_ano;?></p></td>
        </tr>
     
        <tr>
            <td width="50%" style="background-color: #5EB59A"><p class="text-right"><strong>Periodo</strong></p></td>
            <td width="50%"><p><?php echo $model->col_periodo; ?></p></td>
        </tr>
        <tr>
            <td width="50%" style="background-color: #5EB59A"><p class="text-right"><strong>Nombre de Director</strong></p></td>
            <td width="50%"><p><?php echo $nombre_dir; ?></p></td>
        </tr>
        <tr>
            <td width="50%" style="background-color: #5EB59A"><p class="text-right"><strong>Correo Director</strong></p></td>
            <td width="50%"><p><?php echo $model->col_director_email; ?></p></td>
        </tr>
        <tr>
            <td width="50%" style="background-color: #5EB59A"><p class="text-right"><strong>Encargado de Actas</strong></p></td>
            <td width="50%"><p><?php echo $model->col_encargado_actas; ?></p></td>
        </tr>
        <tr>
            <td width="50%" style="background-color: #5EB59A"><p class="text-right"><strong>Fecha de Resolucion Rec. Oficial</strong></p></td>
            <td width="50%"><p><?php echo $model->col_fecha_resol_rec_ofic; ?></p></td>
        </tr>
        <tr>
            <td width="50%" style="background-color: #5EB59A"><p class="text-right"><strong>Numero de Resolucion Rec. Oficial</strong></p></td>
            <td width="50%"><p><?php echo $model->col_numero_resol_rec_ofic; ?></p></td>
        </tr>
        <tr>
            <td width="50%" style="background-color: #5EB59A"><p class="text-right"><strong>Lema</strong></p></td>
            <td width="50%"><p><?php echo $model->col_lema; ?></p></td>
        </tr>
        <tr>
            <td width="50%" style="background-color: #5EB59A"><p class="text-right"><strong>Mision</strong></p></td>
            <td width="50%"><p><?php echo $model->col_mision; ?></p></td>
        </tr>
        <tr>
            <td width="50%" style="background-color: #5EB59A"><p class="text-right"><strong>Vision</strong></p></td>
            <td width="50%"><p><?php echo $model->col_vision; ?></p></td>
        </tr>
        <tr>
            <td width="50%" style="background-color: #5EB59A"><p class="text-right"><strong>Area</strong></p></td>
            <td width="50%"><p><?php echo $model->col_area; ?></p></td>
        </tr>
        <tr>
            <td width="50%" style="background-color: #5EB59A"><p class="text-right"><strong>Regimen</strong></p></td>
            <td width="50%"><p><?php echo $model->col_regimen; ?></p></td>
        </tr>
        <tr>
            <td width="50%" style="background-color: #5EB59A"><p class="text-right"><strong>Razon Social</strong></p></td>
            <td width="50%"><p><?php echo $model->col_razon_social; ?></p></td>
        </tr>
        <tr>
            <td width="50%" style="background-color: #5EB59A"><p class="text-right"><strong>Rut Razon Social</strong></p></td>
            <td width="50%"><p><?php echo $model->col_rut_razon_social; ?></p></td>
        </tr>
        <tr>
            <td width="50%" style="background-color: #5EB59A"><p class="text-right"><strong>Fecha Primera Actividad</strong></p></td>
            <td width="50%"><p><?php echo $model->col_fecha_primer; ?></p></td>
        </tr>
        <tr>
            <td width="50%" style="background-color: #5EB59A"><p class="text-right"><strong>Fecha Segunda Actividad</strong></p></td>
            <td width="50%"><p><?php echo $model->col_fecha_segundo; ?></p></td>
        </tr>
        <tr>
            <td width="50%" style="background-color: #5EB59A"><p class="text-right"><strong>Fecha Tercera Actividad</strong></p></td>
            <td width="50%"><p><?php echo $model->col_fecha_tercer; ?></p></td>
        </tr>
        <tr>
            <td width="50%" style="background-color: #5EB59A"><p class="text-right"><strong>Direccion</strong></p></td>
            <td width="50%"><p><?php echo $model->col_direccion; ?></p></td>
        </tr>
        <tr>
            <td width="50%" style="background-color: #5EB59A"><p class="text-right"><strong>Ciudad</strong></p></td>
            <td width="50%"><p><?php echo $model->col_ciudad; ?></p></td>
        </tr>
        <tr>
            <td width="50%" style="background-color: #5EB59A"><p class="text-right"><strong>Correo del Colegio</strong></p></td>
            <td width="50%"><p><?php echo $model->col_colegio_email; ?></p></td>
        </tr>
        <tr>
            <td width="50%" style="background-color: #5EB59A"><p class="text-right"><strong>Telefono del Colegio</strong></p></td>
            <td width="50%"><p><?php echo $model->col_telefono; ?></p></td>
        </tr>
        <tr>
            <td width="50%" style="background-color: #5EB59A"><p class="text-right"><strong>Nota Minima</strong></p></td>
            <td width="50%"><p><?php echo $model->col_nota_minima; ?></p></td>
        </tr>
        <tr>
            <td width="50%" style="background-color: #5EB59A"><p class="text-right"><strong>Nota Maxima</strong></p></td>
            <td width="50%"><p><?php echo $model->col_nota_maxima; ?></p></td>
        </tr>
        <tr>
            <td width="50%" style="background-color: #5EB59A"><p class="text-right"><strong>Nota Aprovacion</strong></p></td>
            <td width="50%"><p><?php echo $model->col_nota_aprovacion; ?></p></td>
        </tr>
        <tr>
            <td width="50%" style="background-color: #5EB59A"><p class="text-right"><strong>Aproximacion</strong></p></td>
            <td width="50%"><p><?php echo $model->col_aproximacion; ?></p></td>
        </tr>
        <tr>
            <td width="50%" style="background-color: #5EB59A"><p class="text-right"><strong>Logo</strong></p></td>
            <td width="50%"><p><?php echo $model->col_logo; ?></p></td>
        </tr>
    </table>
    </div>
</div>

<?php 
/*
$this->widget('bootstrap.widgets.TbDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'col_id',
		'col_rolRBD',
		'col_nombre_colegio',
		'col_letra',
		'col_numero',
		'col_ano',
		'col_periodo',
		'col_nombre_director',
		'col_director_email',
		'col_encargado_actas',
		'col_fecha_resol_rec_ofic',
		'col_numero_resol_rec_ofic',
		'col_lema',
		'col_mision',
		'col_vision',
		'col_area',
		'col_regimen',
		'col_logo',
		'col_razon_social',
		'col_rut_razon_social',
		'col_fecha_primer',
		'col_fecha_segundo',
		'col_fecha_tercer',
		'col_direccion',
		'col_ciudad',
		'col_colegio_email',
		'col_telefono',
		'col_nota_minima',
		'col_nota_maxima',
		'col_nota_aprovacion',
		'col_aproximacion',
	),
)); 
*/
?>
