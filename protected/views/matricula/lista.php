

<?php 

$this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'alumno-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'alum_id',
		'alum_rut',
		'alum_nombres',
		'alum_apepat',
		'alum_apemat',
		'alum_f_nac',
		//'alum_direccion',
		//'alum_region',
		//'alum_ciudad',
		//'alum_comuna',
		//'alum_genero',
		//'alum_salud',
		//'alum_obs',
		//'alum_estado',
		array(
			'header'=>'Estado',
			'type'=>'raw',
			'value'=>array($this,'gridEstado'),
			'htmlOptions'=>array('style'=>'text-align: center'),
		),
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{update}',
			'buttons'=>array(
				'update'=>array(
					'label'=>'Actualizar',
					'options'=>array(
						'class'=>'btn btn-info',
					),
				),
			),
		),
	),
)); 

?>
