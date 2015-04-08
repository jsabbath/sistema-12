<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-ui.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery-ui.css">
        
       
<?php
/* @var $this CursoController */
/* @var $model Curso */
/*
$this->breadcrumbs=array(
	'Cursos'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Curso', 'url'=>array('index')),
	array('label'=>'Create Curso', 'url'=>array('create')),
);
*/
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
<div class="row">
    <div class="span12 text-center">
        <h2>Buscar Cursos</h2>
    </div>
</div>
<div class="row">
    <div class="span6 offset3">
        <div class="row">
            <div class="span6">
                <?php echo CHtml::textField('Text', '',array('id'=>'pn','placeholder' => 'Ingrese nombre Profesor',))?>
                <?php echo TbHtml::button('',array('color'=> TbHtml::ALERT_COLOR_DEFAULT, 'id' =>'limpiar','style'=>'margin-bottom:10px', 'icon' => 'remove' ))?>
            </div>
        </div>
        
        <div class="row">
            <div class="span6">
            <?php echo TbHtml::textField('Text', '',
                array('id'=>'nombre',
                    'placeholder' => 'Nombres',
                    'disabled'=>'disabled',
                    ))?>
            
            <?php echo Tbhtml::hiddenField('Text','',array('id' => 'id_cruge',)); ?>


            <?php echo TbHtml::textField('Text', '',
                array('id'=>'apellido',
                    'placeholder' => 'Apellidos',
                    'disabled'=>'disabled',
                     ))?>
            <?php echo TbHtml::button('Ver cursos',array(
                'color'=> TbHtml::ALERT_COLOR_WARNING, 
                'id' =>'buscar',
                'style'=>'margin-bottom:10px',
                'ajax' =>
                    array('type'=>'POST',
                        'url'=>$this->createUrl('curso/bcxn'), // Buscar cursos por nombre
                        'update'=>'#ajax_op',
                        'data'=>array('id'=>'js:getId','nombre'=>'js:getNombre()'),
                        //'success'=> 'function(){location.reload();}'
                    )
            ))?>
            </div>
        </div>
    </div>
</div>
<br>

<div class="row">
    <div class="span8 offset2">
        <div id ="ajax_op">
        </div>
    </div>
</div>


<div class="search-form" style="display:none">    
</div><!-- search-form -->

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
                        $("#ajax_op").replaceWith(" <div id='ajax_op'>  </div> ")
                    });
                    
                    
    function getNombre(){ 
        var value= $("#nombre").val();
        if( value != "")
            return value;
    }
    
    function getId(){ 
        var value= $("#id_cruge").val();
        if( value != "")
            return value;
    }
</script>
