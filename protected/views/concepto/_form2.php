<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-ui.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery-ui.css">

<?php
/* @var $this ConceptoController */
/* @var $model Concepto */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'concepto-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
));
//var_dump($inf);
?>

<div class="span12">
	<div class="text-center">
		<h2>Agregar Concepto</h2>
	</div>
</div>

<div class="span3"></div>
<div class="span6">
	<div class="text-center">
		<br/><p class="text-info">Se debe agregar los <strong>Conceptos</strong>
	 	que desea tener en el <strong>Area</strong> seleccionada</p><br/>
	</div>
</div>
<div class="span3"></div>

<div class="span12">
	<div class="text-center">
		<?php echo $form->labelEx($model,'con_descripcion'); ?>
		<?php echo $form->textField($model,'con_descripcion',array('class'=>'input-xlarge','id'=>'concon','placeholder'=>'Concepto')); ?>
		<?php echo $form->error($model,'con_descripcion'); ?>
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Agregar' : 'Save',array(
			'class'=>'btn btn-info',
			'id'=>'agregar',
			'data-toggle'=>'tooltip',
			'title'=>'Agregar concepto',
		)); ?>
	</div>
</div>

<div class="span12">
	<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'area-grid',
	'dataProvider'=>$concepto,
	'columns'=>array(
		//'con_id',
		'con_descripcion',
		//'con_area',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{delete}',
			'buttons'=>array(
				'delete'=>array(
					'label'=>'<i class="icon-minus"></i>',
					'options'=>array(
						'class'=>'btn btn-danger',
						'data-toggle'=>'tooltip',
						'title'=>'Eliminar concepto',
					),
				),
			),
		),
	),
)); ?>
</div>

<div class="span3"></div>
<div class="span6">
	<div class="text-right">
		<?php echo CHtml::link("Regresar" , array("/area/nuevo","id"=>$inf[0]->are_infd) , array('class' => 'btn btn-warning')); ?>
	</div>
</div>
<div class="span3"></div><br/>
<?php $this->endWidget(); ?>

</div><!-- form -->

<script type="text/javascript">
$(function () { $("[data-toggle='tooltip']").tooltip(); });

$(function(){
    $('#concon').autocomplete({
		source : function( request, response ) {
		$.ajax({
	        url: '<?php echo $this->createUrl('concepto/Buscar_concepto'); ?>',
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
            $("#concon").val(ui.item.nombre)
	}});
});
</script>