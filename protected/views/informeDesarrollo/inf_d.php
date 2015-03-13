<?php
/*
Aqui se muestra la lista con los informes de desarrollo
$model Informedesarrollo

*/

?>

<div class="row">
	<div class="span12">
		<div class="text-center">
			<h2>Informes de desarrollo</h2>
		</div>
	</div>

	<div class="span12">
		<?php $this->widget('bootstrap.widgets.TbGridView', array(
			'id'=>'informe-desarrollo-grid',
			'dataProvider'=>$model->search(),
			'filter'=>$model,
			'columns'=>array(
				//'id_id',
				'id_descripcion',
				array(
					'class'=>'bootstrap.widgets.TbButtonColumn',
					'template'=>'{view}',
					'buttons'=>array(
						'view'=>array(
							'label'=>'<i class="icon-view"></i>',
							'url'=>'Yii::app()->createUrl("/informeDesarrollo/view_inf",array("id"=>$data->id_id))',
							'options'=>array(
								'class'=>'btn btn-info',
								'data-toggle'=>'tooltip',
								'title'=>'Ver informe',
							),
						),
					),
				),
			),
		)); ?>
	</div>
</div>
