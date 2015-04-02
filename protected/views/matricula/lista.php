
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
		//var_dump($mat);
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
							'url'=>'Yii::app()->createUrl("matricula/update",array("id"=>$data->matriculas->mat_id))',
							'options'=>array(
								'class'=>'btn btn-info',
							),
						),
					),
				),
			),
		)); 

		?>
	</div>
</div>
