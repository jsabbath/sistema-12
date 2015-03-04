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


$asignatura = Asignatura::model()->findAll();
?>
<div class="row">
    <div class="span12">
        <h1>Ver Curso #<?php echo $model->cur_nivel ," ", $model->cur_letra; ?></h1>
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
    <div class="span2">
        <?php echo TbHtml::button('Agregar',array(
                                        'color'=> TbHtml::ALERT_COLOR_SUCCESS, 
                                        'style' => 'float: right',
                                        'id' =>'agregar',
                                        'data-toggle' => 'modal',
                                        'data-target' => '#cambio_modal',
                                        /*'ajax' =>
                                            array('type'=>'POST',
                                                'url'=>$this->createUrl('curso/bcxn'),
                                                //'update'=>'#ajax_op',
                                                'data'=>array('id'=>'js:getId','nombre'=>'js:getNombre()'),
                                                //'success'=> 'function(){location.reload();}'
                                            )*/
            ))?>

    </div>
</div>
<div class="row">
    <div class="span12">
    <?php $this->widget('bootstrap.widgets.TbGridView', array(
        'type' => TbHtml::GRID_TYPE_CONDENSED,
       'dataProvider' => $asig,
       //'filter' => $model,
       'template' => "{items}",
       'columns' => array(
           /* array(
                'name' => 'asi_id',
                'header' => '#',
                'htmlOptions' => array('color' =>'width: 60px'),
            ),*/
            array(
                'name' => 'asi_descripcion',
                'header' => 'Nombre Asignatura',
            ),
            array(
                'name' => 'asi_nombrecorto',
                'header' => 'Nombre Corto',
            ),
            array('class' => 'CButtonColumn',
            'template' => '{retirar}',
            'buttons' => array(
               /* 'update' => array(
                    'label' => '',
                    'imageUrl' => '',
                    'options' => array('class' => 'icon-edit'),
                ),
                'view' => array(
                    'label' => '',
                    'imageUrl' => '',
                    'options' => array('class' => 'icon-search'),
                ),*/
                'retirar' => array(
                    'label' => 'Eliminar Asignatura',
                    'imageUrl' => '',
                    // $data trae todo los atributos del modelo por la xuxa
                   // 'url' => 'Yii::app()->createUrl("aasignatura/delete", array("id"=>))', 
                    //'click'=>'function(){$this->render(matricula/retirar )}',
                    //'click' =>  'sweetAlert("¡SE PRODUJO UN ERROR!", "Alguno de los datos ingresados no es correcto.", "error")',
                    'options' => array('class' => 'icon-remove', 'id' => 'elim'),
                ),
            ),
            ),
        ),
    )); ?>



         <!-- Asignar Asignatura !-->
         <?php $this->widget('bootstrap.widgets.TbModal', array(
                'id' => 'cambio_modal',
                'header' => '<h4>Asignar Asignatura</h4>',
                'content' => '<div id="cambio">  </div>',
                'htmlOptions' => array ('url' => Yii::app()->user->ui->getProfileUrl()),
                'footer' => array(
                        TbHtml::linkButton('Asignar',  array('data-dismiss' => 'modal', 'color' => TbHtml::BUTTON_COLOR_SUCCESS, 'url' =>'#','onclick' => '$("#aasignatura-form").submit()')),
                        TbHtml::button('Cancelar', array('data-dismiss' => 'modal',)),

                ),
        )); ?>    
    </div>     
</div>
<script >
$("#agregar").click(function(){
            $.ajax({
                type:  'POST',
                url: "<?php echo Yii::app()->createUrl('//aasignatura/create'); ?>" ,
                data: { 'id_curso': <?php echo $model->cur_id ?> },
                success: function(result){ 
                    $("#cambio").html(result)}
            });
})

</script>

<script>
    $("#elim").click(function(){
        swal({  title: "Estas seguro?",   
                text: "Estas Borrando una asignatura!",  
                type: "warning",   showCancelButton: true,   confirmButtonColor: "#DD6B55",   
                confirmButtonText: "Si, Borrar!",   closeOnConfirm: false }, 
                function(){   swal("Deleted!", "Se a eliminado  la asignatura", "success");
                                window.location.href = '<?php echo Yii::app()->createUrl("//aasignatura/delete", array("id"=>67)); ?>'; });
              

    }

        )
</script>