
<div class="row">
	<div class="span12">
		<div class="row">
			<div class="span12 text-center">
				<h3>Lista de Alumnos General</h3>
			</div>
		</div>
		<div class="row">
			<div class="span12 text-center">
				<p class="text-info">Seleccione una matricula para borrar</p>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="span12">
		<?php 
		$this->widget('bootstrap.widgets.TbGridView', array(
			'id'=>'matricula-grid',
			'type' => TbHtml::GRID_TYPE_BORDERED,
			'dataProvider'=>$model->buscar($this->actionAnoactual()),
			'filter'=>$model,
			'columns'=>array(
				//'mat_id',
				//'mat_ano',
				//'mat_numero',
				//'mat_fingreso',
				//'mat_fretiro',
				//'mat_fcambio',
				/*
				'mat_asistencia_1',
				'mat_asistencia_2',
				'mat_asistencia_3',
				'mat_alu_id',
				'mat_estado',
				*/
				array(
					'name'=>'matAlu.alum_rut',
					'type'=>'raw',
				),
				array(
					'name'=>'matAlu.alum_nombres',
					'type'=>'raw',
					'filter' => CHtml::activeTextField($model, 'alumno_nombres'),
				),
				array(
					'name'=>'matAlu.alum_apepat',
					'type'=>'raw',
					'filter' => CHtml::activeTextField($model, 'alumno_apepat'),
				),
				array(
					'name'=>'matAlu.alum_apemat',
					'type'=>'raw',
					'filter' => CHtml::activeTextField($model, 'alumno_apemat'),
				),
				array(
					'name'=>'mat_estado',
					'type'=>'raw',
					'value'=>array($this,'gridEstado'),
					'filter' => CHtml::listData(Parametro::model()->findAll(array('condition'=>'par_item="estado"')), 'par_id','par_descripcion'),
					'htmlOptions'=>array('style'=>'text-align:center'),
				),
				array(
					'header'=>'Curso',
					'type'=>'raw',
					'value'=>array($this,'obtenerCurso'),
					// 'filter' => CHtml::listData(Curso::model()->findAll(), 'cur_id','cur_nivel'),
				),
				array(
					'class'=>'bootstrap.widgets.TbButtonColumn',
					'template'=>'{delete}',
					'buttons'=>array(
						'delete'=>array(
							'label'=>'<i class="icon-search"></i>',
							'options'=>array(
								'class'=>"btn btn-success",
								'data-toggle'=>'tooltip',
								'title'=>'borrar',
							),
						),
					),
				),
			),
		)); 

		?>
	</div>
</div>
