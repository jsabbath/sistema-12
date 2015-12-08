

<div class="row">
<div class="span12">

<div class="row">
			<div class="span12 text-center">
				<h2>Situacion Final Cursos</h2>
			</div>
			<div class="span12 text-center">
				<p class="text-info">Seleccione un <strong>Curso</strong> para ver la situacion final  de los alumnos <p>
			</div>
</div>

	<form action="<?php echo Yii::app()->createUrl('notas/sit_final'); ?>" method="post">

			<div class="row">
				<div class="span12 text-center">
					<?php echo CHtml::dropDownList('id_cur','id_cur',$cursos ,array(
									'empty' => '-Seleccione Curso-',
									'id'=> 'id_cur',
									));
					?>
				</div>



				<div class="text-center">
		            <?php echo CHtml::submitButton('Ver',array('class'=>'btn btn-warning', 'id'=>'aaa')); ?>
		        </div>
		    </div>

	</form>

<?php if(  Yii::app()->user->checkAccess('evaluador') OR Yii::app()->user->checkAccess('administrador')){ ?>
	<div class="row">
		<div class="span12 text-center">
			<h3>- Cerrar Cursos </h3>
			<p class="text-info">
				Como Evaluador Puede cerrar los años y la edicion  de estos quedara bloqueada. <br>

			</p>

			<button class="btn btn-success"  id="btn_cerrar"><?php if( $lock == 0 ){ echo "Cerrar"; }else{ echo "Abrir"; } ?></button>
		</div>
	</div>


	<script>
		$('#btn_cerrar').on('click', function(){
			swal({
		            title: "Ingrese su Password!",
		            type: "input",
		            inputType: "password",
		            showCancelButton: true,
		            closeOnConfirm: false,
		            animation: "slide-from-top"
		        },
		        function(inputValue){
		            $.ajax({
		                url: '<?php echo $this->createUrl('notas/sit_lock'); ?>',
		                type: 'POST',
		                dataType: "JSON",
		                data: { pass: inputValue},
		                success: function(response) {
		                    if(!response){
		                        swal.showInputError("Ingrese datos nuevamente");
		                        return false;
		                    }

							if( response == 1 ){
								swal({
									title: "Correcto!",
									timer: 600,
									type: "success",
									showConfirmButton: false
								});
								if( $('#btn_cerrar').text() == 'Cerrar' ){
									$('#btn_cerrar').text('Abrir');
								} else{
									$('#btn_cerrar').text('Cerrar');
								}


							}



		                }
		            })



		        });

		});
	</script>

<?php } ?>
<br>

</div>
</div>
