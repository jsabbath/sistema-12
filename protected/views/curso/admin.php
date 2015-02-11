
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/ui-autocomplete.min.js" type="text/javascript"></script>


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


<?php echo TbHtml::button('limiar',array('color'=> TbHtml::ALERT_COLOR_SUCCESS, 'id' =>'limpiar' ))?>
    
<div>
    
    <?php echo CHtml::textField('Text', '',
        array('id'=>'nombre',
            'placeholder' => 'Nombres',
            'disabled'=>'disabled',))?>
    
   
    <?php echo CHtml::textField('Text', '',
        array('id'=>'apellido',
            'placeholder' => 'Apellidos',
            'disabled'=>'disabled',
             ))?>
    
</div>

<?php echo TbHtml::button('Ver cursos',array('color'=> TbHtml::ALERT_COLOR_INFO, 'id' =>'buscar'))?>
   

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
                                                    }
                                        }))
                            }
                        })
    		    },
                    select: function(event, ui) {
                        $("#nombre").val(ui.item.nombre)
                        $("#apellido").val(ui.item.apellido)
                      //  $("#buscar").removeAttr('disabled')
                    },
                   
                })
    	 });
</script>    
    

<script>
     $("#limpiar").on('click', function() {
                        $("#nombre").val(""),
                        $("#apellido").val(""),
                        $("#pn").val(""),
                    });
</script>

<script>
     $("#buscar").on('click', function() {
                       var a = $("#buscar")
                        window.alert(a);

    
    });
</script>



