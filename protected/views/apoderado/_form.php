<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-ui.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery-ui.css">
<?php
/* @var $this ApoderadoController */
/* @var $model Apoderado */
/* @var $form CActiveForm */
?>

<div class="row">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'apoderado-form',
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
	<?php echo $form->errorSummary($model,'','',array('class'=>'alert alert-error')); ?>
</div>

<div class="span6">

	<div class="row">
		<div class="span5 offset1">
			<?php echo $form->labelEx($model,'apo_rut'); ?>
			<?php echo $form->textField($model,'apo_rut',array('size'=>12,'maxlength'=>12)); ?>
		</div>
	</div>
	<div class="row">
		<div class="span5 offset1">
			<?php echo $form->labelEx($model,'apo_nombre1'); ?>
			<?php echo $form->textField($model,'apo_nombre1',array('size'=>20,'maxlength'=>20)); ?>
		</div>
	</div>
	<div class="row">
		<div class="span5 offset1">
			<?php echo $form->labelEx($model,'apo_nombre2'); ?>
			<?php echo $form->textField($model,'apo_nombre2',array('size'=>20,'maxlength'=>20)); ?>
		</div>
	</div>
	<div class="row">
		<div class="span5 offset1">
			<?php echo $form->labelEx($model,'apo_apepat'); ?>
			<?php echo $form->textField($model,'apo_apepat',array('size'=>20,'maxlength'=>20)); ?>
		</div>
	</div>
	<div class="row">
		<div class="span5 offset1">
			<?php echo $form->labelEx($model,'apo_apemat'); ?>
			<?php echo $form->textField($model,'apo_apemat',array('size'=>20,'maxlength'=>20)); ?>
		</div>
	</div>

</div>

<div class="span6">
	
	<div class="row">
		<?php  
		if(!$model->isNewRecord){
		?>
		<div class="span5 offset1">
			<?php echo $form->labelEx($model,'apo_ano'); ?>
			<?php echo $form->dropDownList($model,'apo_ano',$ano); ?>
		</div>
		<?php 
		}
		?>

		<?php  if( !$model->isNewRecord ){  ?>
        <div class="span5 offset1">
            <?php echo $form->labelEx($model,'apo_hijo'); ?>
            <?php echo $form->hiddenField($model,'apo_hijo',array('id' => 'id_apo')); ?>
            <?php echo $form->error($model,'apo_hijo'); ?>
            <?php echo CHtml::textField('Text', '',array('id'=>'pn','placeholder' => 'Ingrese nombre hijo',))?>
            <?php echo TbHtml::button('',array('color'=> TbHtml::ALERT_COLOR_DEFAULT, 'id' =>'limpiar','style'=>'margin-bottom:10px', 'icon' => 'remove' ))?>
        </div>

       <div class="span5 offset1">
        <?php echo CHtml::textField('Text', '',
            array('id'=>'nombre',
                'placeholder' => $nom_p,
                'disabled'=>'disabled',))?>


        <?php echo CHtml::textField('Text', '',
            array('id'=>'apellido',
                'placeholder' => $ape_p,
                'disabled'=>'disabled',
                 ))?>
        </div>     
        
	    <?php } else{ ?>
	            
        <div class="span5 offset1">
            <?php echo $form->labelEx($model,'apo_hijo'); ?>
            <?php echo $form->hiddenField($model,'apo_hijo',array('id' => 'id_apo')); ?>
            <?php echo $form->error($model,'apo_hijo'); ?>
            <?php echo CHtml::textField('Text', '',array('id'=>'pn','placeholder' => 'Ingrese nombre hijo',))?>
            <?php echo TbHtml::button('',array('color'=> TbHtml::ALERT_COLOR_DEFAULT, 'id' =>'limpiar','style'=>'margin-bottom:10px', 'icon' => 'remove' ))?>
        </div>

        <div class="span5 offset1">
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
		</div>		
	</div>

</div>

<div class="span2 offset8">
	<?php echo CHtml::submitButton($model->isNewRecord ? 'Ingresar' : 'Guardar',array('class'=>'btn btn-primary')); ?>
</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<script>
            $(function(){
            $('#pn').autocomplete({
                     source : function( request, response ) {
                     $.ajax({
                        url: '<?php echo $this->createUrl('Apoderado/hijo'); ?>',
                        dataType: "json",
                        data: { term: request.term },
                        success: function(data) {
                                    response($.map(data, function(item) {
                                                return {
                                                        label: item.nombre +'/' + item.apellido,
                                                        apellido: item.apellido + ' ' + item.apellido2,
                                                        nombre: item.nombre,
                                                        id: item.id_alumno, 
                                                        }
                                            }))
                                }
                            })
                        },
                        select: function(event, ui) {
                            $("#nombre").val(ui.item.nombre)
                            $("#apellido").val(ui.item.apellido)
                            $("#id_apo").val(ui.item.id)
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