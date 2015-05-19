<?php
/* @var $this PromedioAnualController */
/* @var $model PromedioAnual */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

                    <?php echo $form->textFieldControlGroup($model,'PRO_ID',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'PRO_PROM_1',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'PRO_PROM_2',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'PRO_PROM_3',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'PRO_NOMBRE_ASIGNATURA',array('span'=>5,'maxlength'=>50)); ?>

        <div class="form-actions">
        <?php echo TbHtml::submitButton('Search',  array('color' => TbHtml::BUTTON_COLOR_PRIMARY,));?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->