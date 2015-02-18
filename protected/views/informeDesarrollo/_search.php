<?php
/* @var $this InformeDesarrolloController */
/* @var $model InformeDesarrollo */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

                    <?php echo $form->textFieldControlGroup($model,'id_id',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'id_descripcion',array('span'=>5,'maxlength'=>20)); ?>

        <div class="form-actions">
        <?php echo TbHtml::submitButton('Search',  array('color' => TbHtml::BUTTON_COLOR_PRIMARY,));?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->