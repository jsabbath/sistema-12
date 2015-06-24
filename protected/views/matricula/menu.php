<div class="row">
<div class="span12">

<div class="row">
	<div class="span6 offset3">
	<div style="padding-left: 10px;">
		<br>
		<h2 class="text-center"><font face="papyrus">Academico</font></h2>
	</div>
<?php
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
    Yii::app()->user->checkAccess('profesor')
){ 
?>
	<div class="row">
		<a class="link-negro" href="<?php echo Yii::app()->createUrl('matricula/create'); ?>">
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
								<strong>Ingreso de matricula</strong>
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
    Yii::app()->user->checkAccess('profesor')
){ 
?>
		<div class="row">
		<div class="visible-phone"><br/></div>
		<a class="link-negro" href="<?php echo Yii::app()->createUrl('matricula/listaCompleta'); ?>">
			<div class="span4 offset1" style="background-color:  rgba(208,164,0, 0.5);  -webkit-border-radius: 25px 5px 1px 4px; /* recuerda la primera frase */ -moz-border-radius: 24px; /* si quieres todas las esquinas iguales */ border-radius: 0px 50px 50px 0px;">
				<div class="row">
					<div class="span1 text-center">
						<div class="hidden-phone">
							<?php echo TbHtml::imagePolaroid(Yii::app()->request->baseUrl."/images/iconos/edit.png"); ?>
						</div>
					</div>
					<div class="span3">
						<div class="row">
							<div class="span3">
								<strong>Modificar Matricula</strong>
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
    Yii::app()->user->checkAccess('director') OR
    Yii::app()->user->checkAccess('profesor')
){ 
?>
		<div class="row">
		<div class="visible-phone"><br/></div>
		<a class="link-negro" href="<?php echo Yii::app()->createUrl('matricula/admin'); ?>">
			<div class="span4 offset1" style="background-color:  rgba(208,164,0, 0.5);  -webkit-border-radius: 25px 5px 1px 4px; /* recuerda la primera frase */ -moz-border-radius: 24px; /* si quieres todas las esquinas iguales */ border-radius: 0px 50px 50px 0px;">
				<div class="row">
					<div class="span1 text-center">
						<div class="hidden-phone">
							<?php echo TbHtml::imagePolaroid(Yii::app()->request->baseUrl."/images/iconos/exam_fail.png"); ?>
						</div>
					</div>
					<div class="span3">
						<div class="row">
							<div class="span3">
								<strong>Retirar Alumno</strong>
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
     Yii::app()->user->checkAccess('profesor') OR
    Yii::app()->user->checkAccess('evaluador') OR
    Yii::app()->user->checkAccess('jefe_utp')
){ 
?>
	<div class="row">
		<a class="link-negro" href="<?php echo Yii::app()->createUrl('evahogar/evaluar'); ?>">
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
    Yii::app()->user->checkAccess('jefe_utp')

){ 
?>
	<div class="row">
		<a class="link-negro" href="<?php echo Yii::app()->createUrl('matricula/listaCompleta'); ?>">
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
								<strong>lista de alumnos General</strong>
							</div>
						</div>
						<div class="row">
							<div class="span3">
								<p>En este item se puede modificar la matricula de los diferentes alumnos</p>
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
<br>
</div>

</div>
</div>