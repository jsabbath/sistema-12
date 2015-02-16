<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-ui.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery-ui.css">
        
       
<?php
/* @var $this CursoController */
/* @var $model Curso */

$this->breadcrumbs=array(
	'Cursos'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Curso', 'url'=>array('index')),
	array('label'=>'Create Curso', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#curso-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Buscar Cursos</h1>


<?php echo CHtml::textField('Text', '',
    array('id'=>'pn',
        'placeholder' => 'Ingrese nombre Profesor',))?>


<?php echo TbHtml::button('',array('color'=> TbHtml::ALERT_COLOR_DEFAULT, 'id' =>'limpiar','style'=>'margin-bottom:10px', 'icon' => 'remove' ))?>
<div class="form">  
    <?php echo TbHtml::beginFormTb(); ?>
    <div>

        <?php echo TbHtml::textField('Text', '',
            array('id'=>'nombre',
                'placeholder' => 'Nombres',
                'disabled'=>'disabled',))?>
        
        <?php echo Tbhtml::hiddenField('Text','',array('id' => 'id_cruge',)); ?>


        <?php echo TbHtml::textField('Text', '',
            array('id'=>'apellido',
                'placeholder' => 'Apellidos',
                'disabled'=>'disabled',
                 ))?>

    </div>

    <?php echo TbHtml::submitButton('Ver cursos',array(
                                    'color'=> TbHtml::ALERT_COLOR_WARNING, 
                                    'id' =>'buscar',
                                    'ajax' =>
                                        array('type'=>'POST',
                                            'url'=>$this->createUrl('curso/bcxn'), // Buscar cursos por nombre
                                            'update'=>'#ajax_op',
                                            'data'=>array('id'=>'#id_cruge','nombre'=>'#nombre'),
                                            //'success'=> 'function(){location.reload();}'
                                        )
        ))?>

<?php echo TbHtml::endForm(); ?>
</div>


<div id ="ajax_op">
    los cursos van  aka
    
</div>


<div class="search-form" style="display:none">    
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'curso-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'cur_id',
		//'cur_ano',
		'cur_nivel',
		'cur_jornada',
		'cur_letra',
		//'cur_pjefe',
		/*
		'cur_infd',
		'cur_tperiodo',
		'cur_notas_periodo',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>


<script>
	$(function(){
        $('#pn').autocomplete({
       		 source : function( request, response ) {
       		 $.ajax({
                    url: '<?php echo $this->createUrl('curso/Buscar_prof'); ?>',
                    dataType: "json",
                    data: { term: request.term },
                    success: function(data) {
                                response($.map(data, function(item) {
                                            return {
                                                    label: item.nombre +'/' + item.apellido,
                                                    apellido: item.apellido + ' ' + item.apellido2,
                                                    nombre: item.nombre + ' ' + item.nombre2,
                                                    id: item.id,
                                                    id_cruge: item.id_cruge,
                                                    }
                                        }))
                            }
                        })
    		    },
                    select: function(event, ui) {
                        $("#nombre").val(ui.item.nombre)
                        $("#apellido").val(ui.item.apellido)
                        $("#id_cruge").val(ui.item.id_cruge) 
                       
                        
                        
                    }});
    	 });
</script>    
    

<script>
     $("#limpiar").on('click', function() {
                        $("#nombre").val(""),
                        $("#apellido").val(""),
                        $("#pn").val(""),
                        $("#id_cruge").val("")
                        $("#ajax_op").replaceWith(" <div id='ajax_op'>  se vacio la listax </div> ")
                    });
</script>
