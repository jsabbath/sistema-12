<?php
/* @var $this AreaController */
/* @var $model Area */

$this->menu=array(
	array('label'=>'List Area', 'url'=>array('index')),
	array('label'=>'Manage Area', 'url'=>array('admin')),
);
?>


<div class="container">
	<div class="row">
		<?php $this->renderPartial('_form2', array('model'=>$model,'id'=>$id)); ?>
	</div>
</div>
