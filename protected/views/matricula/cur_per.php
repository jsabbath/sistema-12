

<div class="row">
<div class="span12">

<div class="row">
			<div class="span12 text-center">
				<h2>Informe Parcial de Notas por curso</h2>
			</div>
			<div class="span12 text-center">
				<p class="text-info">Seleccione el <strong>Curso</strong> del que desea imprimir los informes.</p>
			</div>
		</div>

	<form action="<?php echo Yii::app()->createUrl('matricula/cur_not'); ?>" method="post">

			<div class="row text-center">
				<div class="span4 offset4">
					<?php echo CHtml::dropDownList('id_cur','id_cur',$cursos ,array(
									'empty' => '-Seleccione Curso-',
									'id'=> 'id_cur',
									)); 
					?>
				</div>
			</div>
				<div class="row">
				<div class="span1 offset6">
		            <?php echo CHtml::submitButton('Ver',array('class'=>'btn btn-warning', 'id'=>'aaa')); ?>
		        </div>
		        </div>

	</form>
</div>
</div>
