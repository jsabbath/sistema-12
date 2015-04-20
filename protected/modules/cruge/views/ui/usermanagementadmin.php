

<div class="row">
	<div class="span12 text-center">
		<h2><?php echo ucwords("Cuentas de Usuario");?></h2>
	</div>
	<div class="span12">
		<p class="text-center text-info">Aqui se puede cambiar clave, activar y desactivar las distintas cuentas de usuario</p>
	</div>
</div>

<?php 
/*
	para darle los atributos al CGridView de forma de ser consistente con el sistema Cruge
	es mejor preguntarle al Factory por los atributos disponibles, esto es porque si se decide
	cambiar la clase de CrugeStoredUser por otra entonces asi no haya dependenci directa a los
	campos.
*/
$cols = array();

// presenta los campos de ICrugeStoredUser
foreach(Yii::app()->user->um->getSortFieldNamesForICrugeStoredUser() as $key=>$fieldName){
	$value=null; // default
	$filter=null; // default, textbox
	$type='text';
	if($fieldName == 'state'){
		$value = '$data->getStateName()';
		$filter = Yii::app()->user->um->getUserStateOptions();
	}
	if($fieldName == 'logondate'){
		$type='datetime';
	}
	$cols[] = array('name'=>$fieldName,'value'=>$value,'filter'=>$filter,'type'=>$type);
}
	
$cols[] = array(
	'class'=>'bootstrap.widgets.TbButtonColumn',
	
	'template' => '{update}',
	'deleteConfirmation'=>CrugeTranslator::t('admin', 'Are you sure you want to delete this user'),
	'buttons' => array(
			'update'=>array(
				'label'=>CrugeTranslator::t('admin', 'Update User'),
				'url'=>'array("usermanagementupdate","id"=>$data->getPrimaryKey())',
				'options'=>array(
					'class'=>'btn btn-info',
				),
			),
			'delete'=>array(
				'url'=>'array("usermanagementdelete","id"=>$data->getPrimaryKey())',
			),
		),	
);

$this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'usuario-grid',
	'type' => TbHtml::GRID_TYPE_BORDERED,
	'dataProvider'=>$dataProvider,
    'columns'=>$cols,
	'filter'=>$model,
)); ?>
</div>