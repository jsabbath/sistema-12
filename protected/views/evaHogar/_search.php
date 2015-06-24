<?php
/* @var $this EvaHogarController */
/* @var $model EvaHogar */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

                    <?php echo $form->textFieldControlGroup($model,'eh_id',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'eh_matricula',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'eh_curso',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'eh_concepto',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'eh_eva1',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'eh_eva2',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'eh_eva3',array('span'=>5)); ?>

        <div class="form-actions">
        <?php echo TbHtml::submitButton('Search',  array('color' => TbHtml::BUTTON_COLOR_PRIMARY,));?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->