<div class="row">
	<div class="span12">
	<div class="text-center">
		<h4>Importar Alumnos</h4>
		<p><strong>El archivo  tiene que ser exportado  del ministerio de educacion : </strong><a href="http://sige.mineduc.cl/">sige.mineduc.cl</a></p>

	</div>	

		<form action="<?php echo Yii::app()->createUrl('matricula/subir_archivo'); ?>" 
				method="post" mimetype="text/xml" 
				enctype="multipart/form-data" name="form1"
				id="form">

			<div class="span6 offset3" style="margin-bottom: 20px;">
				<p>Seleccione archivo a subir:</p>
				<input type="file" name="xmlfile" ></input>
				<!-- <?php echo CHtml::FileField('id','', array( 'id' => 'file' )); ?> -->
			</div>

			<div class="row">
				<div class="span2 offset4">
					<button id="subir" class="btn btn-primary">Subir</button>
				</div>
			</div>
		</form>

		
	</div>		
</div>

