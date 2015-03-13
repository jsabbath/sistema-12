<?php
/* @var $this InformeDesarrolloController */
/* @var $dataProvider CActiveDataProvider */
?>

<div class="text-center">
	<h2>Informes de desarrollo</h2>
</div>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
