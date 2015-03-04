<?php
/* @var $this InformeDesarrolloController */
/* @var $model InformeDesarrollo */

$this->menu=array(
	array('label'=>'List InformeDesarrollo', 'url'=>array('index')),
	array('label'=>'Manage InformeDesarrollo', 'url'=>array('admin')),
);
?>

<div class="container">
	<div class="row">
		<div class="span12" style="text-align: center">
		<div class="ribbon both_ribbon">
			<h2>Informe de desarrollo</h2><br/>
		</div>
		</div>
		<?php $this->renderPartial('_form', array('model'=>$model,
		)); ?>
	</div>	

</div>
