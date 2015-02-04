<?php
/* @var $this AlumnoController */
/* @var $model Alumno */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

                    <?php echo $form->textFieldControlGroup($model,'alum_id',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'alum_rut',array('span'=>5,'maxlength'=>12)); ?>

                    <?php echo $form->textFieldControlGroup($model,'alum_nombres',array('span'=>5,'maxlength'=>100)); ?>

                    <?php echo $form->textFieldControlGroup($model,'alum_apepat',array('span'=>5,'maxlength'=>50)); ?>

                    <?php echo $form->textFieldControlGroup($model,'alum_apemat',array('span'=>5,'maxlength'=>50)); ?>

                    <?php echo $form->textFieldControlGroup($model,'alum_f_nac',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'alum_direccion',array('span'=>5,'maxlength'=>100)); ?>

                    <?php echo $form->textFieldControlGroup($model,'alum_region',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'alum_ciudad',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'alum_comuna',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'alum_genero',array('span'=>5)); ?>

                    <?php echo $form->textAreaControlGroup($model,'alum_salud',array('rows'=>6,'span'=>8)); ?>

                    <?php echo $form->textAreaControlGroup($model,'alum_obs',array('rows'=>6,'span'=>8)); ?>

                    <?php echo $form->textFieldControlGroup($model,'alum_estado',array('span'=>5)); ?>

        <div class="form-actions">
        <?php echo TbHtml::submitButton('Search',  array('color' => TbHtml::BUTTON_COLOR_PRIMARY,));?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->