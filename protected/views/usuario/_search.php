<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

                    <?php echo $form->textFieldControlGroup($model,'usu_id',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'usu_nombres',array('span'=>5,'maxlength'=>100)); ?>

                    <?php echo $form->textFieldControlGroup($model,'usu_apepat',array('span'=>5,'maxlength'=>30)); ?>

                    <?php echo $form->textFieldControlGroup($model,'usu_apemat',array('span'=>5,'maxlength'=>30)); ?>

                    <?php echo $form->textFieldControlGroup($model,'usu_rut',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'usu_clave',array('span'=>5,'maxlength'=>8)); ?>

                    <?php echo $form->textFieldControlGroup($model,'usu_cargo',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'usu_estado',array('span'=>5)); ?>

        <div class="form-actions">
        <?php echo TbHtml::submitButton('Search',  array('color' => TbHtml::BUTTON_COLOR_PRIMARY,));?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->