<?php
/* @var $this ListaCursoController */
/* @var $model ListaCurso */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

                    <?php echo $form->textFieldControlGroup($model,'list_id',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'list_mat_id',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'list_posicion',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'list_curso_id',array('span'=>5)); ?>

        <div class="form-actions">
        <?php echo TbHtml::submitButton('Search',  array('color' => TbHtml::BUTTON_COLOR_PRIMARY,));?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->