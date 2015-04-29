<?php
/* @var $this ColegioController */
/* @var $dataProvider CActiveDataProvider */
/*
$this->breadcrumbs=array(
	'Colegios',
);

$this->menu=array(
	array('label'=>'Create Colegio', 'url'=>array('create')),
	array('label'=>'Manage Colegio', 'url'=>array('admin')),
);
*/
?>
<div class="row">
	<div class="span12 text-center">
		<h2>Parametros del Colegio</h2>	
	</div>
</div>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
