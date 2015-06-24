
<div class="row">
	<div class="span12">

		
		<form action="<?php echo Yii::app()->createUrl('matricula/pre_agregar_inf',array('id' => $id)); ?>" 
				method="post">

		<div class="row">
			<div class="span12 text-center">
				<br>
				<?php 
				echo CHtml::dropDownList('id_curso','id_curso',$cur ,array(
				'empty' => '-Seleccione Curso-',
				'id'=> 'id_curso',
				)); 
				?>
				
			</div>
			<div id="info" class="span8 offset2">
				
			</div>
			<div class="span8 offset2 text-right">
	            <?php echo CHtml::submitButton('Guardar',array('class'=>'btn btn-warning', 'id'=>'aaa')); ?>
	        </div>
        </div>
		</form>
	</div>
</div>

</div><!-- form -->


