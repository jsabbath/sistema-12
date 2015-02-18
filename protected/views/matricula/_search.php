<?php
/* @var $this MatriculaController */
/* @var $model Matricula */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

                    <?php echo $form->textFieldControlGroup($model,'mat_id',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'mat_ano',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'mat_numero',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'mat_fingreso',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'mat_fretiro',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'mat_fcambio',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'mat_alu_id',array('span'=>5)); ?>

        <div class="form-actions">
        <?php echo TbHtml::submitButton('Search',  array('color' => TbHtml::BUTTON_COLOR_PRIMARY,));?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->