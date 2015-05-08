<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/sweet-alert.css">
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/sweet-alert.min.js"></script>

<?php
/* @var $this CursoController */
/* @var $model Curso */

$this->breadcrumbs=array(
	'Cursos'=>array('index'),
	$model->cur_id,
);

$this->menu=array(
	array('label'=>'List Curso', 'url'=>array('index')),
	array('label'=>'Create Curso', 'url'=>array('create')),
	array('label'=>'Update Curso', 'url'=>array('update', 'id'=>$model->cur_id)),
	array('label'=>'Delete Curso', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->cur_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Curso', 'url'=>array('admin')),
);

?>


<div class="row">
    <div class="span12">
        <h1><?php echo $niv ," ", $letra ?></h1>
    </div>
</div>
<div class="row">
    <div class="span12">
    <?php $this->widget('zii.widgets.CDetailView', array(
    	'data'=>$model,
    	'attributes'=>array(
    		'cur_id',
    		'cur_ano',
    		'cur_nivel',
    		'cur_jornada',
    		'cur_letra',
    		'cur_pjefe',
    		'cur_infd',
    		'cur_tperiodo',
    		'cur_notas_periodo',
    	),
    )); ?>
    </div>
</div>
<div class="row">
    <div class="span10">
        <h4>Asignaturas Inscritas</h4>
    </div>
   
</div>
<div class="row">
    <div class="span12">


    <table class="table table-striped">
      <thead>
        <tr>
          <th>id</th>
          <th>Docente</th>
          <th>Asignatura</th>
          <th>  </th>
        </tr>
      </thead>
      <tbody>
        <?php for ($i=0; $i <count($asignacion) ; $i++) { 
                    $nombre_doc = $prof[$asignacion[$i]->aa_docente];
                    $nombre_asi = $asignatura[$asignacion[$i]->aa_asignatura];
                    $id_asignacion = $asignacion[$i]->aa_id; 
        ?>
            <tr>
              <td><?php echo $id_asignacion;?> </td>
              <td><?php echo CHtml::link($nombre_doc,CController::createUrl('//usuario/view',array('id'=> $asignacion[$i]->aa_docente)));?> </td>
              <td><?php echo $nombre_asi;?> </td>
              <td>  <i style="cursor:pointer; cursor:hand" class = 'icon-remove' onclick="asd(<?php echo $id_asignacion ?>)"> </i>  </td>
            </tr>
        <?php } ?>
      </tbody>
    </table>



    </div>     
</div>



<script>

    function asd(id_a){
        a = '<?php echo Yii::app()->createUrl("//aasignatura/delete", array("id"=>'CK' )); ?>';
        url_delete = a.replace("CK",id_a);
        swal({  title: "Estas seguro?",   
                text: "Estas Borrando una asignatura!",  
                type: "warning",   showCancelButton: true,   confirmButtonColor: "#DD6B55",   
                confirmButtonText: "Si, Borrar!",   closeOnConfirm: false }, 
                function(){ 
                        $.ajax({
                            type:'POST',
                            url: url_delete,
                            success: function(){
                               location.reload();
                            } 
                        });  
                }
            );
    }
    

</script>
