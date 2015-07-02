<div class="row hidden-desktop">
<div class="span12">

<div class="row">
	<div class="span6 offset3">
	<div style="padding-left: 10px;">
		<br>
		<h2 class="text-center"><font face="papyrus">Administracion</font></h2>
	</div>
<?php 
if(
	Yii::app()->user->checkAccess('administrador') OR
    Yii::app()->user->isSuperAdmin
){ 
?>
	<div class="row">
		<a class="link-negro" href="<?php echo Yii::app()->createUrl('parametro/admin'); ?>">
			<div class="span4 offset1" style="background-color:  rgba(208,164,0, 0.5);  -webkit-border-radius: 25px 5px 1px 4px; /* recuerda la primera frase */ -moz-border-radius: 24px; /* si quieres todas las esquinas iguales */ border-radius: 0px 50px 50px 0px;">
				<div class="row">
					<div class="span1 text-center">
						<div class="hidden-phone">
							<?php echo TbHtml::imagePolaroid(Yii::app()->request->baseUrl."/images/iconos/computing.png"); ?>
						</div>
					</div>
					<div class="span3">
						<div class="row">
							<div class="span3">
								<strong>Parametros del Sistema</strong>
							</div>
						</div>
						<div class="row">
							<div class="span3">
								<p>En este item se puede ver los parametros del sistema</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</a>

		</div>
		<br>
<?php
}

if(
	Yii::app()->user->checkAccess('administrador') OR
    Yii::app()->user->isSuperAdmin
){ 
?>
		<div class="row">
		<div class="visible-phone"><br/></div>
		<a class="link-negro" href="<?php echo Yii::app()->createUrl('colegio/admin'); ?>">
			<div class="span4 offset1" style="background-color:  rgba(208,164,0, 0.5);  -webkit-border-radius: 25px 5px 1px 4px; /* recuerda la primera frase */ -moz-border-radius: 24px; /* si quieres todas las esquinas iguales */ border-radius: 0px 50px 50px 0px;">
				<div class="row">
					<div class="span1 text-center">
						<div class="hidden-phone">
							<?php echo TbHtml::imagePolaroid(Yii::app()->request->baseUrl."/images/iconos/increase_indentation.png"); ?>
						</div>
					</div>
					<div class="span3">
						<div class="row">
							<div class="span3">
								<strong>Parametros de Colegio</strong>
							</div>
						</div>
						<div class="row">
							<div class="span3">
								<p>En este item se pueden ingresar nuevos usuarios al sistema</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</a>

		</div>
		<br>
<?php
}

?>
		<div class="row">
		<div class="visible-phone"><br/></div>
		<a class="link-negro" href="<?php echo Yii::app()->user->ui->getProfileUrl()?>" >
			<div class="span4 offset1" style="background-color:  rgba(208,164,0, 0.5);  -webkit-border-radius: 25px 5px 1px 4px; /* recuerda la primera frase */ -moz-border-radius: 24px; /* si quieres todas las esquinas iguales */ border-radius: 0px 50px 50px 0px;">
				<div class="row">
					<div class="span1 text-center">
						<div class="hidden-phone">
							<?php echo TbHtml::imagePolaroid(Yii::app()->request->baseUrl."/images/iconos/insert_hyperlink.png"); ?>
						</div>
					</div>
					<div class="span3">
						<div class="row">
							<div class="span3">
								<strong>Cambiar Contraseña</strong>
							</div>
						</div>
						<div class="row">
							<div class="span3">
								<p>En este item se puede cambiar la contraseña  de tu cuenta</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</a>

		</div>
		<br>
<?php

 
 
if(
	Yii::app()->user->checkAccess('administrador') OR
    Yii::app()->user->isSuperAdmin
){ 
?>
		<div class="row">
		<div class="visible-phone"><br/></div>
		<a class="link-negro" href="<?php echo Yii::app()->createUrl('usuario/create'); ?>">
			<div class="span4 offset1" style="background-color:  rgba(208,164,0, 0.5);  -webkit-border-radius: 25px 5px 1px 4px; /* recuerda la primera frase */ -moz-border-radius: 24px; /* si quieres todas las esquinas iguales */ border-radius: 0px 50px 50px 0px;">
				<div class="row">
					<div class="span1 text-center">
						<div class="hidden-phone">
							<?php echo TbHtml::imagePolaroid(Yii::app()->request->baseUrl."/images/iconos/admin.png"); ?>
						</div>
					</div>
					<div class="span3">
						<div class="row">
							<div class="span3">
								<strong>Ingresar Usuario</strong>
							</div>
						</div>
						<div class="row">
							<div class="span3">
								<p>En este item se pueden ingresar nuevos usuarios al sistema</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</a>
		</div>
		<br>
<?php
}
 
if(
	Yii::app()->user->checkAccess('administrador') OR
    Yii::app()->user->isSuperAdmin
){ 
?>
		<div class="row">
		<div class="visible-phone"><br/></div>
		<a class="link-negro" href="<?php echo Yii::app()->createUrl('usuario/admin'); ?>">
			<div class="span4 offset1" style="background-color:  rgba(208,164,0, 0.5);  -webkit-border-radius: 25px 5px 1px 4px; /* recuerda la primera frase */ -moz-border-radius: 24px; /* si quieres todas las esquinas iguales */ border-radius: 0px 50px 50px 0px;">
				<div class="row">
					<div class="span1 text-center">
						<div class="hidden-phone">
							<?php echo TbHtml::imagePolaroid(Yii::app()->request->baseUrl."/images/iconos/group.png"); ?>
						</div>
					</div>
					<div class="span3">
						<div class="row">
							<div class="span3">
								<strong>Administrar usuarios</strong>
							</div>
						</div>
						<div class="row">
							<div class="span3">
								<p>En este item se puede modificar o eliminar un usuario</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</a>
	</div>
	<br>
<?php
}
 
if(
	Yii::app()->user->checkAccess('administrador') OR
    Yii::app()->user->isSuperAdmin
){ 
?>				
		<div class="row">
		<div class="visible-phone"><br/></div>
		<a class="link-negro" href="<?php echo Yii::app()->createUrl('cruge/ui/usermanagementadmin'); ?>">
			<div class="span4 offset1" style="background-color:  rgba(208,164,0, 0.5);  -webkit-border-radius: 25px 5px 1px 4px; /* recuerda la primera frase */ -moz-border-radius: 24px; /* si quieres todas las esquinas iguales */ border-radius: 0px 50px 50px 0px;">
				<div class="row">
					<div class="span1 text-center">
						<div class="hidden-phone">
							<?php echo TbHtml::imagePolaroid(Yii::app()->request->baseUrl."/images/iconos/preview.png"); ?>
						</div>
					</div>
					<div class="span3">
						<div class="row">
							<div class="span3">
								<strong>Cuentas de Usuario</strong>
							</div>
						</div>
						<div class="row">
							<div class="span3">
								<p>En este item se puede administrar los distintos usuarios del sistema</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</a>
	</div>
	<br>
<?php
}
 
if(
	Yii::app()->user->checkAccess('administrador') OR
    Yii::app()->user->isSuperAdmin
){ 
?>					
		<div class="row">
		<div class="visible-phone"><br/></div>
		<a class="link-negro" href="<?php echo Yii::app()->createUrl('cruge/ui/rbacusersassignments'); ?>">
			<div class="span4 offset1" style="background-color:  rgba(208,164,0, 0.5);  -webkit-border-radius: 25px 5px 1px 4px; /* recuerda la primera frase */ -moz-border-radius: 24px; /* si quieres todas las esquinas iguales */ border-radius: 0px 50px 50px 0px;">
				<div class="row">
					<div class="span1 text-center">
						<div class="hidden-phone">
							<?php echo TbHtml::imagePolaroid(Yii::app()->request->baseUrl."/images/iconos/external_contact.png"); ?>
						</div>
					</div>
					<div class="span3">
						<div class="row">
							<div class="span3">
								<strong>Asignar Roles</strong>
							</div>
						</div>
						<div class="row">
							<div class="span3">
								<p>En este item se puede asignar el  rol de cada usuario</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</a>
	</div>
	<br>
<?php
}
 
if(
	Yii::app()->user->checkAccess('administrador') OR
    Yii::app()->user->isSuperAdmin
){ 
?>					
		<div class="row">
		<div class="visible-phone"><br/></div>
		<a class="link-negro" href="<?php echo Yii::app()->createUrl('usuario/online'); ?>">
			<div class="span4 offset1" style="background-color:  rgba(208,164,0, 0.5);  -webkit-border-radius: 25px 5px 1px 4px; /* recuerda la primera frase */ -moz-border-radius: 24px; /* si quieres todas las esquinas iguales */ border-radius: 0px 50px 50px 0px;">
				<div class="row">
					<div class="span1 text-center">
						<div class="hidden-phone">
							<?php echo TbHtml::imagePolaroid(Yii::app()->request->baseUrl."/images/iconos/user_awake.png"); ?>
						</div>
					</div>
					<div class="span3">
						<div class="row">
							<div class="span3">
								<strong>Usuarios Online</strong>
							</div>
						</div>
						<div class="row">
							<div class="span3">
								<p>En este item se puede ver los usuarios que estan usando el sistema</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</a>
	</div>
	<br>
<?php
}

if(
	Yii::app()->user->checkAccess('administrador') OR
    Yii::app()->user->isSuperAdmin OR 
    Yii::app()->user->checkAccess('director')
){ 
?>
	<div class="row">
		<div class="visible-phone"><br/></div>
		<a class="link-negro" href="<?php echo Yii::app()->createUrl('Apoderado/admin'); ?>">
			<div class="span4 offset1" style="background-color:  rgba(208,164,0, 0.5);  -webkit-border-radius: 25px 5px 1px 4px; /* recuerda la primera frase */ -moz-border-radius: 24px; /* si quieres todas las esquinas iguales */ border-radius: 0px 50px 50px 0px;">
				<div class="row">
					<div class="span1 text-center">
						<div class="hidden-phone">
							<?php echo TbHtml::imagePolaroid(Yii::app()->request->baseUrl."/images/iconos/interview.png"); ?>
						</div>
					</div>
					<div class="span3">
						<div class="row">
							<div class="span3">
								<strong>Administrar Apoderados</strong>
							</div>
						</div>
						<div class="row">
							<div class="span3">
								<p>En este item se puede administrar los apoderados del sistema</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</a>
	</div>
	<br>
<?php
}
 
if(
	Yii::app()->user->checkAccess('administrador') OR
    Yii::app()->user->isSuperAdmin OR 
    Yii::app()->user->checkAccess('director')
){ 
?>
	<div class="row">
		<div class="visible-phone"><br/></div>
		<a class="link-negro" href="<?php echo Yii::app()->createUrl('noticia/create'); ?>">
			<div class="span4 offset1" style="background-color:  rgba(208,164,0, 0.5);  -webkit-border-radius: 25px 5px 1px 4px; /* recuerda la primera frase */ -moz-border-radius: 24px; /* si quieres todas las esquinas iguales */ border-radius: 0px 50px 50px 0px;">
				<div class="row">
					<div class="span1 text-center">
						<div class="hidden-phone">
							<?php echo TbHtml::imagePolaroid(Yii::app()->request->baseUrl."/images/iconos/accepted_document.png"); ?>
						</div>
					</div>
					<div class="span3">
						<div class="row">
							<div class="span3">
								<strong>Ingresar Noticia</strong>
							</div>
						</div>
						<div class="row">
							<div class="span3">
								<p>En este item se puede asignar el  rol de cada usuario</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</a>
	</div>
	<br>
<?php
}
 
if(
	Yii::app()->user->checkAccess('administrador') OR
    Yii::app()->user->isSuperAdmin OR 
    Yii::app()->user->checkAccess('director')
){ 
?>
	<div class="row">
		<div class="visible-phone"><br/></div>
		<a class="link-negro" href="<?php echo Yii::app()->createUrl('noticia/admin'); ?>">
			<div class="span4 offset1" style="background-color:  rgba(208,164,0, 0.5);  -webkit-border-radius: 25px 5px 1px 4px; /* recuerda la primera frase */ -moz-border-radius: 24px; /* si quieres todas las esquinas iguales */ border-radius: 0px 50px 50px 0px;">
				<div class="row">
					<div class="span1 text-center">
						<div class="hidden-phone">
							<?php echo TbHtml::imagePolaroid(Yii::app()->request->baseUrl."/images/iconos/bullet.png"); ?>
						</div>
					</div>
					<div class="span3">
						<div class="row">
							<div class="span3">
								<strong>Administrar Noticias</strong>
							</div>
						</div>
						<div class="row">
							<div class="span3">
								<p>En este item se puede asignar el  rol de cada usuario</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</a>
	</div>
	<br>
<?php
}


if(
	Yii::app()->user->checkAccess('administrador') OR
    Yii::app()->user->isSuperAdmin OR 
    Yii::app()->user->checkAccess('director') OR
    Yii::app()->user->checkAccess('evaluador') OR
    Yii::app()->user->checkAccess('jefe_utp')
){ 
?>
	<div class="row">
		<a class="link-negro" href="<?php echo Yii::app()->createUrl('matricula/subir_xml'); ?>">
			<div class="span4 offset1" style="background-color:  rgba(208,164,0, 0.5);  -webkit-border-radius: 25px 5px 1px 4px; /* recuerda la primera frase */ -moz-border-radius: 24px; /* si quieres todas las esquinas iguales */ border-radius: 0px 50px 50px 0px;">
				<div class="row">
					<div class="span1 text-center">
						<div class="hidden-phone">
							<?php echo TbHtml::imagePolaroid(Yii::app()->request->baseUrl."/images/iconos/file_format_xml.png"); ?>
						</div>
					</div>
					<div class="span3">
						<div class="row">
							<div class="span3">
								<strong>Importar Alumnos</strong>
							</div>
						</div>
						<div class="row">
							<div class="span3">
								<p>Con un archivo XML podra importar los alumnos del sistema.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</a>
		</div>
		<br>
<?php
}


if(
	Yii::app()->user->checkAccess('administrador') OR
    Yii::app()->user->isSuperAdmin OR 
    Yii::app()->user->checkAccess('director') OR
    Yii::app()->user->checkAccess('evaluador')
){ 
?>
	<div class="row">
		<a class="link-negro" href="<?php echo Yii::app()->createUrl('promedioanual/termino_ano'); ?>">
			<div class="span4 offset1" style="background-color:  rgba(208,164,0, 0.5);  -webkit-border-radius: 25px 5px 1px 4px; /* recuerda la primera frase */ -moz-border-radius: 24px; /* si quieres todas las esquinas iguales */ border-radius: 0px 50px 50px 0px;">
				<div class="row">
					<div class="span1 text-center">
						<div class="hidden-phone">
							<?php echo TbHtml::imagePolaroid(Yii::app()->request->baseUrl."/images/iconos/diploma.png"); ?>
						</div>
					</div>
					<div class="span3">
						<div class="row">
							<div class="span3">
								<strong>Terminar Año Escolar</strong>
							</div>
						</div>
						<div class="row">
							<div class="span3">
								<p>Las notas se guardan como promedios finales y no se podran modificar</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</a>
		</div>
		<br>
<?php
}


if(
	Yii::app()->user->checkAccess('administrador') OR
    Yii::app()->user->isSuperAdmin OR 
    Yii::app()->user->checkAccess('director') OR
    Yii::app()->user->checkAccess('evaluador')
){ 
?>
	<div class="row">
		<a class="link-negro" href="<?php echo Yii::app()->createUrl('asignatura/admin'); ?>">
			<div class="span4 offset1" style="background-color:  rgba(208,164,0, 0.5);  -webkit-border-radius: 25px 5px 1px 4px; /* recuerda la primera frase */ -moz-border-radius: 24px; /* si quieres todas las esquinas iguales */ border-radius: 0px 50px 50px 0px;">
				<div class="row">
					<div class="span1 text-center">
						<div class="hidden-phone">
							<?php echo TbHtml::imagePolaroid(Yii::app()->request->baseUrl."/images/iconos/kerning.png"); ?>
						</div>
					</div>
					<div class="span3">
						<div class="row">
							<div class="span3">
								<strong>Administrar asignaturas</strong>
							</div>
						</div>
						<div class="row">
							<div class="span3">
								<p>Lista de todas las asignaturas del sistema</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</a>
		</div>
		<br>
<?php
}


if(
	Yii::app()->user->checkAccess('administrador') OR
    Yii::app()->user->isSuperAdmin OR 
    Yii::app()->user->checkAccess('director')
){ 
?>
		<div class="row">
		<div class="visible-phone"><br/></div>
		<a class="link-negro" href="<?php echo Yii::app()->createUrl('informeDesarrollo/create'); ?>">
			<div class="span4 offset1" style="background-color:  rgba(208,164,0, 0.5);  -webkit-border-radius: 25px 5px 1px 4px; /* recuerda la primera frase */ -moz-border-radius: 24px; /* si quieres todas las esquinas iguales */ border-radius: 0px 50px 50px 0px;">
				<div class="row">
					<div class="span1 text-center">
						<div class="hidden-phone">
							<?php echo TbHtml::imagePolaroid(Yii::app()->request->baseUrl."/images/iconos/curriculum.png"); ?>
						</div>
					</div>
					<div class="span3">
						<div class="row">
							<div class="span3">
								<strong>Crear Informe Desarrollo</strong>
							</div>
						</div>
						<div class="row">
							<div class="span3">
								<p>En este item se puede crear un informe de desarrollo para el colegio</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</a>
		</div>
		<br>
<?php
}

if(
	Yii::app()->user->checkAccess('administrador') OR
    Yii::app()->user->isSuperAdmin OR 
    Yii::app()->user->checkAccess('director')
){ 
?>
		<div class="row">
		<div class="visible-phone"><br/></div>
		<a class="link-negro" href="<?php echo Yii::app()->createUrl('InformeHogar/create'); ?>">
			<div class="span4 offset1" style="background-color:  rgba(208,164,0, 0.5);  -webkit-border-radius: 25px 5px 1px 4px; /* recuerda la primera frase */ -moz-border-radius: 24px; /* si quieres todas las esquinas iguales */ border-radius: 0px 50px 50px 0px;">
				<div class="row">
					<div class="span1 text-center">
						<div class="hidden-phone">
							<?php echo TbHtml::imagePolaroid(Yii::app()->request->baseUrl."/images/iconos/admissions2.png"); ?>
						</div>
					</div>
					<div class="span3">
						<div class="row">
							<div class="span3">
								<strong>Crear Informe al Hogar</strong>
							</div>
						</div>
						<div class="row">
							<div class="span3">
								<p>En este item se puede crear un informe al hogar</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</a>
	</div>
	<br>
<?php
}

if(
	Yii::app()->user->checkAccess('administrador') OR
    Yii::app()->user->isSuperAdmin OR 
    Yii::app()->user->checkAccess('director') OR
    Yii::app()->user->checkAccess('evaluador') OR
    Yii::app()->user->checkAccess('jefe_utp')
){ 
?>
		<div class="row">
		<div class="visible-phone"><br/></div>
		<a class="link-negro" href="<?php echo Yii::app()->createUrl('informeDesarrollo/inf_d'); ?>">
			<div class="span4 offset1" style="background-color:  rgba(208,164,0, 0.5);  -webkit-border-radius: 25px 5px 1px 4px; /* recuerda la primera frase */ -moz-border-radius: 24px; /* si quieres todas las esquinas iguales */ border-radius: 0px 50px 50px 0px;">
				<div class="row">
					<div class="span1 text-center">
						<div class="hidden-phone">
							<?php echo TbHtml::imagePolaroid(Yii::app()->request->baseUrl."/images/iconos/copy2.png"); ?>
						</div>
					</div>
					<div class="span3">
						<div class="row">
							<div class="span3">
								<strong>Ver Informe Desarrollo</strong>
							</div>
						</div>
						<div class="row">
							<div class="span3">
								<p>En este item se puede ver los distintos informes de desarrollo creados</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</a>
	</div>
	<br>
<?php
}



?>
</div>		
<br>
</div>

</div>
</div>

<div class="row visible-desktop">
	<div class="span12">
		<div class="row">
			<div class="span12 text-center">
				<h2 class="text-center"><font face="papyrus">Administracion</font></h2>
			</div>
		</div>

		<div class="row">
			<div class="span4 text-center">

				<?php 
				if(
					Yii::app()->user->checkAccess('administrador') OR
				    Yii::app()->user->isSuperAdmin
				){ 
				?>
					<div class="row">
						<a class="link-negro" href="<?php echo Yii::app()->createUrl('parametro/admin'); ?>">
							<div class="span4 " style="background-color:  rgba(208,164,0, 0.5);  -webkit-border-radius: 25px 5px 1px 4px; /* recuerda la primera frase */ -moz-border-radius: 24px; /* si quieres todas las esquinas iguales */ border-radius: 0px 50px 50px 0px;">
								<div class="row">
									<div class="span1 text-center">
										<div class="hidden-phone">
											<?php echo TbHtml::imagePolaroid(Yii::app()->request->baseUrl."/images/iconos/computing.png"); ?>
										</div>
									</div>
									<div class="span3">
										<div class="row">
											<div class="span3">
												<strong>Parametros del Sistema</strong>
											</div>
										</div>
										<div class="row">
											<div class="span3">
												<p>En este item se puede ver los parametros del sistema</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</a>

						</div>
						<br>
				<?php
				}

				if(
					Yii::app()->user->checkAccess('administrador') OR
				    Yii::app()->user->isSuperAdmin
				){ 
				?>
					<div class="row">
					<div class="visible-phone"><br/></div>
					<a class="link-negro" href="<?php echo Yii::app()->createUrl('colegio/admin'); ?>">
						<div class="span4 " style="background-color:  rgba(208,164,0, 0.5);  -webkit-border-radius: 25px 5px 1px 4px; /* recuerda la primera frase */ -moz-border-radius: 24px; /* si quieres todas las esquinas iguales */ border-radius: 0px 50px 50px 0px;">
							<div class="row">
								<div class="span1 text-center">
									<div class="hidden-phone">
										<?php echo TbHtml::imagePolaroid(Yii::app()->request->baseUrl."/images/iconos/increase_indentation.png"); ?>
									</div>
								</div>
								<div class="span3">
									<div class="row">
										<div class="span3">
											<strong>Parametros de Colegio</strong>
										</div>
									</div>
									<div class="row">
										<div class="span3">
											<p>En este item se pueden ingresar nuevos usuarios al sistema</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</a>

					</div>
					<br>
				<?php
				}

				?>
					<div class="row">
					<div class="visible-phone"><br/></div>
					<a class="link-negro" href="<?php echo Yii::app()->user->ui->getProfileUrl()?>" >
						<div class="span4 " style="background-color:  rgba(208,164,0, 0.5);  -webkit-border-radius: 25px 5px 1px 4px; /* recuerda la primera frase */ -moz-border-radius: 24px; /* si quieres todas las esquinas iguales */ border-radius: 0px 50px 50px 0px;">
							<div class="row">
								<div class="span1 text-center">
									<div class="hidden-phone">
										<?php echo TbHtml::imagePolaroid(Yii::app()->request->baseUrl."/images/iconos/insert_hyperlink.png"); ?>
									</div>
								</div>
								<div class="span3">
									<div class="row">
										<div class="span3">
											<strong>Cambiar Contraseña</strong>
										</div>
									</div>
									<div class="row">
										<div class="span3">
											<p>En este item se puede cambiar la contraseña  de tu cuenta</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</a>

					</div>
					<br>
				<?php

				if(
					Yii::app()->user->checkAccess('administrador') OR
				    Yii::app()->user->isSuperAdmin
				){ 
				?>
					<div class="row">
					<div class="visible-phone"><br/></div>
					<a class="link-negro" href="<?php echo Yii::app()->createUrl('usuario/create'); ?>">
						<div class="span4 " style="background-color:  rgba(208,164,0, 0.5);  -webkit-border-radius: 25px 5px 1px 4px; /* recuerda la primera frase */ -moz-border-radius: 24px; /* si quieres todas las esquinas iguales */ border-radius: 0px 50px 50px 0px;">
							<div class="row">
								<div class="span1 text-center">
									<div class="hidden-phone">
										<?php echo TbHtml::imagePolaroid(Yii::app()->request->baseUrl."/images/iconos/admin.png"); ?>
									</div>
								</div>
								<div class="span3">
									<div class="row">
										<div class="span3">
											<strong>Ingresar Usuario</strong>
										</div>
									</div>
									<div class="row">
										<div class="span3">
											<p>En este item se pueden ingresar nuevos usuarios al sistema</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</a>
					</div>
					<br>
				<?php
				}
				 
				if(
					Yii::app()->user->checkAccess('administrador') OR
				    Yii::app()->user->isSuperAdmin
				){ 
				?>
					<div class="row">
					<div class="visible-phone"><br/></div>
						<a class="link-negro" href="<?php echo Yii::app()->createUrl('usuario/admin'); ?>">
							<div class="span4 " style="background-color:  rgba(208,164,0, 0.5);  -webkit-border-radius: 25px 5px 1px 4px; /* recuerda la primera frase */ -moz-border-radius: 24px; /* si quieres todas las esquinas iguales */ border-radius: 0px 50px 50px 0px;">
								<div class="row">
									<div class="span1 text-center">
										<div class="hidden-phone">
											<?php echo TbHtml::imagePolaroid(Yii::app()->request->baseUrl."/images/iconos/group.png"); ?>
										</div>
									</div>
									<div class="span3">
										<div class="row">
											<div class="span3">
												<strong>Administrar usuarios</strong>
											</div>
										</div>
										<div class="row">
											<div class="span3">
												<p>En este item se puede modificar o eliminar un usuario</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</a>
					</div>
					<br>
				<?php }

				if(
					Yii::app()->user->checkAccess('administrador') OR
				    Yii::app()->user->isSuperAdmin OR 
				    Yii::app()->user->checkAccess('director')
				){ 
				?>
						<div class="row">
						<div class="visible-phone"><br/></div>
						<a class="link-negro" href="<?php echo Yii::app()->createUrl('informeDesarrollo/create'); ?>">
							<div class="span4" style="background-color:  rgba(208,164,0, 0.5);  -webkit-border-radius: 25px 5px 1px 4px; /* recuerda la primera frase */ -moz-border-radius: 24px; /* si quieres todas las esquinas iguales */ border-radius: 0px 50px 50px 0px;">
								<div class="row">
									<div class="span1 text-center">
										<div class="hidden-phone">
											<?php echo TbHtml::imagePolaroid(Yii::app()->request->baseUrl."/images/iconos/curriculum.png"); ?>
										</div>
									</div>
									<div class="span3">
										<div class="row">
											<div class="span3">
												<strong>Crear Informe Desarrollo</strong>
											</div>
										</div>
										<div class="row">
											<div class="span3">
												<p>En este item se puede crear un informe de desarrollo para el colegio</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</a>
						</div>
						<br>
				<?php } ?>
				
			</div>
			<div class="span4 text-center">

			<?php
			if(
				Yii::app()->user->checkAccess('administrador') OR
			    Yii::app()->user->isSuperAdmin
			){ 
			?>				
					<div class="row">
					<div class="visible-phone"><br/></div>
					<a class="link-negro" href="<?php echo Yii::app()->createUrl('cruge/ui/usermanagementadmin'); ?>">
						<div class="span4 " style="background-color:  rgba(208,164,0, 0.5);  -webkit-border-radius: 25px 5px 1px 4px; /* recuerda la primera frase */ -moz-border-radius: 24px; /* si quieres todas las esquinas iguales */ border-radius: 0px 50px 50px 0px;">
							<div class="row">
								<div class="span1 text-center">
									<div class="hidden-phone">
										<?php echo TbHtml::imagePolaroid(Yii::app()->request->baseUrl."/images/iconos/preview.png"); ?>
									</div>
								</div>
								<div class="span3">
									<div class="row">
										<div class="span3">
											<strong>Cuentas de Usuario</strong>
										</div>
									</div>
									<div class="row">
										<div class="span3">
											<p>En este item se puede administrar los distintos usuarios del sistema</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</a>
				</div>
				<br>
			<?php
			}
			 
			if(
				Yii::app()->user->checkAccess('administrador') OR
			    Yii::app()->user->isSuperAdmin
			){ 
			?>					
				<div class="row">
				<div class="visible-phone"><br/></div>
					<a class="link-negro" href="<?php echo Yii::app()->createUrl('cruge/ui/rbacusersassignments'); ?>">
						<div class="span4 " style="background-color:  rgba(208,164,0, 0.5);  -webkit-border-radius: 25px 5px 1px 4px; /* recuerda la primera frase */ -moz-border-radius: 24px; /* si quieres todas las esquinas iguales */ border-radius: 0px 50px 50px 0px;">
							<div class="row">
								<div class="span1 text-center">
									<div class="hidden-phone">
										<?php echo TbHtml::imagePolaroid(Yii::app()->request->baseUrl."/images/iconos/external_contact.png"); ?>
									</div>
								</div>
								<div class="span3">
									<div class="row">
										<div class="span3">
											<strong>Asignar Roles</strong>
										</div>
									</div>
									<div class="row">
										<div class="span3">
											<p>En este item se puede asignar el  rol de cada usuario</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</a>
				</div>
				<br>
			<?php
			}
			 
			if(
				Yii::app()->user->checkAccess('administrador') OR
			    Yii::app()->user->isSuperAdmin
			){ 
			?>					
					<div class="row">
					<div class="visible-phone"><br/></div>
					<a class="link-negro" href="<?php echo Yii::app()->createUrl('usuario/online'); ?>">
						<div class="span4 " style="background-color:  rgba(208,164,0, 0.5);  -webkit-border-radius: 25px 5px 1px 4px; /* recuerda la primera frase */ -moz-border-radius: 24px; /* si quieres todas las esquinas iguales */ border-radius: 0px 50px 50px 0px;">
							<div class="row">
								<div class="span1 text-center">
									<div class="hidden-phone">
										<?php echo TbHtml::imagePolaroid(Yii::app()->request->baseUrl."/images/iconos/user_awake.png"); ?>
									</div>
								</div>
								<div class="span3">
									<div class="row">
										<div class="span3">
											<strong>Usuarios Online</strong>
										</div>
									</div>
									<div class="row">
										<div class="span3">
											<p>En este item se puede ver los usuarios que estan usando el sistema</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</a>
				</div>
				<br>
			<?php
			}

			if(
				Yii::app()->user->checkAccess('administrador') OR
			    Yii::app()->user->isSuperAdmin OR 
			    Yii::app()->user->checkAccess('director')
			){ 
			?>
				<div class="row">
					<div class="visible-phone"><br/></div>
					<a class="link-negro" href="<?php echo Yii::app()->createUrl('Apoderado/admin'); ?>">
						<div class="span4 " style="background-color:  rgba(208,164,0, 0.5);  -webkit-border-radius: 25px 5px 1px 4px; /* recuerda la primera frase */ -moz-border-radius: 24px; /* si quieres todas las esquinas iguales */ border-radius: 0px 50px 50px 0px;">
							<div class="row">
								<div class="span1 text-center">
									<div class="hidden-phone">
										<?php echo TbHtml::imagePolaroid(Yii::app()->request->baseUrl."/images/iconos/interview.png"); ?>
									</div>
								</div>
								<div class="span3">
									<div class="row">
										<div class="span3">
											<strong>Administrar Apoderados</strong>
										</div>
									</div>
									<div class="row">
										<div class="span3">
											<p>En este item se puede administrar los apoderados del sistema</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</a>
				</div>
				<br>
			<?php
			}
			 
			if(
				Yii::app()->user->checkAccess('administrador') OR
			    Yii::app()->user->isSuperAdmin OR 
			    Yii::app()->user->checkAccess('director')
			){ 
			?>
				<div class="row">
					<div class="visible-phone"><br/></div>
					<a class="link-negro" href="<?php echo Yii::app()->createUrl('noticia/create'); ?>">
						<div class="span4 " style="background-color:  rgba(208,164,0, 0.5);  -webkit-border-radius: 25px 5px 1px 4px; /* recuerda la primera frase */ -moz-border-radius: 24px; /* si quieres todas las esquinas iguales */ border-radius: 0px 50px 50px 0px;">
							<div class="row">
								<div class="span1 text-center">
									<div class="hidden-phone">
										<?php echo TbHtml::imagePolaroid(Yii::app()->request->baseUrl."/images/iconos/accepted_document.png"); ?>
									</div>
								</div>
								<div class="span3">
									<div class="row">
										<div class="span3">
											<strong>Ingresar Noticia</strong>
										</div>
									</div>
									<div class="row">
										<div class="span3">
											<p>En este item se puede asignar el  rol de cada usuario</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</a>
				</div>
				<br>
			<?php }

			if(
				Yii::app()->user->checkAccess('administrador') OR
			    Yii::app()->user->isSuperAdmin OR 
			    Yii::app()->user->checkAccess('director')
			){ 
			?>
					<div class="row">
					<div class="visible-phone"><br/></div>
					<a class="link-negro" href="<?php echo Yii::app()->createUrl('InformeHogar/create'); ?>">
						<div class="span4 " style="background-color:  rgba(208,164,0, 0.5);  -webkit-border-radius: 25px 5px 1px 4px; /* recuerda la primera frase */ -moz-border-radius: 24px; /* si quieres todas las esquinas iguales */ border-radius: 0px 50px 50px 0px;">
							<div class="row">
								<div class="span1 text-center">
									<div class="hidden-phone">
										<?php echo TbHtml::imagePolaroid(Yii::app()->request->baseUrl."/images/iconos/admissions2.png"); ?>
									</div>
								</div>
								<div class="span3">
									<div class="row">
										<div class="span3">
											<strong>Crear Informe al Hogar</strong>
										</div>
									</div>
									<div class="row">
										<div class="span3">
											<p>En este item se puede crear un informe al hogar</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</a>
				</div>
				<br>
			<?php } ?>
				
			</div>
			<div class="span4 text-center">

			<?php
			 
			if(
				Yii::app()->user->checkAccess('administrador') OR
			    Yii::app()->user->isSuperAdmin OR 
			    Yii::app()->user->checkAccess('director')
			){ 
			?>
				<div class="row">
					<div class="visible-phone"><br/></div>
					<a class="link-negro" href="<?php echo Yii::app()->createUrl('noticia/admin'); ?>">
						<div class="span4 " style="background-color:  rgba(208,164,0, 0.5);  -webkit-border-radius: 25px 5px 1px 4px; /* recuerda la primera frase */ -moz-border-radius: 24px; /* si quieres todas las esquinas iguales */ border-radius: 0px 50px 50px 0px;">
							<div class="row">
								<div class="span1 text-center">
									<div class="hidden-phone">
										<?php echo TbHtml::imagePolaroid(Yii::app()->request->baseUrl."/images/iconos/bullet.png"); ?>
									</div>
								</div>
								<div class="span3">
									<div class="row">
										<div class="span3">
											<strong>Administrar Noticias</strong>
										</div>
									</div>
									<div class="row">
										<div class="span3">
											<p>En este item se puede asignar el  rol de cada usuario</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</a>
				</div>
				<br>
			<?php
			}


			if(
				Yii::app()->user->checkAccess('administrador') OR
			    Yii::app()->user->isSuperAdmin OR 
			    Yii::app()->user->checkAccess('director') OR
			    Yii::app()->user->checkAccess('evaluador') OR
			    Yii::app()->user->checkAccess('jefe_utp')
			){ 
			?>
				<div class="row">
					<a class="link-negro" href="<?php echo Yii::app()->createUrl('matricula/subir_xml'); ?>">
						<div class="span4 " style="background-color:  rgba(208,164,0, 0.5);  -webkit-border-radius: 25px 5px 1px 4px; /* recuerda la primera frase */ -moz-border-radius: 24px; /* si quieres todas las esquinas iguales */ border-radius: 0px 50px 50px 0px;">
							<div class="row">
								<div class="span1 text-center">
									<div class="hidden-phone">
										<?php echo TbHtml::imagePolaroid(Yii::app()->request->baseUrl."/images/iconos/file_format_xml.png"); ?>
									</div>
								</div>
								<div class="span3">
									<div class="row">
										<div class="span3">
											<strong>Importar Alumnos</strong>
										</div>
									</div>
									<div class="row">
										<div class="span3">
											<p>Con un archivo XML podra importar los alumnos del sistema.</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</a>
					</div>
					<br>
			<?php
			}


			if(
				Yii::app()->user->checkAccess('administrador') OR
			    Yii::app()->user->isSuperAdmin OR 
			    Yii::app()->user->checkAccess('director') OR
			    Yii::app()->user->checkAccess('evaluador')
			){ 
			?>
				<div class="row">
					<a class="link-negro" href="<?php echo Yii::app()->createUrl('promedioanual/termino_ano'); ?>">
						<div class="span4 " style="background-color:  rgba(208,164,0, 0.5);  -webkit-border-radius: 25px 5px 1px 4px; /* recuerda la primera frase */ -moz-border-radius: 24px; /* si quieres todas las esquinas iguales */ border-radius: 0px 50px 50px 0px;">
							<div class="row">
								<div class="span1 text-center">
									<div class="hidden-phone">
										<?php echo TbHtml::imagePolaroid(Yii::app()->request->baseUrl."/images/iconos/diploma.png"); ?>
									</div>
								</div>
								<div class="span3">
									<div class="row">
										<div class="span3">
											<strong>Terminar Año Escolar</strong>
										</div>
									</div>
									<div class="row">
										<div class="span3">
											<p>Las notas se guardan como promedios finales y no se podran modificar</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</a>
					</div>
					<br>
			<?php
			}


			if(
				Yii::app()->user->checkAccess('administrador') OR
			    Yii::app()->user->isSuperAdmin OR 
			    Yii::app()->user->checkAccess('director') OR
			    Yii::app()->user->checkAccess('evaluador')
			){ 
			?>
				<div class="row">
					<a class="link-negro" href="<?php echo Yii::app()->createUrl('asignatura/admin'); ?>">
						<div class="span4 " style="background-color:  rgba(208,164,0, 0.5);  -webkit-border-radius: 25px 5px 1px 4px; /* recuerda la primera frase */ -moz-border-radius: 24px; /* si quieres todas las esquinas iguales */ border-radius: 0px 50px 50px 0px;">
							<div class="row">
								<div class="span1 text-center">
									<div class="hidden-phone">
										<?php echo TbHtml::imagePolaroid(Yii::app()->request->baseUrl."/images/iconos/kerning.png"); ?>
									</div>
								</div>
								<div class="span3">
									<div class="row">
										<div class="span3">
											<strong>Administrar asignaturas</strong>
										</div>
									</div>
									<div class="row">
										<div class="span3">
											<p>Lista de todas las asignaturas del sistema</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</a>
					</div>
					<br>
			<?php } 

			if(
				Yii::app()->user->checkAccess('administrador') OR
			    Yii::app()->user->isSuperAdmin OR 
			    Yii::app()->user->checkAccess('director')
			){ 
			?>
					<div class="row">
					<div class="visible-phone"><br/></div>
					<a class="link-negro" href="<?php echo Yii::app()->createUrl('informeDesarrollo/create'); ?>">
						<div class="span4 " style="background-color:  rgba(208,164,0, 0.5);  -webkit-border-radius: 25px 5px 1px 4px; /* recuerda la primera frase */ -moz-border-radius: 24px; /* si quieres todas las esquinas iguales */ border-radius: 0px 50px 50px 0px;">
							<div class="row">
								<div class="span1 text-center">
									<div class="hidden-phone">
										<?php echo TbHtml::imagePolaroid(Yii::app()->request->baseUrl."/images/iconos/curriculum.png"); ?>
									</div>
								</div>
								<div class="span3">
									<div class="row">
										<div class="span3">
											<strong>Crear Informe Desarrollo</strong>
										</div>
									</div>
									<div class="row">
										<div class="span3">
											<p>En este item se puede crear un informe de desarrollo para el colegio</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</a>
					</div>
					<br>
			<?php } ?>
				
			</div>
		</div>
	</div>
</div>