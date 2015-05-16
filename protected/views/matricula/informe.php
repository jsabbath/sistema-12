<div class="row">
	<div class="span12 text-center">
		<h2>Certificado de Alumno Regular</h2>
	</div>
	<div class="span12 text-center">
		<p class="text-info">Aqui se puede generar un <strong>Certificado de Alumno Regular</strong> para cualquier <strong>Alumno</strong> seleccionado</p>
		<br>
	</div>
</div>


<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'usuario-grid',
	'type' => TbHtml::GRID_TYPE_BORDERED,
	'dataProvider'=>$model->search(),
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
			'template'=>'{certificado}',
			'buttons'=>array(
				'certificado'=>array(
					'label'=>'<i class="icon-list-alt"></i>',
					'url'=>'Yii::app()->createUrl("Matricula/certificado",array("id"=>$data->mat_id))',
					'options'=>array(
						'class'=>"btn btn-info",
						'data-toggle'=>'tooltip',
						'title'=>'Certificado',

					),
				),
			),
		),
	),
)); ?>