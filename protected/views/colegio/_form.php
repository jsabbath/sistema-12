<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-ui.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery-ui.css">
<?php
/* @var $this ColegioController */
/* @var $model Colegio */
/* @var $form CActiveForm */

if ( empty($nom_dir) AND empty($ape_dir) ){
	$nom_dir = 'nombre';
	$ape_dir = 'apelldio';
}



?>

<div class="row">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'colegio-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>
	<div class="span12 text-center">
		<p class="text-info">Los campos con <span class="required">*</span> son requeridos.</p>
	</div>

	<div class="span12">
		<?php echo $form->errorSummary($model,'','',array('class'=>'alert alert-error')); ?>
	</div>

	<div class="span5 offset1">
		<div class="row">
			<div class="span6">
				<?php echo $form->labelEx($model,'col_rolRBD'); ?>
				<?php echo $form->textField($model,'col_rolRBD',array('size'=>20,'maxlength'=>20)); ?>
			</div>
		</div>

		<div class="row">
			<div class="span6">
				<?php echo $form->labelEx($model,'col_nombre_colegio'); ?>
				<?php echo $form->textField($model,'col_nombre_colegio',array('size'=>50,'maxlength'=>50)); ?>
			</div>
		</div>

		<div class="row">
			<div class="span6">
				<?php echo $form->labelEx($model,'col_letra'); ?>
				<?php echo $form->textField($model,'col_letra',array('size'=>1,'maxlength'=>1)); ?>
			</div>
		</div>

		<div class="row">
			<div class="span6">
				<?php echo $form->labelEx($model,'col_numero'); ?>
				<?php echo $form->textField($model,'col_numero'); ?>
			</div>
		</div>

		<div class="row">
			<div class="span6">
				<?php echo $form->labelEx($model,'col_ano'); ?>
				<?php echo $form->dropDownList($model,'col_ano',$anos,array('prompt'=>'seleccione año')); ?>
			</div>
		</div>

		<div class="row">
			<div class="span6">
				<?php echo $form->labelEx($model,'col_periodo'); ?>
				<?php echo $form->dropDownList($model,'col_periodo',$periodo,array('prompt'=>'seleccione tipo periodo')); ?>
			</div>
		</div>



							 <?php  if( !$model->isNewRecord ){  ?>
					            <div class="row">
					               	<?php echo $form->labelEx($model,'col_nombre_director'); ?>
									<?php echo $form->hiddenField($model,'col_nombre_director',array('id' => 'id_dir')); ?>

					                <?php echo CHtml::textField('Text', '',array('id'=>'pn','placeholder' => 'Ingrese nombre Director',))?>
					                <?php echo TbHtml::button('',array('color'=> TbHtml::ALERT_COLOR_DEFAULT, 'id' =>'limpiar','style'=>'margin-bottom:10px', 'icon' => 'remove' ))?>
					            </div>

					           <div class="row">
					            <?php echo CHtml::textField('Text', '',
					                array('id'=>'nombre',
					                    'placeholder' => $nom_dir,
					                    'disabled'=>'disabled',))?>


					            <?php echo CHtml::textField('Text', '',
					                array('id'=>'apellido',
					                    'placeholder' => $ape_dir,
					                    'disabled'=>'disabled',
					                     ))?>
					            </div>

					        <?php } else{ ?>
					            <div class="row">
					               	<?php echo $form->labelEx($model,'col_nombre_director'); ?>
									<?php echo $form->hiddenField($model,'col_nombre_director',array('id' => 'id_dir')); ?>

					                <?php echo CHtml::textField('Text', '',array('id'=>'pn','placeholder' => 'Ingrese nombre Director',))?>
					                <?php echo TbHtml::button('',array('color'=> TbHtml::ALERT_COLOR_DEFAULT, 'id' =>'limpiar','style'=>'margin-bottom:10px', 'icon' => 'remove' ))?>
					            </div>


					            <div class="row">
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


					        <?php } ?>


		<div class="row">
			<div class="span6">
				<?php echo $form->labelEx($model,'col_director_email'); ?>
				<?php echo $form->textField($model,'col_director_email',array('size'=>60,'maxlength'=>255)); ?>
			</div>
		</div>

		<div class="row">
			<div class="span6">
				<?php echo $form->labelEx($model,'col_encargado_actas'); ?>
				<?php echo $form->textField($model,'col_encargado_actas',array('size'=>60,'maxlength'=>255)); ?>
			</div>
		</div>

		<div class="row">
			<div class="span6">
				<?php echo $form->labelEx($model,'col_fecha_resol_rec_ofic'); ?>
				<?php echo $form->textField($model,'col_fecha_resol_rec_ofic',array('class'=>'datepicker')); ?>
			</div>
		</div>

		<div class="row">
			<div class="span6">
				<?php echo $form->labelEx($model,'col_numero_resol_rec_ofic'); ?>
				<?php echo $form->textField($model,'col_numero_resol_rec_ofic'); ?>
			</div>
		</div>

		<div class="row">
			<div class="span6">
				<?php echo $form->labelEx($model,'col_lema'); ?>
				<?php echo $form->textArea($model,'col_lema',array('rows'=>6, 'cols'=>50)); ?>
			</div>
		</div>

		<div class="row">
			<div class="span6">
				<?php echo $form->labelEx($model,'col_mision'); ?>
				<?php echo $form->textArea($model,'col_mision',array('rows'=>6, 'cols'=>50)); ?>
			</div>
		</div>

		<div class="row">
			<div class="span6">
				<?php echo $form->labelEx($model,'col_vision'); ?>
				<?php echo $form->textArea($model,'col_vision',array('rows'=>6, 'cols'=>50)); ?>
			</div>
		</div>

		<div class="row">
			<div class="span6">
				<?php echo $form->labelEx($model,'ano_promocion_evaluacion'); ?>
				<?php echo $form->dropDownList($model,'ano_promocion_evaluacion',$anos,array('prompt'=>'Seleccione año')); ?>
			</div>
		</div>
	</div>


	<div class="span5 offset1">
		<div class="row">
			<div class="span6">
				<?php echo $form->labelEx($model,'col_area'); ?>
				<?php echo $form->dropDownList($model,'col_area',array('URBANA','RURAL'),array('prompt'=>'seleccione tipo area')); ?>
			</div>
		</div>

		<div class="row">
			<div class="span6">
				<?php echo $form->labelEx($model,'col_regimen'); ?>
				<?php echo $form->dropDownList($model,'col_regimen',array('DIURNO','VESPERTINO'),array('prompt'=>'seleccione tipo regimen')); ?>
			</div>
		</div>

		<div class="row">
			<div class="span6">
				<?php echo $form->labelEx($model,'col_logo'); ?>
				<?php echo $form->fileField($model,'col_logo'); ?>
			</div>
		</div>

		<div class="row">
			<div class="span6">
				<?php echo $form->labelEx($model,'col_razon_social'); ?>
				<?php echo $form->textField($model,'col_razon_social',array('size'=>60,'maxlength'=>255)); ?>
			</div>
		</div>

		<div class="row">
			<div class="span6">
				<?php echo $form->labelEx($model,'col_rut_razon_social'); ?>
				<?php echo $form->textField($model,'col_rut_razon_social',array('size'=>20,'maxlength'=>20)); ?>
			</div>
		</div>

		<div class="row">
			<div class="span6">
				<?php echo $form->labelEx($model,'col_fecha_primer'); ?>
				<?php echo $form->textField($model,'col_fecha_primer',array('class'=>'datepicker')); ?>
			</div>
		</div>

		<div class="row">
			<div class="span6">
				<?php echo $form->labelEx($model,'col_fecha_segundo'); ?>
				<?php echo $form->textField($model,'col_fecha_segundo',array('class'=>'datepicker')); ?>
			</div>
		</div>

		<div class="row">
			<div class="span6">
				<?php echo $form->labelEx($model,'col_fecha_tercer'); ?>
				<?php echo $form->textField($model,'col_fecha_tercer',array('class'=>'datepicker')); ?>
			</div>
		</div>

		<div class="row">
			<div class="span6">
				<?php echo $form->labelEx($model,'col_direccion'); ?>
				<?php echo $form->textField($model,'col_direccion',array('size'=>60,'maxlength'=>255)); ?>
			</div>
		</div>

		<div class="row">
			<div class="span6">
				<?php echo $form->labelEx($model,'col_region'); ?>
				<?php echo $form->textField($model,'col_region',array('size'=>50,'maxlength'=>50)); ?>
			</div>
		</div>

		<div class="row">
			<div class="span6">
				<?php echo $form->labelEx($model,'col_ciudad'); ?>
				<?php echo $form->textField($model,'col_ciudad',array('size'=>50,'maxlength'=>50)); ?>
			</div>
		</div>

		<div class="row">
			<div class="span6">
				<?php echo $form->labelEx($model,'col_colegio_email'); ?>
				<?php echo $form->textField($model,'col_colegio_email',array('size'=>60,'maxlength'=>255)); ?>
			</div>
		</div>

		<div class="row">
			<div class="span6">
				<?php echo $form->labelEx($model,'col_telefono'); ?>
				<?php echo $form->textField($model,'col_telefono'); ?>
			</div>
		</div>

		<div class="row">
			<div class="span6">
				<?php echo $form->labelEx($model,'col_nota_minima'); ?>
				<?php echo $form->textField($model,'col_nota_minima'); ?>
			</div>
		</div>

		<div class="row">
			<div class="span6">
				<?php echo $form->labelEx($model,'col_nota_maxima'); ?>
				<?php echo $form->textField($model,'col_nota_maxima'); ?>
			</div>
		</div>

		<div class="row">
			<div class="span6">
				<?php echo $form->labelEx($model,'col_nota_aprovacion'); ?>
				<?php echo $form->textField($model,'col_nota_aprovacion'); ?>
			</div>
		</div>

		<div class="row">
			<div class="span6">
				<?php echo $form->labelEx($model,'col_aproximacion'); ?>
				<?php echo $form->dropDownList($model,'col_aproximacion',array('APROXIMAR','TRUNCAR'),array('prompt'=>'seleccione tipo promedio')); ?>
			</div>
		</div>

		<div class="row">
			<div class="span6">
				<?php echo $form->labelEx($model,'numero_plan_programa'); ?>
				<?php echo $form->textField($model,'numero_plan_programa'); ?>
			</div>
		</div>

		<div class="row">
			<div class="span6">
				<?php echo $form->labelEx($model,'ano_plan_programa'); ?>
				<?php echo $form->dropDownList($model,'ano_plan_programa',$anos,array('prompt'=>'Seleccione año')); ?>
			</div>
		</div>

		<div class="row">
			<div class="span6">
				<?php echo $form->labelEx($model,'numero_decreto_supremo'); ?>
				<?php echo $form->textField($model,'numero_decreto_supremo'); ?>
			</div>
		</div>

		<div class="row">
			<div class="span6">
				<?php echo $form->labelEx($model,'ano_decreto_supremo'); ?>
				<?php echo $form->dropDownList($model,'ano_decreto_supremo',$anos,array('prompt'=>'Seleccione año')); ?>
			</div>
		</div>

		<div class="row">
			<div class="span6">
				<?php echo $form->labelEx($model,'numero_promocion_evaluacion'); ?>
				<?php echo $form->textField($model,'numero_promocion_evaluacion'); ?>
			</div>
		</div>
	</div>

	<div class="span2 offset8">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Guardar' : 'Guardar',array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<br>

<script type="text/javascript">

$('.datepicker').datepicker({
	todayHighlight: true,
    format: 'yyyy/mm/dd',
    autoclose: true,
    clearBtn: true,
    language: "es",
});


</script>


    <script>
            $(function(){
            $('#pn').autocomplete({
                     source : function( request, response ) {
                     $.ajax({
                        url: '<?php echo $this->createUrl('colegio/Buscar_dir'); ?>',
                        dataType: "json",
                        data: { term: request.term },
                        success: function(data) {
                                    response($.map(data, function(item) {
                                                return {
                                                        label: item.nombre +'/' + item.apellido,
                                                        apellido: item.apellido + ' ' + item.apellido2,
                                                        nombre: item.nombre + ' ' + item.nombre2,
                                                        id: item.id_usu,
                                                        }
                                            }))
                                }
                            })
                        },
                        select: function(event, ui) {
                            $("#nombre").val(ui.item.nombre)
                            $("#apellido").val(ui.item.apellido)
                            $("#id_dir").val(ui.item.id)
                        },

                    })
             });
    </script>


    <script>
        $("#limpiar").on('click', function() {
                        $("#nombre").val(""),
                        $("#apellido").val(""),
                        $("#pn").val("")
                    });
    </script>
