<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/sweet-alert.css">
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/sweet-alert.min.js"></script>
<div class="row">
	<div class="span12">

		<div class="row">
			<div class="span12 text-center">
				<h2>Asignacion  de curso</h2>
			</div>
			<div class="span12 text-center">
				<p class="text-info">Seleccione el <strong>Curso</strong> al cual desea asignar el <strong>alumno</strong></p>
			</div>
		</div>
		<?php echo CHtml::beginForm(); ?>

		<div class="row">
			<div class="span12 text-center">
				<?php echo CHtml::dropDownList('id_curso','id_curso',$cur ,array(
				'empty' => '-Seleccione Curso-',
				'id'=> 'id_curso',
				'ajax' => array(
	                'type' => 'POST',
	                'url' => CController::createUrl('matricula/infoCurso'),
	                'update' => '#info',
                ),
				)); ?>
			</div>
			<div id="info" class="span8 offset2">
				
			</div>
			<div class="span8 offset2 text-right">
	            <?php echo CHtml::submitButton('Guardar',array('class'=>'btn btn-warning', 'id'=>'aaa')); ?>
	        </div>
        </div>
		<?php echo CHtml::endForm(); ?>
	</div>
</div>

</div><!-- form -->
