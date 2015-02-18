<?php
/* @var $this MatriculaController */
/* @var $model Matricula */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'matricula-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	
	<div class="row">
		<?php echo $form->labelEx($model,'mat_cur'); ?>
		<?php echo $form->textField($model,'mat_cur',array('placeholder'=> $model->mat_id,'disabled'=> 'true')); ?>
		<?php echo $form->error($model,'mat_cur'); ?>
	</div>


    <div class="row">
		<?php echo $form->labelEx($model,'Apellido Paterno'); ?>
		<?php echo $form->textField($model,'mat_cur',array('placeholder'=> $apepat,'disabled'=> 'true')); ?>
		
	</div>
        
    <div class="row">
		<?php echo $form->labelEx($model,'Apellido Materno'); ?>
		<?php echo $form->textField($model,'mat_cur',array('placeholder'=> $apemat,'disabled'=> 'true')); ?>
		
	</div>
        
        

	<div class="row">
		<?php echo $form->labelEx($model,'mat_fretiro'); ?>
		<?php echo $form->dateField($model,'mat_fretiro',array()); ?>
		<?php echo $form->error($model,'mat_fretiro'); ?>
	</div>

	
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->