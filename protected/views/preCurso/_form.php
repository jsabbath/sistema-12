<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-ui.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery-ui.css">
<?php
/* @var $this PreCursoController */
/* @var $model PreCurso */
/* @var $form CActiveForm */
?>

<div class="row">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pre-curso-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

<div class="span12 text-center">
	<p class="text-info">Los campos con <span class="required">*</span> son obligatorios.</p>
</div>
<div class="span12">
	<?php echo $form->errorSummary($model); ?>
</div>

<div class="span6">
	<div class="row">
		<div class="span5 offset1">
			<?php echo $form->labelEx($model,'pre_ano'); ?>
			<?php echo $form->textField($model,'pre_ano',array('disabled'=>true,'placeholder'=>$ano)); ?>
		</div>
	</div>
	<div class="row">
		<div class="span5 offset1">
			<?php echo $form->labelEx($model,'pre_nivel'); ?>
			<?php echo $form->dropDownList($model,'pre_nivel',$nivel); ?>
		</div>
	</div>
	<div class="row">
		<div class="span5 offset1">
			<?php echo $form->labelEx($model,'pre_letra'); ?>
			<?php echo $form->dropDownList($model,'pre_letra',$letra); ?>
		</div>
	</div>	

	<div class="row">
	 	<div class="span5 offset1">
            <?php echo $form->labelEx($model,'pre_inf'); ?>
            <?php echo $form->dropDownList($model,'pre_inf', $informe, array('prompt' => '-Seleccione Informe-',));?>
        </div>
    </div>
</div>

<div class="span6">
	<div class="row">
		<div class="span5 offset1">
			<?php echo $form->labelEx($model,'pre_jornada'); ?>
			<?php echo $form->dropDownList($model,'pre_jornada',$jornada); ?>
		</div>
	</div>
	<div class="row">
		<div class="span5 offset1">
			<?php  if( !$model->isNewRecord ){  ?>
            <div class="row">
                <div class="span5">
                	<?php echo $form->labelEx($model,'pre_pjefe'); ?>
	                <?php echo $form->hiddenField($model,'pre_pjefe',array('id' => 'id_pjefe')); ?>
	                <?php echo $form->error($model,'pre_pjefe'); ?>
	                <?php echo CHtml::textField('Text', '',array('id'=>'pn','placeholder' => 'Ingrese nombre Profesor',))?>
	                <?php echo TbHtml::button('',array('color'=> TbHtml::ALERT_COLOR_DEFAULT, 'id' =>'limpiar','style'=>'margin-bottom:10px', 'icon' => 'remove' ))?>
                </div>
            </div>

           	<div class="row">
            	<div class="span5">
            		<?php echo CHtml::textField('Text', '',
                		array('id'=>'nombre',
                    	'placeholder' => $nom_p,
                    	'disabled'=>'disabled',
                    ))?>
            	</div>
            	<div class="span5">
            		<?php echo CHtml::textField('Text', '',
                		array('id'=>'apellido',
                    	'placeholder' => $ape_p,
                    	'disabled'=>'disabled',
                    ))?>
            	</div>
            </div>     
        
        <?php } else{ ?>
            <div class="row">
                <div class="span5">
                	<?php echo $form->labelEx($model,'pre_pjefe'); ?>
	                <?php echo $form->hiddenField($model,'pre_pjefe',array('id' => 'id_pjefe')); ?>
	                <?php echo $form->error($model,'pre_pjefe'); ?>
	                <?php echo CHtml::textField('Text', '',array('id'=>'pn','placeholder' => 'Ingrese nombre Profesor',))?>
	                <?php echo TbHtml::button('',array('color'=> TbHtml::ALERT_COLOR_DEFAULT, 'id' =>'limpiar','style'=>'margin-bottom:10px', 'icon' => 'remove' ))?>
                </div>
            </div>

            <div class="row">
                <div class="span5">
                	<?php echo CHtml::textField('Text', '',
                    	array('id'=>'nombre',
                        'placeholder' => 'Nombres',
                        'disabled'=>'disabled',
                    ))?>
                </div>
            </div>

            <div class="row">
            	<siv class="span5">
            		<?php echo CHtml::textField('Text', '',
                    	array('id'=>'apellido',
                        'placeholder' => 'Apellidos',
                        'disabled'=>'disabled',
                    ))?>
            	</siv>
            </div>     
        
        
        <?php } ?>
		</div>
	</div>
	<div class="row">
		<div class="span2 offset2 text-center">
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Ingresar' : 'Guardar',array('class'=>'btn btn-primary')); ?>
		</div>
	</div>
</div>
	
<?php $this->endWidget(); ?>
	
</div><!-- form -->
<br>

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
                    id: item.id_cruge, 
                }
	        }))
	    }
	})
	},
    select: function(event, ui) {
        $("#nombre").val(ui.item.nombre)
        $("#apellido").val(ui.item.apellido)
        $("#id_pjefe").val(ui.item.id)
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