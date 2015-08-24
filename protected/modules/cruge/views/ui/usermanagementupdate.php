<?php
	/*
		$model:  
			es una instancia que implementa a ICrugeStoredUser, y debe traer ya los campos extra 	accesibles desde $model->getFields()
		
		$boolIsUserManagement: 
			true o false.  si es true indica que esta operandose bajo el action de adminstracion de usuarios, si es false indica que se esta operando bajo 'editar tu perfil'
	*/
?>

<?php 
$form = $this->beginWidget('CActiveForm', array(
    'id'=>'crugestoreduser-form',
    'enableAjaxValidation'=>false,
    'enableClientValidation'=>false,
)); 
?>

<div class="row">
	<div class="span12 text-center">
			
	<?php if(!$boolIsUserManagement){ ?>
			
<h4>Cambiar Contraseña</h4>
		

			<div class="span7">
				<?php echo $form->errorSummary($model); ?>
			</div>	
		
			 <div class="row">
		            <div class="span12 text-center" id="pass_ant">
		            	<p>Ingrese contraseña actual:</p>
		                <?php echo CHtml::passwordField('Text', '',array(
		                    'id'=>'pass_ant_inp','placeholder' => 'Contraseña Actual',
		                    // 'style' => 'border-color: red; background-color: #FEE;'
		                ))?>                                                                    
		               <p style="color: red" id="error_pass_ant" hidden>Datos Incorrectos</p>
		                <p style="color: green" id="success_pass_ant" hidden>Datos Correctos</p>
		            </div> 
		            
	        </div>

	        <div id="nueva_pass" hidden>
		        <div class="row">
			            <div class="span12 text-center" id="pass_ant_div1">
	                      	<p>Ingrese contraseña nueva:</p>                     
			                <?php echo CHtml::passwordField('Text', '',array(
			                    'id'=>'pass_n_inp','placeholder' => 'Contraseña Nueva',
			                  
			                ))?>
			                <p style="color: red" id="error_pass1" hidden>La contraseña debe tener 6 o mas caracteres</p>
		                	<p style="color: green" id="success_pass1" hidden>Correcto</p>
			            </div>      
		        </div>

	            <div class="row">
		            <div class="span12 text-center" id="pass_ant_div2">
	                  	<p>Verifique contraseña nueva:</p>                     
		                <?php echo CHtml::passwordField('Text', '',array(
		                    'id'=>'pass_n2_inp','placeholder' => 'Verificar contraseña nueva',
		                  
		                ))?>
		                <p style="color: red" id="error_pass2" hidden>La contraseña debe conincidir</p>
		                <p style="color: green" id="success_pass2" hidden> Correcto</p>
		            </div>      
		        </div>
			</div>

			<div class='row' id="div_pass" hidden>
				<div class="span5">
					<p>Nueva Contraseña</p>
					<?php echo $form->textField($model,'newPassword',array('size'=>10, 'id'=> 'pass_final')); ?>
					<?php echo $form->error($model,'newPassword'); ?>
					<script>
						function fnSuccess(data){
							$('#CrugeStoredUser_newPassword').val(data);
						}
						function fnError(e){
							alert("error: "+e.responseText);
						}
					</script>
				</div>
			</div>

<?php } else{ ?>

<h4>Cambiar Contraseña de: <?php echo $nombre; ?></h4>
<h4>Rut: <?php echo $rut; ?></h4>		

		
			<div class='row' id="div_pass">
				<div class="span5">
					<p>Nueva Contraseña</p>
					<?php echo $form->textField($model,'newPassword',array('size'=>10, 'id'=> 'pass_final')); ?>
					<?php echo $form->error($model,'newPassword'); ?>
					<script>
						function fnSuccess(data){
							$('#CrugeStoredUser_newPassword').val(data);
						}
						function fnError(e){
							alert("error: "+e.responseText);
						}
					</script>
				</div>
			</div>

<?php } ?>

			<div class="form">

			<!-- inicio de opciones avanazadas, solo accesible bajo el rol 'admin' -->
			<div class="row">
				<div class="span8">
				<?php 
					if($boolIsUserManagement)
					if(Yii::app()->user->checkAccess('edit-advanced-profile-features'
						,__FILE__." linea ".__LINE__))
						$this->renderPartial('_edit-advanced-profile-features'
							,array('model'=>$model,'form'=>$form),false); 
				?>
				</div>
			</div>
			<!-- fin de opciones avanazadas, solo accesible bajo el rol 'admin' -->


			</div>


		<div class="row buttons text-center">
			<?php Yii::app()->user->ui->tbutton("Guardar Cambios"); ?>
			
		</div>

					
					<?php $this->endWidget(); ?>

	</div>
</div>


<script>
	 $("#pass_ant").keyup(function(event) {
	 	var bla = $('#pass_ant_inp').val();
	 	var input_ant = $('#pass_ant_inp');
	 	var error_ant = $('#error_pass_ant');

	 	var div_new = $('#nueva_pass');
	 	var input_new = $('#pass_n_inp');
	 	var input_new2 = $('#pass_n2_inp');


			$.ajax({
				url: '<?php echo $this->createUrl('/usuario/val_pass'); ?>',
                type: 'POST',
                dataType: "JSON",
                data: { pass: bla },
                success: function(response) {
                	if( response != 1 ){
                		input_ant.css({
                			borderColor: 'red',
                			backgroundColor: '#FEE'
                		});
                		error_ant.show();
                		$('#success_pass_ant').hide();
                		div_new.hide();

                	} else{ // correcto
                		input_ant.css({
                			borderColor: 'green',
                			 backgroundColor: '#EFE'
                		});
                		// input_ant.attr({
                		// 	disabled: 'disabled',
                		// });
                		error_ant.hide();
                		$('#success_pass_ant').show();

                		div_new.show();
                		
                		$("#pass_ant_div1").keyup(function(event) {
                			var p1 = $('#pass_n_inp').val();
                			var inp1 = $('#pass_n_inp');
                			if( p1.length < 6 ){
                				inp1.css({
		                			borderColor: 'red',
		                			backgroundColor: '#FEE'
		                		});
		                		$('#error_pass1').show();
		                		$('#success_pass1').hide();
		                		var p2 = $('#pass_n2_inp').val();
                					var inp2 = $('#pass_n2_inp');
                					if( p2 == p1 && p2.length >= 6 ){
                						inp2.css({
				                			borderColor: 'green',
				                			backgroundColor: '#EFE'
				                		});

				                		$('#error_pass2').hide();
				                		$('#success_pass2').show();

				                		$('#pass_final').val(p1);

                					} else{
                						inp2.css({
				                			borderColor: 'red',
				                			backgroundColor: '#FEE'
				                		});
				                		$('#error_pass2').show();
				                		$('#success_pass2').hide();
				                		$('#pass_final').val("");
		                			}
                				
                			} else{
								inp1.css({
		                			borderColor: 'green',
		                			backgroundColor: '#EFE'
		                		});
		                		var p2 = $('#pass_n2_inp').val();
                					var inp2 = $('#pass_n2_inp');
                					if( p2 == p1 && p2.length >= 6 ){
                						inp2.css({
				                			borderColor: 'green',
				                			backgroundColor: '#EFE'
				                		});

				                		$('#error_pass2').hide();
				                		$('#success_pass2').show();

				                		$('#pass_final').val(p1);

                					} else{
                						inp2.css({
				                			borderColor: 'red',
				                			backgroundColor: '#FEE'
				                		});
				                		$('#error_pass2').show();
				                		$('#success_pass2').hide();
				                		$('#pass_final').val("");
		                			}
		                		$('#error_pass1').hide();
		                		$('#success_pass1').show();

		                		$("#pass_ant_div2").keyup(function(event) {
		                			var p1 = $('#pass_n_inp').val();
		                			var p2 = $('#pass_n2_inp').val();
                					var inp2 = $('#pass_n2_inp');
                					if( p2 == p1 && p2.length >= 6 ){
                						inp2.css({
				                			borderColor: 'green',
				                			backgroundColor: '#EFE'
				                		});

				                		$('#error_pass2').hide();
				                		$('#success_pass2').show();

				                		$('#pass_final').val(p1);

                					} else{
                						inp2.css({
				                			borderColor: 'red',
				                			backgroundColor: '#FEE'
				                		});
				                		$('#error_pass2').show();
				                		$('#success_pass2').hide();
				                		$('#pass_final').val("");
		                			}
		                		});


                			}

                		});


                	}
                }
			});
	}); 


</script>