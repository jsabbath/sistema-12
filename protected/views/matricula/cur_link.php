
<div class="row">
	<div class="span12">

		
		<form action="<?php echo Yii::app()->createUrl('matricula/addcurso',array('id' => $id)); ?>" 
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

<script type="text/javascript">
	$('#id_curso').on('change',function(){
		$.ajax({
			url: '<?php echo CController::createUrl('matricula/infoCurso'); ?>',
			type: 'POST',
			data: { id_curso: $(this).val() },
		})
		.done(function(response) {
			$('#info').html(response);
		});
		
		
	});
</script>
