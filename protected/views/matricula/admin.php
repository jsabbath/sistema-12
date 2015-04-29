<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-ui.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery-ui.css">
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/rut.js" type="text/javascript"></script> 

<script type="text/javascript">
    $(document).ready(function() {
        $('#rut_button').Rut({
            format_on: 'keyup',
 
        });
    })
    
</script>

<?php
/* @var $this MatriculaController */
/* @var $model Matricula */


$this->breadcrumbs=array(
	'Matriculas'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Matricula', 'url'=>array('index')),
	array('label'=>'Create Matricula', 'url'=>array('create')),
);


?>

<h1>Retirar Alumno</h1>
  
<h5>Ingrese el NOMBRE o el RUT del alumno</h5>

 <?php echo CHtml::textField('Text', '',
    array('id'=>'pn',
        'placeholder' => 'Ingrese nombre Alumno',))?>



 <?php echo CHtml::textField('Text', '',
    array('id'=>'rut_button',
        'placeholder' => 'Ingrese Rut Alumno',))?>



<?php echo TbHtml::button('',array('color'=> TbHtml::ALERT_COLOR_DEFAULT, 'id' =>'limpiar','style'=>'margin-bottom:10px', 'icon' => 'remove' ))?>

 
    <div  id="hiddenpls" style="display: none">


    <hr>
        <div>
            <!--  Se muestra al buscar    !-->
            <?php echo TbHtml::textField('Text', '',
                array('id'=>'nombres',
                    'placeholder' => 'Nombres',
                    'disabled'=>'disabled',

                    ))?>
            
            <?php echo Tbhtml::hiddenField('Text','',array('id' => 'id',)); ?>

            <!--  Se muestra al buscar    !-->
            <?php echo TbHtml::textField('Text', '',
                array('id'=>'apellido',
                    'placeholder' => 'Apellidos',
                    'disabled'=>'disabled',
                     ))?>
            
            <!--  Se muestra al buscar    !-->
            <?php echo TbHtml::textField('Text', '',
              array('id'=>'rut_',
                  'placeholder' => 'RUT',
                  'disabled'=>'disabled',
                  ))?>
        
        </div>


           <h5> Ingrese la Fecha de retiro, Default: (HOY)<?php echo date("Y-m-d"); ?> </h5>


        <?php echo CHtml::dateField('Text', '',array('id'=>'fecha','placeholder' => 'fecha',))?>
        <!-- <?php //echo CHtml::textField('Text', '',array('id' =>'estado','placeholder' => 'Estado'))?> !-->


         <!--  Se muestra al buscar    !-->
        <?php echo TbHtml::button('',array(
                                        'color'=> TbHtml::ALERT_COLOR_DEFAULT, 
                                        'id' =>'retirar',
                                        'style'=>'margin-bottom:10px',
                                        'icon' => 'remove',
                                       //'style' => 'float: right',
                                       // 'data-toggle' => 'modal',
                                        //'data-target' => '#cambio_modal',
                                        'ajax' =>
                                            array('type'=>'POST',
                                                'url'=>$this->createUrl('retirar'), // Buscar cursos por nombre
                                                'update'=>'#fecha_retirar',
                                                'data'=>array('id'=>'js:getId()','fecha'=>'js:getFecha()',/*'estado'=>'js:getEstado()',*/),
                                                'success'=> 'function(){location.reload();}'
                                            )
                                        )
            )?>
    



      
    </div>



     


 <!-- Asignar Asignatura 
     <?php /*$this->widget('bootstrap.widgets.TbModal', array(
            'id' => 'cambio_modal',
            'header' => '<h4>Asignar Asignatura</h4>',
            'content' => '<div id="cambio">  </div>',
            'htmlOptions' => array ('url' => Yii::app()->user->ui->getProfileUrl()),
            'footer' => array(
                  //  TbHtml::linkButton('Retirar',  array( 'color' => TbHtml::BUTTON_COLOR_DANGER, 'url' => Yii::app()->user->ui->logoutUrl,)),
                    TbHtml::button('Cancelar', array('data-dismiss' => 'modal',)),
            ),
    ));*/ ?>    
        
!-->

<script>
	$(function(){
        $('#pn').autocomplete({
       		 source : function( request, response ) {
       		 $.ajax({
                    url: "<?php echo $this->createUrl('matricula/Buscar_alum'); ?>",
                    dataType: "json",
                    data: { term: request.term },
                    success: function(data) {
                                response($.map(data, function(item) {
                                            return {
                                                    label: item.nombres +'/' + item.apellido,
                                                    apellido: item.apellido + ' ' + item.apellido2,
                                                    nombres: item.nombres,
                                                    id: item.id,
                                                    rut: item.rut,
                                                    }
                                        }))
                               
                            }

                        })
    		    },
                    select: function(event, ui) {
                        $("#nombres").val(ui.item.nombres)
                        $("#apellido").val(ui.item.apellido)
                        $("#id").val(ui.item.id)   
                        $("#rut_").val(ui.item.rut)
                        if( $('#pn').val() ) {
                            $('#hiddenpls').show();
                        }
                    }});
    	 });
</script>    
    

<script>
     $("#limpiar").on('click', function() {
                        $("#nombres").val(""),
                        $("#apellido").val(""),
                        $("#pn").val(""),
                        $("#id").val(""),
                        $("#rut_").val("")
                        $("#rut_button").val("")
                        $("#fecha_retirar").replaceWith(" <div id='fecha_retirar'>  </div> ")
                        $('#hiddenpls').hide()
                    });
</script>

<script>
	$(function(){
        $('#rut_button').autocomplete({
       		 source : function( request, response ) {
       		 $.ajax({
                    url: '<?php echo $this->createUrl('matricula/Buscar_rut'); ?>',
                    dataType: "json",
                    data: { term: request.term },
                    success: function(data) {
                                response($.map(data, function(item) {
                                            return {
                                                    label: item.rut,
                                                    apellido: item.apellido + ' ' + item.apellido2,
                                                    nombres: item.nombres,
                                                    id: item.id,
                                                    rut: item.rut,
                                                    }
                                        }))
                            }
                        })
	              },
                    select: function(event, ui) {
                        $("#nombres").val(ui.item.nombres)
                        $("#apellido").val(ui.item.apellido)
                        $("#id").val(ui.item.id)   
                        $("#rut_").val(ui.item.rut)
                        if( $('#rut_button').val() ) {
                            $('#hiddenpls').show();
                        }
                    }});
    	 });
</script>


<script>
    function getId(){ 
        var value= $("#id").val();
        if( value != "") 
            return value;
    }         

    function getFecha(){ 
        var value= $("#fecha").val();
        if( value != "") 
            return value;
    } 

  /*  function getEstado(){ 
        var value= $("#estado").val();
        if( value != "") 
            return value;
    }   */       
</script>
