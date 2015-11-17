<div class="row">
<div class="span12">

<div class="row">
	<div class="span6 offset3">
	<div style="padding-left: 10px;">
		<br>
		<h2 class="text-center"><font face="papyrus">Certificados e Informes</font></h2>
	</div>
<?php


if(
	Yii::app()->user->checkAccess('administrador') OR
	Yii::app()->user->checkAccess('administrativo') OR
	Yii::app()->user->checkAccess('profesor') OR
    Yii::app()->user->isSuperAdmin OR 
    Yii::app()->user->checkAccess('director') OR
    Yii::app()->user->checkAccess('evaluador') OR
    Yii::app()->user->checkAccess('jefe_utp')
){ 
?>
		<div class="row">
		<div class="visible-phone"><br/></div>
		<a class="link-negro" href="<?php echo Yii::app()->createUrl('matricula/informe_notas_par'); ?>">
			<div class="span4 offset1" style="background-color:  rgba(208,164,0, 0.5);  -webkit-border-radius: 25px 5px 1px 4px; /* recuerda la primera frase */ -moz-border-radius: 24px; /* si quieres todas las esquinas iguales */ border-radius: 0px 50px 50px 0px;">
				<div class="row">
					<div class="span1 text-center">
						<div class="hidden-phone">
							<?php echo TbHtml::imagePolaroid(Yii::app()->request->baseUrl."/images/iconos/convert_to_text.png"); ?>
						</div>
					</div>
					<div class="span3">
						<div class="row">
							<div class="span3">
								<strong>Informes de Nota por alumno</strong>
							</div>
						</div>
						<div class="row">
							<div class="span3">
								<p>Se puede imprimir informes de notas parciales o Anual  de estudio por alumno.</p>
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
	Yii::app()->user->checkAccess('administrativo') OR
	Yii::app()->user->checkAccess('profesor') OR
    Yii::app()->user->isSuperAdmin OR 
    Yii::app()->user->checkAccess('director') OR
    Yii::app()->user->checkAccess('evaluador') OR
    Yii::app()->user->checkAccess('jefe_utp')
){ 
?>
		<div class="row">
		<div class="visible-phone"><br/></div>
		<a class="link-negro" href="<?php echo Yii::app()->createUrl('matricula/curso_par'); ?>">
			<div class="span4 offset1" style="background-color:  rgba(208,164,0, 0.5);  -webkit-border-radius: 25px 5px 1px 4px; /* recuerda la primera frase */ -moz-border-radius: 24px; /* si quieres todas las esquinas iguales */ border-radius: 0px 50px 50px 0px;">
				<div class="row">
					<div class="span1 text-center">
						<div class="hidden-phone">
							<?php echo TbHtml::imagePolaroid(Yii::app()->request->baseUrl."/images/iconos/file_format_pdf.png"); ?>
						</div>
					</div>
					<div class="span3">
						<div class="row">
							<div class="span3">
								<strong>Informes de Nota por curso</strong>
							</div>
						</div>
						<div class="row">
							<div class="span3">
								<p>Se puede imprimir el informe de notas parciales o Anual de estudio por curso</p>
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
	Yii::app()->user->checkAccess('administrativo') OR
    Yii::app()->user->isSuperAdmin OR 
    Yii::app()->user->checkAccess('director') OR
    Yii::app()->user->checkAccess('evaluador') OR
    Yii::app()->user->checkAccess('profesor_prebasica') OR
    Yii::app()->user->checkAccess('jefe_utp')
){ 
?>
		<div class="row">
		<div class="visible-phone"><br/></div>
		<a class="link-negro" href="<?php echo Yii::app()->createUrl('evaHogar/informe'); ?>">
			<div class="span4 offset1" style="background-color:  rgba(208,164,0, 0.5);  -webkit-border-radius: 25px 5px 1px 4px; /* recuerda la primera frase */ -moz-border-radius: 24px; /* si quieres todas las esquinas iguales */ border-radius: 0px 50px 50px 0px;">
				<div class="row">
					<div class="span1 text-center">
						<div class="hidden-phone">
							<?php echo TbHtml::imagePolaroid(Yii::app()->request->baseUrl."/images/iconos/print_layout.png"); ?>
						</div>
					</div>
					<div class="span3">
						<div class="row">
							<div class="span3">
								<strong>Informes Al Hogar</strong>
							</div>
						</div>
						<div class="row">
							<div class="span3">
								<p>En este item se puede imprimir los informes por curso o alumno</p>
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
	Yii::app()->user->checkAccess('administrativo') OR
	Yii::app()->user->checkAccess('profesor') OR
    Yii::app()->user->isSuperAdmin OR 
    Yii::app()->user->checkAccess('director') OR
    Yii::app()->user->checkAccess('evaluador') OR
    Yii::app()->user->checkAccess('jefe_utp')
){ 
?>
		<div class="row">
		<div class="visible-phone"><br/></div>
		<a class="link-negro" href="<?php echo Yii::app()->createUrl('evaluacion/lista_alumnos_eva'); ?>">
			<div class="span4 offset1" style="background-color:  rgba(208,164,0, 0.5);  -webkit-border-radius: 25px 5px 1px 4px; /* recuerda la primera frase */ -moz-border-radius: 24px; /* si quieres todas las esquinas iguales */ border-radius: 0px 50px 50px 0px;">
				<div class="row">
					<div class="span1 text-center">
						<div class="hidden-phone">
							<?php echo TbHtml::imagePolaroid(Yii::app()->request->baseUrl."/images/iconos/document_map.png"); ?>
						</div>
					</div>
					<div class="span3">
						<div class="row">
							<div class="span3">
								<strong>Informes de Personalidad</strong>
							</div>
						</div>
						<div class="row">
							<div class="span3">
								<p>En este item se puede imprimir los informes por alumno</p>
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
	Yii::app()->user->checkAccess('administrativo') OR
	Yii::app()->user->checkAccess('profesor') OR
    Yii::app()->user->isSuperAdmin OR 
    Yii::app()->user->checkAccess('director') OR
    Yii::app()->user->checkAccess('evaluador') OR
    Yii::app()->user->checkAccess('profesor_prebasica') OR
    Yii::app()->user->checkAccess('jefe_utp')
){ 
?>
		<div class="row">
		<div class="visible-phone"><br/></div>
		<a class="link-negro" href="<?php echo Yii::app()->createUrl('matricula/informe'); ?>">
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
								<strong>Certificado de Alumno Regular</strong>
							</div>
						</div>
						<div class="row">
							<div class="span3">
								<p>En este item se puede generar un certificado para los alumnos</p>
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
	Yii::app()->user->checkAccess('administrativo') OR
	Yii::app()->user->checkAccess('profesor') OR
    Yii::app()->user->isSuperAdmin OR 
    Yii::app()->user->checkAccess('director') OR
    Yii::app()->user->checkAccess('evaluador') OR
    Yii::app()->user->checkAccess('profesor_prebasica') OR
    Yii::app()->user->checkAccess('jefe_utp')
){ 
?>
		<div class="row">
		<div class="visible-phone"><br/></div>
		<a class="link-negro" href="<?php echo Yii::app()->createUrl('notas/list_cur'); ?>">
			<div class="span4 offset1" style="background-color:  rgba(208,164,0, 0.5);  -webkit-border-radius: 25px 5px 1px 4px; /* recuerda la primera frase */ -moz-border-radius: 24px; /* si quieres todas las esquinas iguales */ border-radius: 0px 50px 50px 0px;">
				<div class="row">
					<div class="span1 text-center">
						<div class="hidden-phone">
							<?php echo TbHtml::imagePolaroid(Yii::app()->request->baseUrl."/images/iconos/word_wrap2.png"); ?>
						</div>
					</div>
					<div class="span3">
						<div class="row">
							<div class="span3">
								<strong>Consolidado de Notas</strong>
							</div>
						</div>
						<div class="row">
							<div class="span3">
								<p>En este Item se puede imprimir el Consolidado  de notas por curso</p>
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
	Yii::app()->user->checkAccess('administrativo') OR
	Yii::app()->user->checkAccess('profesor') OR
    Yii::app()->user->isSuperAdmin OR 
    Yii::app()->user->checkAccess('director') OR
    Yii::app()->user->checkAccess('evaluador') OR
    Yii::app()->user->checkAccess('profesor_prebasica') OR
    Yii::app()->user->checkAccess('jefe_utp')
){ 
?>
		<div class="row">
		<div class="visible-phone"><br/></div>
		<a class="link-negro" href="<?php echo Yii::app()->createUrl('matricula/certificado_anual'); ?>">
			<div class="span4 offset1" style="background-color:  rgba(208,164,0, 0.5);  -webkit-border-radius: 25px 5px 1px 4px; /* recuerda la primera frase */ -moz-border-radius: 24px; /* si quieres todas las esquinas iguales */ border-radius: 0px 50px 50px 0px;">
				<div class="row">
					<div class="span1 text-center">
						<div class="hidden-phone">
							<?php echo TbHtml::imagePolaroid(Yii::app()->request->baseUrl."/images/iconos/grades_report.png"); ?>
						</div>
					</div>
					<div class="span3">
						<div class="row">
							<div class="span3">
								<strong>Certificado Anual de Estudio</strong>
							</div>
						</div>
						<div class="row">
							<div class="span3">
								<p>En este Item se puede imprimir el Certificado anual de estudio</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</a>
	</div>
	<br>
<?php } 


?>
</div>		
<br>
</div>

</div>
</div>