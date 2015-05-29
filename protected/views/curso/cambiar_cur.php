<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-ui.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery-ui.css">

<?php
/* @var $this MatriculaController */
/* @var $model Matricula */
/*

$this->breadcrumbs=array(
  'Matriculas'=>array('index'),
  'Manage',
);

$this->menu=array(
  array('label'=>'List Matricula', 'url'=>array('index')),
  array('label'=>'Create Matricula', 'url'=>array('create')),
);

*/
?>
<div class="row">
    <div class="span12 text-center">
        <h2>Cambio de curso</h2>  
    </div>
    <div class="span12 text-center">
        <p class="text-info">Aqui se puede cambiar de curso un <strong>alumno</strong></p>
    </div>
</div>
<div class="row">
    <div class="span12 text-center">
        <h5>1.- Ingrese el NOMBRE o el RUT del alumno:</h5>    
    </div>
</div>
<div class="row">
    <div class="span12 text-center">
        <?php echo CHtml::textField('Text', '',
        array('id'=>'pn',
        'placeholder' => 'Ingrese nombre Alumno',))?>



        <?php echo CHtml::textField('Text', '',
        array('id'=>'rut_button',
        'placeholder' => 'Ingrese Rut Alumno',))?>

        <?php echo TbHtml::button('',array('color'=> TbHtml::ALERT_COLOR_DEFAULT, 'id' =>'limpiar','style'=>'margin-bottom:10px', 'icon' => 'remove' ))?>
    </div>
</div>

<div class="span12 text-center" id="hiddenpls" style="display: none">
  <div>

      <!--  Se muestra al buscar    !-->
      <?php 
      echo TbHtml::textField('Text', '',array('id'=>'nombres','placeholder' => 'Nombres','disabled'=>'disabled',));
      
      echo Tbhtml::hiddenField('Text','',array('id' => 'id',));

      echo TbHtml::textField('Text', '',array('id'=>'apellido','placeholder' => 'Apellidos','disabled'=>'disabled',));
      
      echo TbHtml::textField('Text', '',array('id'=>'rut_','placeholder' => 'RUT','disabled'=>'disabled',));

      echo TbHtml::textField('Text', '',array('id'=>'curso','placeholder' => 'curso','disabled'=>'disabled',));

      echo TbHtml::hiddenField('Text', '',array('id'=>'id_curso','placeholder' => 'id curso','disabled'=>'disabled'));

      ?>
  </div>

  <br>
  <h5>2.- Ingrese El curso al que desea cambiar el alumno:  </h5>

  <?php  echo CHtml::dropDownList('cur_id','cur_id',$cur ,array('empty' => '-Seleccione Curso-',
                                                                      'id'=> 'drop_curso',
                                                                      'name' => 'drop_curso')); ?>
  <!-- <?php //echo CHtml::textField('Text', '',array('id' =>'estado','placeholder' => 'Estado'))?> !-->

  <!--  Se muestra al buscar    !-->
  <?php echo TbHtml::button('',array(
      'color'=> TbHtml::ALERT_COLOR_SUCCESS, 
      'id' =>'retirar',
      'style'=>'margin-bottom:10px',
      'icon' => 'icon-ok',
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

<script type="text/javascript">
    $('.datepicker').datepicker();
</script>

<script>
  $(function(){
        $('#pn').autocomplete({
           source : function( request, response ) {
           $.ajax({
                    url: "<?php echo $this->createUrl('curso/buscar_alumno_curso'); ?>",
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
                                                    curso: item.curso,
                                                    cur_id: item.cur_id,
                                                    }
                                        }))
                               

                            }

                        })
            },
                    select: function(event, ui) {
                        $("#nombres").val(ui.item.nombres)
                        $("#apellido").val(ui.item.apellido)
                         $("#curso").val(ui.item.curso)
                          $("#id_curso").val(ui.item.cur_id)
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
                    url: "<?php echo $this->createUrl('curso/buscar_rut_curso'); ?>",
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
                                                    curso: item.curso,
                                                    cur_id: item.cur_id,
                                                    }
                                        }))
                               

                            }

                        })
            },
                    select: function(event, ui) {
                        $("#nombres").val(ui.item.nombres)
                        $("#apellido").val(ui.item.apellido)
                         $("#curso").val(ui.item.curso)
                          $("#id_curso").val(ui.item.cur_id)
                        $("#id").val(ui.item.id)   
                        $("#rut_").val(ui.item.rut)
                        if( $('#pn').val() ) {
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
