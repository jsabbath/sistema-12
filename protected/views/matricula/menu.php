<div class="row">
<div class="span12">

<div class="row">
	<div class="span6 offset3">
	<div style="padding-left: 10px;">
		<br>
		<h2 class="text-center"><font face="papyrus">Gestion Academica</font></h2>
	</div>
<?php

 
 
if(
	Yii::app()->user->checkAccess('administrador') OR
    Yii::app()->user->isSuperAdmin OR 
    Yii::app()->user->checkAccess('director') OR
    Yii::app()->user->checkAccess('jefe_utp') OR
    Yii::app()->user->checkAccess('profesor')
){ 
?>
	<div class="row">
		<a class="link-negro" href="<?php echo Yii::app()->createUrl('curso/buscar_notas'); ?>">
			<div class="span4 offset1" style="background-color:  rgba(208,164,0, 0.5);  -webkit-border-radius: 25px 5px 1px 4px; /* recuerda la primera frase */ -moz-border-radius: 24px; /* si quieres todas las esquinas iguales */ border-radius: 0px 50px 50px 0px;">
				<div class="row">
					<div class="span1 text-center">
						<div class="hidden-phone">
							<?php echo TbHtml::imagePolaroid(Yii::app()->request->baseUrl."/images/iconos/admissions.png"); ?>
						</div>
					</div>
					<div class="span3">
						<div class="row">
							<div class="span3">
								<strong>Ingreso de Calificaciones</strong>
							</div>
						</div>
						<div class="row">
							<div class="span3">
								<p>En este item se puede matricular a un alumno</p>
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
     Yii::app()->user->checkAccess('profesor') OR
    Yii::app()->user->checkAccess('evaluador') OR
    Yii::app()->user->checkAccess('jefe_utp')
){ 
?>
	<div class="row">
		<a class="link-negro" href="<?php echo Yii::app()->createUrl('evaluacion'); ?>">
			<div class="span4 offset1" style="background-color:  rgba(208,164,0, 0.5);  -webkit-border-radius: 25px 5px 1px 4px; /* recuerda la primera frase */ -moz-border-radius: 24px; /* si quieres todas las esquinas iguales */ border-radius: 0px 50px 50px 0px;">
				<div class="row">
					<div class="span1 text-center">
						<div class="hidden-phone">
							<?php echo TbHtml::imagePolaroid(Yii::app()->request->baseUrl."/images/iconos/track_changes.png"); ?>
						</div>
					</div>
					<div class="span3">
						<div class="row">
							<div class="span3">
								<strong>Evaluar informe Desarrollo</strong>
							</div>
						</div>
						<div class="row">
							<div class="span3">
								<p>En este item se pueden evaluar los diferentes cursos.</p>
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
     Yii::app()->user->checkAccess('profesor_prebasica') OR
    Yii::app()->user->checkAccess('evaluador') OR
    Yii::app()->user->checkAccess('jefe_utp')
){ 
?>
	<div class="row">
		<a class="link-negro" href="<?php echo Yii::app()->createUrl('evaHogar/evaluar'); ?>">
			<div class="span4 offset1" style="background-color:  rgba(208,164,0, 0.5);  -webkit-border-radius: 25px 5px 1px 4px; /* recuerda la primera frase */ -moz-border-radius: 24px; /* si quieres todas las esquinas iguales */ border-radius: 0px 50px 50px 0px;">
				<div class="row">
					<div class="span1 text-center">
						<div class="hidden-phone">
							<?php echo TbHtml::imagePolaroid(Yii::app()->request->baseUrl."/images/iconos/horizontal_line.png"); ?>
						</div>
					</div>
					<div class="span3">
						<div class="row">
							<div class="span3">
								<strong>Evaluar informe Hogar</strong>
							</div>
						</div>
						<div class="row">
							<div class="span3">
								<p>En este item se pueden evaluar los diferentes Alumnos.</p>
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
		<a class="link-negro" href="<?php echo Yii::app()->createUrl('Curso/buscar_asistencia'); ?>">
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
		<a class="link-negro" href="<?php echo Yii::app()->createUrl('Notas/situacion_alum'); ?>">
			<div class="span4 offset1" style="background-color:  rgba(208,164,0, 0.5);  -webkit-border-radius: 25px 5px 1px 4px; /* recuerda la primera frase */ -moz-border-radius: 24px; /* si quieres todas las esquinas iguales */ border-radius: 0px 50px 50px 0px;">
				<div class="row">
					<div class="span1 text-center">
							<div class="hidden-phone">
							<?php echo TbHtml::imagePolaroid(Yii::app()->request->baseUrl."/images/iconos/certificate.png"); ?>
						</div>
					</div>
					<div class="span3">
						<div class="row">
							<div class="span3">
								<strong>Situacion Final</strong>
							</div>
						</div>
						<div class="row">
							<div class="span3">
								<p>En este item se puede ver la situacion  de los alumnos por curso</p>
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