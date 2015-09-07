

<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
/* @var $form CActiveForm */
?>
<div class="form">
<div class="row">
	<div class="span12 text-center">
		<p class="text-info">Los campos con <span class="required">*</span> son requeridos.</p>
	</div>
</div>
<div class="row">

	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'usuario-form',
		// Please note: When you enable ajax validation, make sure the corresponding
		// controller action is handling ajax validation correctly.
		// There is a call to performAjaxValidation() commented in generated controller code.
		// See class documentation of CActiveForm for details on this.
		'enableAjaxValidation'=>false,
			'htmlOptions' => array('enctype' => 'multipart/form-data'),
	)); ?>
	<?php echo $form->errorSummary($model,'','',array('class'=>'alert alert-error')); ?>

<div class="span6 offset3">

	<div class="row">
			<?php echo $form->labelEx($model,'usu_rut'); ?>
			<?php echo $form->textField($model,'usu_rut',array( 'size'=>30,'maxlength'=>12 ,'id'=>'rut')); ?>
	</div>

	<div class="row">
			<?php echo $form->labelEx($model,'usu_nombre1'); ?>
			<?php echo $form->textField($model,'usu_nombre1',array('size'=>60,'maxlength'=>100)); ?>
	</div>
        
	<div class="row">
			<?php echo $form->labelEx($model,'usu_nombre2'); ?>
			<?php echo $form->textField($model,'usu_nombre2',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
			<?php echo $form->labelEx($model,'usu_apepat'); ?>
			<?php echo $form->textField($model,'usu_apepat',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
			<?php echo $form->labelEx($model,'usu_apemat'); ?>
			<?php echo $form->textField($model,'usu_apemat',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<?php if($model->isNewRecord){ ?>
		<div class="row">
			<?php echo $form->labelEx($model,'usu_firma'); ?>
			<?php echo $form->fileField($model,'usu_firma'); ?>
		</div>
	<?php }else{ ?>
		<?php echo TbHtml::button('Cambiar firma',array('color'=>TbHtml::BUTTON_COLOR_WARNING, 'id'=>'firma')) ?>

		<div class="row" id="lafirma" style="display:none">
			<?php echo $form->labelEx($model,'usu_firma'); ?>
			<?php echo $form->fileField($model,'usu_firma'); ?>
		</div>

	<?php } ?>

	<div class="form-actions text-right">
		<?php echo TbHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar',array(
		    'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
		)) ?>
	</div>
</div>
        
<?php $this->endWidget(); ?>

</div><!-- form -->
</div>

<script type="text/javascript">

$("#firma").click(function(){
	$("#firma").hide();
    $("#lafirma").show();
});

</script>