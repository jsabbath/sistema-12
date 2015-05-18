<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-ui.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/sweet-alert.css">
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/sweet-alert.min.js"></script>

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
//var_dump($area);

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
		<?php echo $form->labelEx($model,'ah_descripcion'); ?>
		<?php echo $form->textField($model,'ah_descripcion',array('class'=>'input-xlarge','id'=>'areare','placeholder'=>'Area')); ?>
		<?php echo $form->error($model,'ah_descripcion'); ?>
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Agregar' : 'Save',array(
			'class'=>'btn btn-info',
			'id'=>'agregar',
			'data-toggle'=>'tooltip',
			'title'=>'Agregar area',
		)); ?>
	</div>
</div>

<div class="span12">
	<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'area-grid',
	'dataProvider'=>$area,
	'columns'=>array(
		//'are_id',
		'ah_descripcion',
		//'are_infd',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{conceptos}{delete}',
			'buttons'=>array(
				'conceptos'=>array(
					'label'=>'<i class="icon-plus"></i>',
					'url'=>'Yii::app()->createUrl("conceptoHogar/nuevo",array("id"=>$data->ah_id))',
					'options'=>array(
						'class'=>'btn btn-info',
						'data-toggle'=>'tooltip',
						'title'=>'Agregar conceptos',
					),
				),
				'delete'=>array(
					'label'=>'<i class="icon-minus"></i>',
					'options'=>array(
						'class'=>'btn btn-danger',
						'data-toggle'=>'tooltip',
						'title'=>'Eliminar area',
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
		<a class="btn btn-warning" id="alarma">Guardar</a>
		<?php //echo CHtml::link("Guardar" , array("/site/index") , array('class' => 'btn btn-warning')); ?>
	</div>
</div>
<div class="span3"></div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<script type="text/javascript">
$(function () { $("[data-toggle='tooltip']").tooltip(); });

$(function(){
    $('#areare').autocomplete({
		source : function( request, response ) {
		$.ajax({
	        url: '<?php echo $this->createUrl('areaHogar/Buscar_area'); ?>',
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
$(function() {
	$("#alarma").click( 
		function()
		{
			swal({   title: "Está seguro?",   
			text: "Usted está finalizando la creación de un informe de desarrollo!",   
			type: "warning",   showCancelButton: true,   
			confirmButtonColor: "#DD6B55",   
			confirmButtonText: "Si, Guardar!",   
			closeOnConfirm: false 
		}, 
			function(){
				window.location.href = "<?php echo Yii::app()->createUrl('site/index'); ?>";
			});
		}
	);
});

</script>