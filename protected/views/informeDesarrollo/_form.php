<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-ui.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery-ui.css">

<?php
/* @var $this InformeDesarrolloController */
/* @var $model InformeDesarrollo */
/* @var $form CActiveForm */
?>


<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'informe-desarrollo-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); 

?>
<div class="span12">
		<?php echo $form->errorSummary($model); ?><br/>
</div>

<div class="span2"></div>
<div class="span8">
	<div class="text-center">
		<p>Progreso</p>
		<div class="progress progress-success progress-striped active">
  			<div class="bar" style="width: 10%;"></div>
		</div>
	</div>
</div>
<div class="span2"></div>

<div class="span3"></div>
<div class="span6">
	<div class="text-center">
		<br/><p class="text-info">Para crear un <strong>Informe de desarrollo</strong> primero se debe ingresar un nombre que lo identifique.
		posteriormente se agregan las areas y conceptos.</p>
	</div>
</div>
<div class="span3"></div>

<div class="span12">
	<div class="text-center">
		<?php echo $form->labelEx($model,'id_descripcion'); ?>
		<?php echo $form->textField($model,'id_descripcion',array('size'=>20,'maxlength'=>20,'class'=>'input-xlarge')); ?>
		<?php echo $form->error($model,'id_descripcion'); ?>
	</div>
</div>

<div class="span8"></div>
<div class="span4">
	<br/><br/><?php echo CHtml::submitButton(
	$model->isNewRecord ? 'Siguiente' : 'Save',
	array('class'=>'btn btn-primary')); ?>
</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php /*
<div class="span12">
	<?php echo $form->labelEx($area,'are_descripcion'); ?>
	<?php echo $form->dropDownList($area,'are_descripcion',$area_list,array('prompt'=>'Seleccione area',
		'id'=>'lista_area',
		'ajax'=>array(
			'type'=>'POST',
			'url'=>CController::createUrl('informeDesarrollo/listaConcepto'),
			'data'=>array('id'=>'js:getNombre'),
			'update'=>'#lista_concepto',
		),
	)); ?>
	<?php echo $form->error($area,'are_descripcion'); ?>
</div>

<div id="lista_concepto">
	
</div>
*/
?>


<script type="text/javascript">
function getNombre(){ 
    var value= $("#lista_area").val();
    if( value != "")
        return value;
}

</script>