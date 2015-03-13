<?php
/* @var $this NotasController */
/* @var $model Notas */
/* @var $form TbActiveForm */
?>

<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'notas-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

    <p class="help-block">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

            <?php echo $form->textFieldControlGroup($model,'not_periodo',array('span'=>5)); ?>

            <?php echo $form->textFieldControlGroup($model,'not_ano',array('span'=>5)); ?>

            <?php echo $form->textFieldControlGroup($model,'not_mat',array('span'=>5)); ?>

            <?php echo $form->textFieldControlGroup($model,'not_asig',array('span'=>5)); ?>

            <?php echo $form->textFieldControlGroup($model,'not_01',array('span'=>5)); ?>

            <?php echo $form->textFieldControlGroup($model,'not_02',array('span'=>5)); ?>

            <?php echo $form->textFieldControlGroup($model,'not_03',array('span'=>5)); ?>

            <?php echo $form->textFieldControlGroup($model,'not_04',array('span'=>5)); ?>

            <?php echo $form->textFieldControlGroup($model,'not_05',array('span'=>5)); ?>

            <?php echo $form->textFieldControlGroup($model,'not_06',array('span'=>5)); ?>

            <?php echo $form->textFieldControlGroup($model,'not_07',array('span'=>5)); ?>

            <?php echo $form->textFieldControlGroup($model,'not_08',array('span'=>5)); ?>

            <?php echo $form->textFieldControlGroup($model,'not_09',array('span'=>5)); ?>

            <?php echo $form->textFieldControlGroup($model,'not_10',array('span'=>5)); ?>

            <?php echo $form->textFieldControlGroup($model,'not_11',array('span'=>5)); ?>

            <?php echo $form->textFieldControlGroup($model,'not_12',array('span'=>5)); ?>

            <?php echo $form->textFieldControlGroup($model,'not_13',array('span'=>5)); ?>

            <?php echo $form->textFieldControlGroup($model,'not_14',array('span'=>5)); ?>

            <?php echo $form->textFieldControlGroup($model,'not_15',array('span'=>5)); ?>

            <?php echo $form->textFieldControlGroup($model,'not_16',array('span'=>5)); ?>

            <?php echo $form->textFieldControlGroup($model,'not_17',array('span'=>5)); ?>

            <?php echo $form->textFieldControlGroup($model,'not_18',array('span'=>5)); ?>

            <?php echo $form->textFieldControlGroup($model,'not_19',array('span'=>5)); ?>

            <?php echo $form->textFieldControlGroup($model,'not_20',array('span'=>5)); ?>

            <?php echo $form->textFieldControlGroup($model,'not_21',array('span'=>5)); ?>

            <?php echo $form->textFieldControlGroup($model,'not_22',array('span'=>5)); ?>

            <?php echo $form->textFieldControlGroup($model,'not_23',array('span'=>5)); ?>

            <?php echo $form->textFieldControlGroup($model,'not_24',array('span'=>5)); ?>

            <?php echo $form->textFieldControlGroup($model,'not_25',array('span'=>5)); ?>

            <?php echo $form->textFieldControlGroup($model,'not_26',array('span'=>5)); ?>

            <?php echo $form->textFieldControlGroup($model,'not_27',array('span'=>5)); ?>

            <?php echo $form->textFieldControlGroup($model,'not_28',array('span'=>5)); ?>

            <?php echo $form->textFieldControlGroup($model,'not_29',array('span'=>5)); ?>

            <?php echo $form->textFieldControlGroup($model,'not_30',array('span'=>5)); ?>

        <div class="form-actions">
        <?php echo TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array(
		    'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
		    'size'=>TbHtml::BUTTON_SIZE_LARGE,
		)); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->