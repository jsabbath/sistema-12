<?php
/* @var $this MatriculaController */
/* @var $model Matricula */


$this->breadcrumbs=array(
	'Matriculas'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Matricula', 'url'=>array('index')),
	array('label'=>'Create Matricula', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#matricula-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Matriculas</h1>

<p>
    You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
        &lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'matricula-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'mat_id',
		'mat_ano',
		'mat_numero',
		'mat_fingreso',
		'mat_fretiro',
		'mat_fcambio',
		/*
		'mat_alu_id',
		*/
		array('class' => 'CButtonColumn',
            'template' => '{update} {view} {retirar}',
            'buttons' => array(
                'update' => array(
                    'label' => '',
                    'imageUrl' => '',
                    'options' => array('class' => 'icon-edit'),
                ),
                'view' => array(
                    'label' => '',
                    'imageUrl' => '',
                    'options' => array('class' => 'icon-search'),
                ),
                'retirar' => array(
                    'label' => 'Retirar alumno',
                    'imageUrl' => '',
                    // $data trae todo los atributos del modelo por la xuxa
                    'url' => 'Yii::app()->createUrl("matricula/retirar", array("id"=>$data->mat_id))', 
                    //'click'=>'function(){$this->render(matricula/retirar )}',
                    'options' => array('class' => 'icon-remove'),
                ),
            ),
        ),
	),
)); ?>