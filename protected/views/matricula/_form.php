<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-ui.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery-ui.css">



   <style type="text/css">
      .nav-tabs > li, .nav-pills > li {
          float:none;
          display:inline-block;
      }
   </style>


<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'matricula-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation'=>false,
));
//var_dump($cur_actual);

$random1 = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 5);
$random2 = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 5);
$rand = "X".$random1.$random2;


?>
<div class="row">
  <div class="span12 text-center">
    <p class="text-info">
        Los campos con <span class="required">*</span> son obligatorios. <br>
      <?php if( $model->isNewRecord ){ ?>  Para Alumnos <strong>YA REGISTRADOS</strong>  se pueden obtener los datos <strong>INGRESANDO EL RUT DEL ALUMNO</strong><?php } ?>
    </p>

</div>

<div class="span8 offset2">
  <?php echo $form->errorSummary(array($model,$alumno),'','',array('class'=>'alert alert-error')); ?>
</div>
</div>



<div class="tabbable">
  <ul class="nav nav-tabs" style="text-align: center">
  
    <li class="active"><a href="#alumno"  data-toggle="tab">Datos Alumno<span class="required">*</span></a></li>
    <li><a href="#familia"  data-toggle="tab">Familia, Apoderado</a></li>
    <li><a href="#Ingresos"  data-toggle="tab">Ingresos</a></li>
    <li><a href="#Vivienda"  data-toggle="tab">Vivienda</a></li>
    <li><a href="#Matricula"  data-toggle="tab">Datos Matricula<span class="required">*</span></a></li>
    <li><a ><?php echo TbHtml::submitButton($model->isNewRecord ? 'Ingresar' : 'Guardar',array('color'=>TbHtml::BUTTON_COLOR_SUCCESS)); ?> </a></li>
</ul>



  <div class="tab-content">
    <div class="tab-pane active" id="alumno">
       <div class="span11">
            <div class="span4">

                    <?php echo $form->hiddenField($alumno,'alum_id'); ?>

                    <?php echo $form->labelEx($alumno,'alum_rut'); ?>
                    <?php echo $form->textField($alumno,'alum_rut',array( 'placeholder' => 'XXXXXXXX-X')); ?>


                    <?php echo $form->labelEx($alumno,'alum_nombres'); ?>
                    <?php echo $form->textField($alumno,'alum_nombres'); ?>

                    <?php echo $form->labelEx($alumno,'alum_apepat'); ?>
                    <?php echo $form->textField($alumno,'alum_apepat'); ?>

                    <?php echo $form->labelEx($alumno,'alum_apemat'); ?>
                    <?php echo $form->textField($alumno,'alum_apemat'); ?>


                    <?php echo $form->labelEx($alumno,'alum_transporte'); ?>
                    <?php echo CHtml::dropDownList('drop_trans', null, $trans,array('empty' => 'Seleccione Transporte')); ?>


                    <?php echo $form->TextField($alumno,'alum_transporte',array( 'placeholder' => 'Especifique')); ?>



                    <script type="text/javascript">
                        function trans(){
                            input_trans = $('#Alumno_alum_transporte');
                            <?php if( $model->isNewRecord ){ ?>
                                input_trans.hide();
                             <?php }  ?>
                                $('#drop_trans').on('change',function(){
                                    if( this.value == <?php echo $otro->par_id; ?> ){  // si  se selecciona opcion otro
                                        input_trans.val("");
                                        input_trans.show();
                                        input_trans.focus();
                                    } else{
                                        input_trans.hide();
                                        input_trans.val( $('#drop_trans :selected').text() );
                                    }
                                })
                                if( input_trans.val() != "" ){
                                    input_trans.show();
                                }
                        } trans();
                    </script>

                <?php echo $form->labelEx($alumno,'alum_salud'); ?>
                <?php echo $form->textArea($alumno,'alum_salud'); ?>
                <?php echo $form->error($alumno,'alum_salud'); ?>

                <?php echo $form->labelEx($alumno,'alum_enfermedad'); ?>
                <?php echo $form->textArea($alumno,'alum_enfermedad'); ?>
                <?php echo $form->error($alumno,'alum_enfermedad'); ?>


            </div> <!--  fila 1 -->



            <div class="span4">
                    <?php echo $form->labelEx($alumno,'alum_f_nac'); ?>
                    <?php echo $form->textField($alumno,'alum_f_nac',array('class'=>'datepicker')); ?>

                    <?php echo $form->labelEx($alumno,'alum_direccion'); ?>
                    <?php echo $form->textField($alumno,'alum_direccion',array('placeholder' => 'Calle, N°, poblacion, sector')); ?>

                    <?php echo $form->labelEx($alumno,'alum_religion'); ?>
                    <?php echo $form->dropDownList($alumno,'alum_religion',$religion,array('empty'=>'Seleccione religion')); ?>

                    <?php echo $form->labelEx($alumno,'alum_procedencia'); ?>
                    <?php echo $form->textField($alumno,'alum_procedencia'); ?>

                    <?php echo $form->labelEx($alumno,'alum_aprendizaje'); ?>
                    <?php echo $form->textArea($alumno,'alum_aprendizaje', array('placeholder' => 'Situacion de aprendizaje diagnosticado (Detallar)')); ?>

                    <?php echo $form->labelEx($alumno,'alum_obs'); ?>
                    <?php echo $form->textArea($alumno,'alum_obs'); ?>

                    <?php echo $form->labelEx($alumno,'alum_medicamentos'); ?>
                    <?php echo $form->textArea($alumno,'alum_medicamentos'); ?>
                    <?php echo $form->error($alumno,'alum_medicamentos'); ?>

            </div> <!--  fila 2 -->


            <div class="span2">

                <?php if( $model->isNewRecord ){ ?>
                        <?php echo $form->labelEx($alumno,'alum_region'); ?>
                        <?php
                        echo $form->dropDownList($alumno, 'alum_region', $region, array(
                            'empty' => 'Seleccione region',
                            'class' => 'input-medium'
                        ));
                        ?>

                        <?php echo $form->labelEx($alumno,'alum_ciudad'); ?>
                        <?php echo $form->dropDownList($alumno, 'alum_ciudad', array(),array(
                            'empty' => 'Seleccione ciudad',
                            'disabled'=>'disabled',
                            'class' => 'input-medium'
                        ));?>

                        <?php echo $form->labelEx($alumno,'alum_comuna'); ?>
                        <?php echo $form->dropDownList($alumno, 'alum_comuna', array(),array(
                            'empty'=>'Seleccione comuna',
                            'disabled'=>'disabled',
                            'class' => 'input-medium'
                        ));?>

                    <script type="text/javascript">

                        $('#Alumno_alum_region').on('change',function(){ ajax_ciudad() });
                        $('#Alumno_alum_ciudad').on('change',function(){ ajax_comuna() });

                        function ajax_ciudad(){
                            input_ciudad = $('#Alumno_alum_ciudad');
                            $.ajax({
                                url: '<?php echo CController::createUrl('Alumno/regiones'); ?>',
                                type: 'POST',
                                data: {id_region: $('#Alumno_alum_region').val()},
                            })
                            .done(function(response) {
                                input_ciudad.html(response);
                                input_ciudad.prop("disabled", false);
                                $('#Alumno_alum_comuna').prop("disabled", true);
                                $('#Alumno_alum_comuna').html("<option value=0>Seleccione comuna<option>");
                            })

                        }

                        function ajax_comuna(){
                            input_comuna = $('#Alumno_alum_comuna');
                            $.ajax({
                                url: '<?php echo CController::createUrl('Alumno/ciudades'); ?>',
                                type: 'POST',
                                data: {id_ciudad: $('#Alumno_alum_ciudad').val()},
                            })
                            .done(function(response) {
                                input_comuna.html(response);
                                input_comuna.prop("disabled", false);
                            })

                        }



                    </script>



                <?php } else{ ?>

                        <?php echo $form->labelEx($alumno,'alum_region'); ?>
                        <?php
                        echo $form->dropDownList($alumno, 'alum_region', $region, array(
                            'prompt'=>'Seleccione region',
                            'class' => 'input-medium' ,
                            'ajax' => array(
                                'type'=>'POST', //request type
                                'url'=>CController::createUrl('Alumno/regiones'), //url to call.
                                'update'=>'#drop_ciudad', //selector to update
                                'data'=>array('id_region' => 'js:this.value'),
                            ),
                        ));
                        ?>

                        <?php echo $form->labelEx($alumno,'alum_ciudad'); ?>
                        <?php echo $form->dropDownList($alumno, 'alum_ciudad', $ciudad,array(
                            'prompt'=>'Seleccione ciudad',
                            'class' => 'input-medium' ,
                            'id'=>'drop_ciudad',
                            'ajax' => array(
                                'type'=>'POST', //request type
                                'url'=>CController::createUrl('Alumno/ciudades'), //url to call.
                                'update'=>'#drop_comuna', //selector to update
                                'data'=>array('id_ciudad' => 'js:this.value'),
                            ),
                        ));?>

                        <?php echo $form->labelEx($alumno,'alum_comuna'); ?>
                        <?php echo $form->dropDownList($alumno, 'alum_comuna', $comuna,array(
                            'prompt'=>'Seleccione comuna',
                            'class' => 'input-medium' ,
                            'id'=>'drop_comuna',
                        ));?>

                <?php } ?>

                    <?php echo $form->labelEx($alumno,'alum_genero'); ?>
                    <?php echo $form->dropDownList($alumno,'alum_genero',$genero,array('prompt'=>'Seleccione genero', 'class' => 'input-medium')); ?>





            </div> <!-- fila 3 -->



        </div><!-- span 11 -->


    </div>
    <div class="tab-pane" id="familia">

      <div class="span11" >


            <div class="span4">
                    <?php echo $form->labelEx($alumno,'alum_madre_nombre'); ?>
                    <?php echo $form->textField($alumno,'alum_madre_nombre'); ?>

                    <?php echo $form->labelEx($alumno,'alum_padre_nombre'); ?>
                    <?php echo $form->textField($alumno,'alum_padre_nombre'); ?>

                     <br></br> <br></br>
                     <?php echo $form->labelEx($alumno,'alum_apo1_nombre'); ?>
                    <?php echo $form->textField($alumno,'alum_apo1_nombre'); ?>

                    <?php echo $form->labelEx($alumno,'alum_apo2_nombre'); ?>
                    <?php echo $form->textField($alumno,'alum_apo2_nombre'); ?>

                       <br></br> <br>

                    <?php echo $form->labelEx($alumno,'alum_fonos_emergencia'); ?>
                    <?php echo CHtml::textField('nom',null,array('placeholder' => 'Nombre')); ?>
                    <?php echo CHtml::textField('nom2',null,array('placeholder' => 'Nombre')); ?>

            </div>

            <div class="span3">
                <?php echo $form->labelEx($alumno,'alum_madre_rut'); ?>
                <?php echo $form->textField($alumno,'alum_madre_rut', array('placeholder' => 'XXXXXXXX-X', 'class' => 'input-medium')); ?>

                <?php echo $form->labelEx($alumno,'alum_padre_rut'); ?>
                <?php echo $form->textField($alumno,'alum_padre_rut', array('placeholder' => 'XXXXXXXX-X', 'class' => 'input-medium')); ?>

                  <br></br> <br></br>

                <?php echo $form->labelEx($alumno,'alum_apo1_rut'); ?>
                <?php echo $form->textField($alumno,'alum_apo1_rut', array('placeholder' => 'XXXXXXXX-X', 'class' => 'input-medium')); ?>

                  <?php echo $form->labelEx($alumno,'alum_apo2_rut'); ?>
                <?php echo $form->textField($alumno,'alum_apo2_rut', array('placeholder' => 'XXXXXXXX-X', 'class' => 'input-medium')); ?>

                 <br></br>
                 <br></br>
                  <?php echo CHtml::textField('fono',null, array('placeholder' => 'Fono', 'class' => 'input-medium')); ?>
                  <button class="btn btn-success" id="add_fono" form="none" style="margin-bottom: 10px">+</button>

                  <?php echo CHtml::textField('fono2',null, array('placeholder' => 'Fono', 'class' => 'input-medium')); ?>
                  <button class="btn btn-success" id="less_fono" form="none"  style="margin-bottom: 10px">-</button>

            </div>

            <div class="span3">
                    <?php echo $form->labelEx($alumno,'alum_madre_nivel'); ?>
                    <?php echo $form->dropDownList($alumno,'alum_madre_nivel',$nivel_edu,array('empty' => 'Seleccione Nivel')); ?>

                    <?php echo $form->labelEx($alumno,'alum_padre_nivel'); ?>
                    <?php echo $form->dropDownList($alumno,'alum_padre_nivel',$nivel_edu,array('empty' => 'Seleccione Nivel')); ?>

                     <br></br> <br></br>

                    <?php echo $form->labelEx($alumno,'alum_apo1_telefono'); ?>
                    <?php echo $form->textField($alumno,'alum_apo1_telefono'); ?>

                    <?php echo $form->labelEx($alumno,'alum_apo2_telefono'); ?>
                    <?php echo $form->textField($alumno,'alum_apo2_telefono'); ?>
                    <br></br>
                    <br>
                    <?php echo $form->labelEx($alumno,'alum_vive_con'); ?>
                    <?php echo CHtml::dropDownList('drop_vive', null, $vive_con,array('empty' => 'Seleccione')); ?>
                    <?php echo $form->TextField($alumno,'alum_vive_con',array('placeholder' => 'Especifique')); ?>

                    <script type="text/javascript">
                        function vive_con(){
                            vive_hidden = $('#Alumno_alum_vive_con');
                            <?php if( $model->isNewRecord ){ ?>
                                vive_hidden.hide();
                             <?php }  ?>
                            if( vive_hidden.val() == "" ){
                                vive_hidden.hide();
                            }
                            $('#drop_vive').on('change',function(){
                                if( this.value == <?php echo $otro_vive->par_id; ?> ){  // si  se selecciona opcion otro
                                    vive_hidden.val("");
                                    vive_hidden.show();
                                    vive_hidden.focus();
                                } else{
                                    vive_hidden.hide();
                                    vive_hidden.val( $('#drop_vive :selected').text() );
                                }
                            })
                            if( vive_hidden.val() != "" ){
                                vive_hidden.show();
                            }

                        } vive_con();

                    </script>


            </div>


        <div hidden>
            <?php echo $form->textField($alumno,'alum_fonos_emergencia');// atributo REAL  que guarda los TELEFONOS no mostrar ?>
        </div>


        </div><!-- row familia -->


    </div>

    <div class="tab-pane" id="Ingresos">
        <div class="span11">
            <div class="span3">
                <?php echo $form->labelEx($alumno,'alum_madre_actividad'); ?>
                <?php echo $form->textField($alumno,'alum_madre_actividad',array('class' => 'input-medium')); ?>

                <?php echo $form->labelEx($alumno,'alum_padre_actividad'); ?>
                <?php echo $form->textField($alumno,'alum_padre_actividad',array('class' => 'input-medium')); ?>

                <br><br>
                <?php echo $form->labelEx($alumno,'alum_fam1_actividad'); ?>
                <?php echo $form->textField($alumno,'alum_fam1_actividad',array('class' => 'input-medium')); ?>
                <?php echo $form->textField($alumno,'alum_fam2_actividad',array('id' => 'fam2_act', 'class' => 'input-medium')); ?>

            </div>

            <div class="span4">
                <?php echo $form->labelEx($alumno,'alum_madre_act_tipo'); ?>
                <?php echo $form->textField($alumno,'alum_madre_act_tipo'); ?>

                <?php echo $form->labelEx($alumno,'alum_padre_act_tipo'); ?>
                <?php echo $form->textField($alumno,'alum_padre_act_tipo'); ?>
                <br><br>
                <?php echo $form->labelEx($alumno,'alum_fam1_lugar'); ?>
                <?php echo $form->textField($alumno,'alum_fam1_lugar'); ?>
                <?php echo $form->textField($alumno,'alum_fam2_lugar',array('id' => 'fam2_lugar')); ?>

            </div>

            <div class="span3">
                <?php echo $form->labelEx($alumno,'alum_madre_ingresos'); ?>
                <?php echo $form->textField($alumno,'alum_madre_ingresos',array('class' => 'input-medium','placeholder' => '$')); ?>

                <?php echo $form->labelEx($alumno,'alum_padre_ingresos'); ?>
                <?php echo $form->textField($alumno,'alum_padre_ingresos',array('class' => 'input-medium','placeholder' => '$')); ?>
                <br><br>
                <?php echo $form->labelEx($alumno,'alum_fam1_ingreso'); ?>
                <?php echo $form->textField($alumno,'alum_fam1_ingreso',array('class' => 'input-medium','placeholder' => '$')); ?>
                <?php echo $form->textField($alumno,'alum_fam2_ingreso',array('class' => 'input-medium','placeholder' => '$', 'id' => 'fam2_ingreso')); ?>

            </div>

        </div>

    </div>


    <div class="tab-pane" id="Vivienda">
        <div class="span11">
            <div class="span4">
                <?php echo $form->labelEx($alumno,'alum_vivienda'); ?>
                <?php echo $form->dropDownList($alumno,'alum_vivienda',$vivienda,array('prompt'=>'Seleccione Vivienda')); ?>

                <?php echo $form->labelEx($alumno,'alum_construccion'); ?>
                <?php echo $form->dropDownList($alumno,'alum_construccion',$constru,array('prompt'=>'Seleccione tipo')); ?>

            </div>

           <div class="span3">
                <?php echo $form->labelEx($alumno,'alum_baño_tipo'); ?>
                <?php echo $form->dropDownList($alumno,'alum_baño_tipo',$baño_tipo,array('prompt'=>'Seleccione Baño','class' => 'input-medium')); ?>

                <?php echo $form->labelEx($alumno,'alum_baño_cantidad'); ?>
                <?php echo $form->dropDownList($alumno,'alum_baño_cantidad',array('Numero Baños','1', '2', '3', '4', '5', '6', '7', '8' , '9', '10'),
                                                          array('class' => 'input-medium')); ?>

           </div>

            <div class="span3">
                <?php echo $form->labelEx($alumno,'alum_dormitorios'); ?>
                <?php echo $form->dropDownList($alumno,'alum_dormitorios',array('Numero Dormitorios','1', '2', '3', '4', '5', '6', '7', '8' , '9', '10'),
                                                          array('class' => 'input-small')); ?>

            </div>
        </div>

    </div>
    <div class="tab-pane" id="Matricula">
        <div class="span11">
          <div class="span3">
              <?php echo $form->labelEx($model,'mat_fingreso'); ?>
              <?php echo $form->textField($model,'mat_fingreso',array('class'=>'datepicker input-medium')); ?>

              <?php echo $form->labelEx($model,'mat_numero'); ?>
              <?php echo $form->textField($model,'mat_numero',array('id'=>'nm', 'class' => 'input-medium')); ?>

          </div>

          <div class="span4">

                <?php echo $form->labelEx($model,'mat_documentos'); ?>
                <?php echo $form->textArea($model,'mat_documentos'); ?>

                <?php echo $form->labelEx($model,'mat_otros_doc'); ?>
                <?php echo $form->textArea($model,'mat_otros_doc'); ?>
          </div>

          <div class="span3">
              <?php if(!$model->isNewRecord){ ?>

                  <?php echo $form->labelEx($model,'mat_fretiro'); ?>
                  <?php echo $form->textField($model,'mat_fretiro',array('class'=>'datepicker input-small')); ?>

                  <?php echo $form->labelEx($model,'mat_fcambio'); ?>
                  <?php echo $form->textField($model,'mat_fcambio',array('class'=>'datepicker input-small')); ?>

                  <?php echo $form->labelEx($model,'mat_estado'); ?>
                  <?php echo $form->dropDownList($model,'mat_estado',$estado,array('class' => 'input-medium')); ?>

              <?php } ?>
          </div>
      </div>

    </div>

  </div>


  <br><br><br> <br><br><br>

</div> <!-- tablable -->
 <?php $this->endWidget(); ?>

<script type="text/javascript">
$( document ).ready(function(){

    $('.datepicker').datepicker_1({
        todayBtn: "linked",
        todayHighlight: true,
        format: "yyyy-mm-dd",
        autoclose: true,
        clearBtn: true,
        language: "es",
    });

});

</script>

<script type="text/javascript">
    function num(){
        fono1 = $('#nom').val()+ "::" + $('#fono').val();
        fono2 = $('#nom2').val()+ "::" + $('#fono2').val();

        if( fono1 != "::" && fono2 == "::" ) $('#Alumno_alum_fonos_emergencia').val(fono1);
        if( fono1 == "::" && fono2 != "::" ) $('#Alumno_alum_fonos_emergencia').val(fono2);
        if( fono1 != "::" && fono2 != "::" ) $('#Alumno_alum_fonos_emergencia').val(fono1 + "//" + fono2 );
        if( fono1 == "::" && fono2 == "::" ) $('#Alumno_alum_fonos_emergencia').val("");
    }

    function fono_2(){
        $('#nom2').toggle();
        $('#fono2').toggle();
    }


    $('#nom').on('keyup', function(){ num() });
    $('#fono').on('keyup', function(){ num() });

    $('#nom2').on('keyup', function(){ num() });
    $('#fono2').on('keyup', function(){ num() });

    fono_2();
    $('#less_fono').hide();

    $('#add_fono').on('click', function(){
        fono_2();
        $('#less_fono').show();
        $('#add_fono').hide();
    });

    $('#less_fono').on('click', function(){
        fono_2();
        $('#less_fono').hide();
        $('#add_fono').show();


        $('#nom2').val("");
        $('#fono2').val("");
        num();

    });

</script>

<script type="text/javascript">

    function num_split(res){ // numeros de fono se guardan asi : nombre::fono//nombre2::fono2
        a = res.split('//');
        b= null;
        c = null;
        for (var i = 0; i < a.length; i++) {
            if( a.length/2 > i ){
                b = a[i].split('::');
             }else{
                c = a[i].split('::');
             }
        };

        $('#nom').val(b[0])
        $('#fono').val(b[1]);
        if( c != null ){
            $('#nom2').val(c[0])
            $('#fono2').val(c[1]);
        }

        if( $('#fono2').val() != null ){ // so hay datos se muestra el fono2
            fono_2();
            $('#less_fono').show();
            $('#add_fono').hide();
        }

    }

    a = $('#Alumno_alum_fonos_emergencia').val();
    if( a != ""){
        num_split(a);
    }

    $('#button_familia').on('click',function(){ $('#div_familia').toggle(); });
    $('#button_vivienda').on('click',function(){ $('#div_vivienda').toggle(); });


</script>

<script>
  $(function(){
        $('#Alumno_alum_rut').autocomplete({
           source : function( request, response ) {
           $.ajax({
                    url: "<?php echo $this->createUrl('alumno/buscar_rut_alum'); ?>",
                    dataType: "json",
                    data: { term: request.term },
                    success: function(data) {
                                response($.map(data, function(item) {
                                            return {
                                                    label: item.rut,
                                                    id: item.id_alum,
                                                    rut: item.rut,
                                                    model: item.model,
                                                    }
                                        }))


                            }

                        })
            },
                    select: function(event, ui) {


                        $.each(ui.item.model, function(index, value) {
                            id = '#Alumno_' + index;


                            $(id).val(value);
                            if( index == 'alum_ciudad' ){
                                id_ciudad = value;
                            }
                            if( index == 'alum_comuna' ){
                                id_comuna = value;
                            }

                        });

                        trans();
                        num_split($('#Alumno_alum_fonos_emergencia').val());
                        vive_con();

                        ajax_ciudad(); // se actualiza el dropdown con las ciudades
                        function asd(){
                            $( document ).ajaxComplete(function(event,xhr,settings) { //  se espera a que termine el ajax, por que sino el DOOM no  se actualiza a tiempo
                                $('#Alumno_alum_ciudad').val(id_ciudad)
                                // console.log(event)
                                if( settings.data.toLowerCase().indexOf('region') > 0 ){ //  si contiene la palabra region se llama el ajax comuna para eviar un loop
                                   // console.log(settings.url)
                                   ajax_comuna();
                                }

                            })

                            $( document ).ajaxComplete(function(event,xhr,settings) {



                                if( settings.data.toLowerCase().indexOf('ciudad') > 0 ){

                                    $(event.currentTarget).unbind('ajaxComplete');
                                    $('#Alumno_alum_comuna').val(id_comuna);

                                }
                            });
                        } asd()


                    }});
       });


</script>
