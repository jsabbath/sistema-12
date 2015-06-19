<div class="row">
	<div class="span12 text-center">
		<h2>Informe Personalidad</h2>
	</div>
	<div class="span12 text-center">
		<p class="text-info">Aqui se puede generar el <strong>Informe de Personalidad</strong> para cualquier <strong>Alumno</strong> seleccionado</p>
		<br>
	</div>
</div>


<?php 

if( $p == "SEMESTRE" ){

	$this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'usuario-grid',
	'type' => TbHtml::GRID_TYPE_BORDERED,
	'dataProvider'=>$model->buscar($ano),
	'filter'=>$model,
	'columns'=>array(
		array(
			'name'=>'matAlu.alum_rut',
			'type'=>'raw',
			'value'=>'$data->matAlu->alum_rut',
		),
		array(
			'name'=>'matAlu.alum_nombres',
			'type'=>'raw',
			'value'=>'$data->matAlu->alum_nombres',
			'filter'=>CHtml::activeTextField($model,'alumno_nombres'),
		),
		array(
			'name'=>'matAlu.alum_apepat',
			'type'=>'raw',
			'value'=>'$data->matAlu->alum_apepat',
			'filter'=>CHtml::activeTextField($model,'alumno_apepat'),
		),
		array(
			'name'=>'matAlu.alum_apemat',
			'type'=>'raw',
			'value'=>'$data->matAlu->alum_apemat',
			'filter'=>CHtml::activeTextField($model,'alumno_apemat'),
		),
		array(
			'header'=>'Curso',
			'type'=>'raw',
			'value'=>array($this,'obtenerCurso'),
		),
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{periodo1} {periodo2}',
			'buttons'=>array(
				'periodo1'=>array(
					'label'=>'<i class="icon-list-alt"></i>',
					'url'=>'Yii::app()->createUrl("evaluacion/certificado_perso_alu",array("id"=>$data->mat_id,"p" => 1))',
					'options'=>array(
						'class'=>"btn btn-default",
						'data-toggle'=>'tooltip',
						'title'=>'Periodo 1',
					),
				),
				'periodo2'=>array(
					'label'=>'<i class="icon-list-alt"></i>',
					'url'=>'Yii::app()->createUrl("evaluacion/certificado_perso_alu",array("id"=>$data->mat_id,"p" => 2))',
					'options'=>array(
						'class'=>"btn btn-success",
						'data-toggle'=>'tooltip',
						'title'=>'Periodo 2',
					),
				),
				
			),
		),
	),
)); 
}else{

	$this->widget('bootstrap.widgets.TbGridView', array(
		'id'=>'usuario-grid',
		'type' => TbHtml::GRID_TYPE_BORDERED,
		'dataProvider'=>$model->buscar($ano),
		'filter'=>$model,
		'columns'=>array(
			array(
				'name'=>'matAlu.alum_rut',
				'type'=>'raw',
				'value'=>'$data->matAlu->alum_rut',
			),
			array(
				'name'=>'matAlu.alum_nombres',
				'type'=>'raw',
				'value'=>'$data->matAlu->alum_nombres',
				'filter'=>CHtml::activeTextField($model,'alumno_nombres'),
			),
			array(
				'name'=>'matAlu.alum_apepat',
				'type'=>'raw',
				'value'=>'$data->matAlu->alum_apepat',
				'filter'=>CHtml::activeTextField($model,'alumno_apepat'),
			),
			array(
				'name'=>'matAlu.alum_apemat',
				'type'=>'raw',
				'value'=>'$data->matAlu->alum_apemat',
				'filter'=>CHtml::activeTextField($model,'alumno_apemat'),
			),
			array(
				'header'=>'Curso',
				'type'=>'raw',
				'value'=>array($this,'obtenerCurso'),
			),
			array(
				'class'=>'bootstrap.widgets.TbButtonColumn',
				'template'=>'{periodo1} {periodo2} {periodo3}',
				'buttons'=>array(
					'periodo1'=>array(
						'label'=>'<i class="icon-list-alt"></i>',
						'url'=>'Yii::app()->createUrl("evaluacion/certificado_perso_alu",array("id"=>$data->mat_id,"p" => 1))',
						'options'=>array(
							'class'=>"btn btn-success",
							'data-toggle'=>'tooltip',
							'title'=>'Periodo 1',
						),
					),
					'periodo2'=>array(
						'label'=>'<i class="icon-list-alt"></i>',
						'url'=>'Yii::app()->createUrl("evaluacion/certificado_perso_alu",array("id"=>$data->mat_id,"p" => 2))',
						'options'=>array(
							'class'=>"btn btn-success",
							'data-toggle'=>'tooltip',
							'title'=>'Periodo 2',
						),
					),
					'periodo3'=>array(
						'label'=>'<i class="icon-list-alt"></i>',
						'url'=>'Yii::app()->createUrl("evaluacion/certificado_perso_alu",array("id"=>$data->mat_id,"p" => 3))',
						'options'=>array(
							'class'=>"btn btn-success",
							'data-toggle'=>'tooltip',
							'title'=>'Periodo 2',
						),
					),
				),
			),
		),
	)); 

}

?>