
<div class="row">
	<div class="span12">
		<div class="row">
			<div class="span12 text-center">
				<h3>Lista de Alumnos General</h3>
			</div>
		</div>
		<div class="row">
			<div class="span12 text-center">
				<p class="text-info">Lista general de los alumnos del colegio</p>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="span12">
		<?php 

		$this->widget('bootstrap.widgets.TbGridView', array(
			'id'=>'matricula-grid',
			'dataProvider'=>$model->search(),
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
				),
				array(
					'name'=>'matAlu.alum_nombres',
					'filter' => CHtml::activeTextField($model, 'alumno_nombres'),
				),
				array(
					'name'=>'matAlu.alum_apepat',
					'filter' => CHtml::activeTextField($model, 'alumno_apepat'),
				),
				array(
					'name'=>'matAlu.alum_apemat',
					'filter' => CHtml::activeTextField($model, 'alumno_apemat'),
				),
				array(
					'name'=>'mat_estado',
					'value'=>'$data->matEstado->par_descripcion',
					'filter' => CHtml::activeTextField($model, 'estado'),
				),
				array(
					'class'=>'bootstrap.widgets.TbButtonColumn',
				),
			),
		)); 

		?>
	</div>
</div>
