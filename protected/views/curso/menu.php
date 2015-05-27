<div class="row">
<div class="span12" style="border-top: 3px solid #772000;border-bottom: 3px solid #772000; -webkit-border-radius: 25px 5px 1px 4px; /* recuerda la primera frase */ -moz-border-radius: 24px; /* si quieres todas las esquinas iguales */ border-radius: 25px;">

<div class="row">
	<div class="span6 offset3">
	<div style="padding-left: 10px;">
		<br>
		<h2 class="text-center"><font face="papyrus">Gestion Cursos</font></h2>
	</div>
<?php 
if(
	Yii::app()->user->checkAccess('administrador') OR
	Yii::app()->user->checkAccess('evaluador') OR
    Yii::app()->user->isSuperAdmin OR 
    Yii::app()->user->checkAccess('director')
){ 
?>
	<div class="row">
		<a class="link-negro" href="<?php echo Yii::app()->createUrl('curso/create'); ?>">
			<div class="span4 offset1" style="background-color:  rgba(208,164,0, 0.5);  -webkit-border-radius: 25px 5px 1px 4px; /* recuerda la primera frase */ -moz-border-radius: 24px; /* si quieres todas las esquinas iguales */ border-radius: 0px 50px 50px 0px;">
				<div class="row">
					<div class="span1 text-center">
						<div class="hidden-phone">
							<?php echo TbHtml::imagePolaroid(Yii::app()->request->baseUrl."/images/iconos/exam_pass.png"); ?>
						</div>
					</div>
					<div class="span3">
						<div class="row">
							<div class="span3">
								<strong>Crear Curso</strong>
							</div>
						</div>
						<div class="row">
							<div class="span3">
								<p>En este item se puede crear cursos para el colegio</p>
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
    Yii::app()->user->checkAccess('jefe_utp')
){ 
?>
		<div class="row">
		<div class="visible-phone"><br/></div>
		<a class="link-negro" href="<?php echo Yii::app()->createUrl('curso/admin'); ?>">
			<div class="span4 offset1" style="background-color:  rgba(208,164,0, 0.5);  -webkit-border-radius: 25px 5px 1px 4px; /* recuerda la primera frase */ -moz-border-radius: 24px; /* si quieres todas las esquinas iguales */ border-radius: 0px 50px 50px 0px;">
				<div class="row">
					<div class="span1 text-center">
						<div class="hidden-phone">
							<?php echo TbHtml::imagePolaroid(Yii::app()->request->baseUrl."/images/iconos/zoom.png"); ?>
						</div>
					</div>
					<div class="span3">
						<div class="row">
							<div class="span3">
								<strong>Buscar Cursos</strong>
							</div>
						</div>
						<div class="row">
							<div class="span3">
								<p>En este item se puede buscar cursos por profesor</p>
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
    Yii::app()->user->checkAccess('jefe_utp')
){ 
?>
		<div class="row">
		<div class="visible-phone"><br/></div>
		<a class="link-negro" href="<?php echo Yii::app()->createUrl('informedesarrollo/create'); ?>">
			<div class="span4 offset1" style="background-color:  rgba(208,164,0, 0.5);  -webkit-border-radius: 25px 5px 1px 4px; /* recuerda la primera frase */ -moz-border-radius: 24px; /* si quieres todas las esquinas iguales */ border-radius: 0px 50px 50px 0px;">
				<div class="row">
					<div class="span1 text-center">
						<div class="hidden-phone">
							<?php echo TbHtml::imagePolaroid(Yii::app()->request->baseUrl."/images/iconos/checkmark.png"); ?>
						</div>
					</div>
					<div class="span3">
						<div class="row">
							<div class="span3">
								<strong>Ingreso Informe Desarrollo</strong>
							</div>
						</div>
						<div class="row">
							<div class="span3">
								<p>En este item se puede crear un informe de desarrollo</p>
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
    Yii::app()->user->checkAccess('jefe_utp')
){ 
?>
		<div class="row">
		<div class="visible-phone"><br/></div>
		<a class="link-negro" href="<?php echo Yii::app()->createUrl('informehogar/create'); ?>">
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
								<strong>Ingreso Informe al Hogar</strong>
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
    Yii::app()->user->checkAccess('jefe_utp')
){ 
?>
		<div class="row">
		<div class="visible-phone"><br/></div>
		<a class="link-negro" href="<?php echo Yii::app()->createUrl('curso/lista_cursos'); ?>">
			<div class="span4 offset1" style="background-color:  rgba(208,164,0, 0.5);  -webkit-border-radius: 25px 5px 1px 4px; /* recuerda la primera frase */ -moz-border-radius: 24px; /* si quieres todas las esquinas iguales */ border-radius: 0px 50px 50px 0px;">
				<div class="row">
					<div class="span1 text-center">
						<div class="hidden-phone">
							<?php echo TbHtml::imagePolaroid(Yii::app()->request->baseUrl."/images/iconos/file.png"); ?>
						</div>
					</div>
					<div class="span3">
						<div class="row">
							<div class="span3">
								<strong>Administrar Cursos</strong>
							</div>
						</div>
						<div class="row">
							<div class="span3">
								<p>En este item se puede ver la lista completa de los cursos</p>
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
    Yii::app()->user->checkAccess('jefe_utp') OR
    Yii::app()->user->checkAccess('profesor')
){ 
?>
	<div class="row">
		<a class="link-negro" href="<?php echo Yii::app()->createUrl('curso/buscar_asistencia'); ?>">
			<div class="span4 offset1" style="background-color:  rgba(208,164,0, 0.5);  -webkit-border-radius: 25px 5px 1px 4px; /* recuerda la primera frase */ -moz-border-radius: 24px; /* si quieres todas las esquinas iguales */ border-radius: 0px 50px 50px 0px;">
				<div class="row">
					<div class="span1 text-center">
							<div class="hidden-phone">
							<?php echo TbHtml::imagePolaroid(Yii::app()->request->baseUrl."/images/iconos/attendance_list.png"); ?>
						</div>
					</div>
					<div class="span3">
						<div class="row">
							<div class="span3">
								<strong>Asistencia de Curso</strong>
							</div>
						</div>
						<div class="row">
							<div class="span3">
								<p>En este item se puede ingresar la asistencia de los alumnos de un curso</p>
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
    Yii::app()->user->checkAccess('jefe_utp') OR
    Yii::app()->user->checkAccess('profesor')
){ 
?>
	<div class="row">
		<a class="link-negro" href="<?php echo Yii::app()->createUrl('listacurso'); ?>">
			<div class="span4 offset1" style="background-color:  rgba(208,164,0, 0.5);  -webkit-border-radius: 25px 5px 1px 4px; /* recuerda la primera frase */ -moz-border-radius: 24px; /* si quieres todas las esquinas iguales */ border-radius: 0px 50px 50px 0px;">
				<div class="row">
					<div class="span1 text-center">
							<div class="hidden-phone">
							<?php echo TbHtml::imagePolaroid(Yii::app()->request->baseUrl."/images/iconos/clipboard.png"); ?>
						</div>
					</div>
					<div class="span3">
						<div class="row">
							<div class="span3">
								<strong>Editar lista de alumnos</strong>
							</div>
						</div>
						<div class="row">
							<div class="span3">
								<p>En este item se puede modificar la lista de alumnos de los diferentes cursos</p>
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
		<a class="link-negro" href="<?php echo Yii::app()->createUrl('asignatura/create'); ?>">
			<div class="span4 offset1" style="background-color:  rgba(208,164,0, 0.5);  -webkit-border-radius: 25px 5px 1px 4px; /* recuerda la primera frase */ -moz-border-radius: 24px; /* si quieres todas las esquinas iguales */ border-radius: 0px 50px 50px 0px;">
				<div class="row">
					<div class="span1 text-center">
							<div class="hidden-phone">
							<?php echo TbHtml::imagePolaroid(Yii::app()->request->baseUrl."/images/iconos/replace.png"); ?>
						</div>
					</div>
					<div class="span3">
						<div class="row">
							<div class="span3">
								<strong>Ingresar asignaturas</strong>
							</div>
						</div>
						<div class="row">
							<div class="span3">
								<p>En este item se puede ingresar las diferentes asignaturas del sistema</p>
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
		<a class="link-negro" href="<?php echo Yii::app()->createUrl('//aasignatura/create'); ?>">
			<div class="span4 offset1" style="background-color:  rgba(208,164,0, 0.5);  -webkit-border-radius: 25px 5px 1px 4px; /* recuerda la primera frase */ -moz-border-radius: 24px; /* si quieres todas las esquinas iguales */ border-radius: 0px 50px 50px 0px;">
				<div class="row">
					<div class="span1 text-center">
							<div class="hidden-phone">
							<?php echo TbHtml::imagePolaroid(Yii::app()->request->baseUrl."/images/iconos/import.png"); ?>
						</div>
					</div>
					<div class="span3">
						<div class="row">
							<div class="span3">
								<strong>Asignar Asignaturas</strong>
							</div>
						</div>
						<div class="row">
							<div class="span3">
								<p>En este item se pueden  asignar las asignaturas a los cursos</p>
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