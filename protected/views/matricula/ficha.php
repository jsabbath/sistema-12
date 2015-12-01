<div class="row">
	<div class="span12 text-center">
		<h2>Ficha Matricula</h2>
	</div>

</div>

<div class="span12 text-center">
       	<p class="text-info">Seleccione el <strong>Curso</strong> que desea <strong>Imprimir</strong></p>

       	 <form method="POST" action="<?php echo CController::createUrl("Matricula/ficha_curso"); ?>">
	 		<?php echo CHtml::dropDownList('id_curso','id_curso',$cursos ,array(
                                            'empty' => '-Seleccione Curso-',
                                            'id'=> 'id_curso',
                                        ));?>

            <div class="row">
            	<div class="span12 text-center">
            		<button class="btn btn-success" id="curso_print">Curso Completo</button>
            	</div>

            </div>

        </form>


</div>




<div class="span12 text-center">
		<p class="text-info"><strong>Ó</strong></p>
		<p class="text-info">Seleccione <strong>el Alumno </strong>a imprimir</p>
	</div>
<?php


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
			'template'=>'{anual}',
			'buttons'=>array(
				'anual' => array(
					'label'=>'<i class="icon-list"></i>',
					'url'=>'Yii::app()->createUrl("Matricula/ficha_alum",array("id_mat"=>$data->mat_id))',
					'options'=>array(
						'class'=>"btn btn-default",
						'data-toggle'=>'tooltip',
						'title'=>'Cert. Anual',
					),
				),

			),
		),
	),
));


?>
