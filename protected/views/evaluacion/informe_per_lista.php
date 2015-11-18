<div class="row">
	<div class="span12 text-center">
		<h2>Informe Personalidad</h2>
	</div>

	<div class="span12 text-center">
       	<p class="text-info">Seleccione el <strong>Curso</strong> que desea <strong>Imprimir</strong></p>

       	 <form method="POST" action="<?php echo CController::createUrl("Evaluacion/certificado_perso_curso"); ?>">
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
		<p class="text-info">Ó</p>

		<p class="text-info">Seleccione <strong>un Alumno</strong> a Imprimir.</p>
	</div>
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
			'template'=>'{periodo1} ',
			'buttons'=>array(
				'periodo1'=>array(
					'label'=>'<i class="icon-list-alt"></i>',
					'url'=>'Yii::app()->createUrl("evaluacion/certificado_perso_alu",array("id"=>$data->mat_id,"p" => 1))',
					'options'=>array(
						'class'=>"btn btn-default",
						'data-toggle'=>'tooltip',
						'title'=>'Imprimir ',
					),
				),
				
			),
		),
	),
));

?>