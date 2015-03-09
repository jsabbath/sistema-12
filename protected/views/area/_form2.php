<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-ui.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery-ui.css">

<?php
/* @var $this AreaController */
/* @var $model Area */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'area-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,

)); 

?>

<div class="span12">
	<div class="text-center">
		<h2>Agregar Area</h2><br/>
	</div>
</div>

<div class="span12">
	<?php echo $form->errorSummary($model); ?>
</div>

<div class="span3"></div>
<div class="span6">
	<br/><p class="text-info">Se debe agregar un <strong>Area</strong>
	 y luego seleccionar los <strong>conceptos</strong> que desea tener</p>
</div>
<div class="span3"></div>

<div class="span12">
	<div class="text-center">
		<?php echo $form->labelEx($model,'are_descripcion'); ?>
		<?php echo $form->textField($model,'are_descripcion',array('class'=>'input-xlarge','id'=>'areare','placeholder'=>'Area')); ?>
		<?php echo $form->error($model,'are_descripcion'); ?>
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Agregar' : 'Save',array(
			'class'=>'btn btn-warning',
			'id'=>'agregar',
			'ajax'=>array(
				'type'=>'POST',
				'url'=>$this->createUrl('area/conceptos'),
				'update'=>'#lista_area',
				'data'=>array('inf_d'=>$id),
				),
		)); ?>
	</div>
</div>

<div class="span12">
	<div id="lista_area">
	
	</div>
</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<script type="text/javascript">
$(function(){
    $('#areare').autocomplete({
		source : function( request, response ) {
		$.ajax({
	        url: '<?php echo $this->createUrl('area/Buscar_area'); ?>',
	        dataType: "json",
	        data: { term: request.term },
	        success: function(data) {
                response($.map(data, function(item) {
                    return {
                        label: item.nombre,
                        id: item.id,
                        nombre: item.nombre,
                        }
                	}))
	            }
	        })
		},
        select: function(event, ui) {
            $("#areare").val(ui.item.nombre)
	}});
});
</script>