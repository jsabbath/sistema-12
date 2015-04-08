<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/rut.js" type="text/javascript"></script> 
<script type="text/javascript">
    $(document).ready(function() {
        $('#rut').Rut({
            format_on: 'keyup',
 
        });
    })
    
</script>



<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
/* @var $form CActiveForm */
?>
<div class="row">
	<div class="span12 text-center">
		<p class="text-info">Los campos con <span class="required">*</span> son requeridos.</p>
	</div>
</div>
<div class="row">
<div class="span12">
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'usuario-form',
		// Please note: When you enable ajax validation, make sure the corresponding
		// controller action is handling ajax validation correctly.
		// There is a call to performAjaxValidation() commented in generated controller code.
		// See class documentation of CActiveForm for details on this.
		'enableAjaxValidation'=>false,
	)); ?>
	<?php echo $form->errorSummary($model); ?>
</div>
<div class="span6 offset3">
	<div class="row">
		<div class="span6">
			<?php echo $form->labelEx($model,'usu_nombre1'); ?>
			<?php echo $form->textField($model,'usu_nombre1',array('size'=>60,'maxlength'=>100)); ?>
			<?php echo $form->error($model,'usu_nombre1'); ?>
		</div>
	</div>
        
	<div class="row">
		<div class="span6">
			<?php echo $form->labelEx($model,'usu_nombre2'); ?>
			<?php echo $form->textField($model,'usu_nombre2',array('size'=>60,'maxlength'=>100)); ?>
			<?php echo $form->error($model,'usu_nombre2'); ?>
		</div>
	</div>

	<div class="row">
		<div class="span6">
			<?php echo $form->labelEx($model,'usu_apepat'); ?>
			<?php echo $form->textField($model,'usu_apepat',array('size'=>30,'maxlength'=>30)); ?>
			<?php echo $form->error($model,'usu_apepat'); ?>
		</div>
	</div>

	<div class="row">
		<div class="span6">
			<?php echo $form->labelEx($model,'usu_apemat'); ?>
			<?php echo $form->textField($model,'usu_apemat',array('size'=>30,'maxlength'=>30)); ?>
			<?php echo $form->error($model,'usu_apemat'); ?>
		</div>
	</div>

	<div class="row">
		<div class="span6">
			<?php echo $form->labelEx($model,'usu_rut'); ?>
			<?php echo $form->textField($model,'usu_rut',array( 'size'=>30,'maxlength'=>12 ,'id'=>'rut')); ?>
			<?php echo $form->error($model,'usu_rut'); ?>
		</div>
	</div>

	<div class="form-actions text-right">
		<?php echo TbHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar',array(
		    'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
		)) ?>
	</div>
</div>
        
<?php $this->endWidget(); ?>

</div><!-- form -->

