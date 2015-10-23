

<div class="row">
<div class="span12">

<div class="row">
			<div class="span12 text-center">
				<h2>Informes de Nota por curso</h2>
			</div>
			<div class="span12 text-center">
				<p class="text-info">Seleccione el <strong>Curso</strong> del que desea imprimir los informes de <strong>Notas parciales</strong> o <strong>Anual  de estudio</strong>.</p>
			</div>
		</div>

	<form action="<?php echo Yii::app()->createUrl('matricula/cur_not'); ?>" method="post">

			<div class="row text-center">
				<div class="span12">
					<?php echo CHtml::dropDownList('id_cur','id_cur',$cursos ,array(
									'empty' => '-Seleccione Curso-',
									'id'=> 'id_cur',
									)); 
					?>
				</div>
				<?php if( $per == "SEMESTRE" ){ ?>
					<div class="span3 offset4">
						<?php echo TbHtml::radioButtonList('id_p','id_p', array(1=>'Primer periodo', 2=>'Segundo periodo', 5=>'Anual'), array('separator'=>"" )); ?>
					</div>
				<?php }else{ ?>
					<div class="span3 offset4">
						<?php echo TbHtml::radioButtonList('id_p','id_p', array(1=>'Primer periodo', 2=>'Segundo periodo',3=>'Tercer Periodo', 5=>'Anual'), array('separator'=>"" )); ?>
					</div>
				<?php } ?>
			</div>
				<div class="row text-center">
				<div class="span12">
		            <?php echo CHtml::submitButton('Ver',array('class'=>'btn btn-warning', 'id'=>'aaa')); ?>
		        </div>
		        </div>

	</form>
</div>
</div>
