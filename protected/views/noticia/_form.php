

<?php
/* @var $this NoticiaController */
/* @var $model Noticia */
/* @var $form CActiveForm */
?>

<div class="row">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'noticia-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>
<div class="span12">
	<?php echo $form->errorSummary($model); ?>
</div>

<div class="span12">
	<div class="row">
		<div class="span6">

			<div class="span5 offset1">
				<?php echo $form->labelEx($model,'not_titulo'); ?>
				<?php echo $form->textField($model,'not_titulo',array('size'=>50,'maxlength'=>50)); ?>
				<?php echo $form->error($model,'not_titulo'); ?>
			</div>

			<div class="span5 offset1">
				<?php echo $form->labelEx($model,'not_fecha'); ?>
				<?php echo $form->textField($model,'not_fecha',array('size'=>50,'maxlength'=>50,'class'=>'datepicker')); ?>
				<?php echo $form->error($model,'not_fecha'); ?>
			</div>

			<div class="span5 offset1">
				<?php echo $form->labelEx($model,'not_texto'); ?>
				<?php echo $form->textArea($model,'not_texto',array('rows'=>6, 'cols'=>50)); ?>
				<?php echo $form->error($model,'not_texto'); ?>
			</div>

		</div>
		<div class="span6">

			<div class="span5 offset1">
				<?php echo $form->labelEx($model,'not_programa'); ?>
				<?php 
				echo $form->checkBoxList($model, 'not_programa', array(
					'ACTIVIDAD'=>'ACTIVIDAD',
					'ACTO'=>'ACTO',
					'DIARIO MURAL'=>'DIARIO MURAL',
					'OTRO'=>'OTRO',
				));
			    ?>
				<?php echo $form->error($model,'not_programa'); ?>
			</div>

			<div class="span5 offset1">
				<?php echo $form->labelEx($model,'not_responsable'); ?>
				<?php echo $form->textArea($model,'not_responsable',array('rows'=>6, 'cols'=>50)); ?>
				<?php echo $form->error($model,'not_responsable'); ?>
			</div>
			
		</div>
	</div>

	<div class="row">
		<div class="span2 offset8">
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Ingresar' : 'Guardar',array('class'=>'btn btn-primary')); ?>
		</div>	
	</div>

</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<br>

<script type="text/javascript">
	$('.datepicker').datepicker({
		format : 'yyyy/mm/dd',
	});
</script>