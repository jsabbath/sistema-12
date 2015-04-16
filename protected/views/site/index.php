<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<div class="row" id="academico">

<div class="span12" style="border-top: 3px solid #772000;border-bottom: 3px solid #772000; -webkit-border-radius: 25px 5px 1px 4px; /* recuerda la primera frase */ -moz-border-radius: 24px; /* si quieres todas las esquinas iguales */ border-radius: 25px;">
	<div style="padding-left: 10px;">
		<br>
		<h2><font face="papyrus">Academico</font></h2>
	</div>
	<div class="row">
		<a class="link-negro" href="<?php echo Yii::app()->createUrl('matricula/create'); ?>">
			<div class="span4" style="background-color:  rgba(208,164,0, 0.5);  -webkit-border-radius: 25px 5px 1px 4px; /* recuerda la primera frase */ -moz-border-radius: 24px; /* si quieres todas las esquinas iguales */ border-radius: 0px 50px 50px 0px;">
				<div class="row">
					<div class="span1 text-center">
						<div class="hidden-phone">
							<?php echo TbHtml::imagePolaroid(Yii::app()->request->baseUrl."/images/iconos/matricula_add.png"); ?>
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
		<div class="visible-phone"><br/></div>
		<a class="link-negro" href="<?php echo Yii::app()->createUrl('matricula/listaCompleta'); ?>">
			<div class="span4" style="background-color:  rgba(208,164,0, 0.5);  -webkit-border-radius: 25px 5px 1px 4px; /* recuerda la primera frase */ -moz-border-radius: 24px; /* si quieres todas las esquinas iguales */ border-radius: 0px 50px 50px 0px;">
				<div class="row">
					<div class="span1 text-center">
						<div class="hidden-phone">
							<?php echo TbHtml::imagePolaroid(Yii::app()->request->baseUrl."/images/iconos/matricula_update.png"); ?>
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
		<div class="visible-phone"><br/></div>
		<a class="link-negro" href="<?php echo Yii::app()->createUrl('matricula/admin'); ?>">
			<div class="span4" style="background-color:  rgba(208,164,0, 0.5);  -webkit-border-radius: 25px 5px 1px 4px; /* recuerda la primera frase */ -moz-border-radius: 24px; /* si quieres todas las esquinas iguales */ border-radius: 0px 50px 50px 0px;">
				<div class="row">
					<div class="span1 text-center">
						<div class="hidden-phone">
							<?php echo TbHtml::imagePolaroid(Yii::app()->request->baseUrl."/images/iconos/matricula_delete.png"); ?>
						</div>
					</div>
					<div class="span3">
						<div class="row">
							<div class="span3">
								<strong>Eliminar Matricula</strong>
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
	<div class="row">
		<a class="link-negro" href="<?php echo Yii::app()->createUrl('matricula/create'); ?>">
			<div class="span4" style="background-color:  rgba(208,164,0, 0.5);  -webkit-border-radius: 25px 5px 1px 4px; /* recuerda la primera frase */ -moz-border-radius: 24px; /* si quieres todas las esquinas iguales */ border-radius: 0px 50px 50px 0px;">
				<div class="row">
					<div class="span1 text-center">
						<div class="hidden-phone">
							<?php echo TbHtml::imagePolaroid(Yii::app()->request->baseUrl."/images/iconos/calificaciones.png"); ?>
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
		<div class="visible-phone"><br/></div>
		<a class="link-negro" href="<?php echo Yii::app()->createUrl('matricula/admin'); ?>">
			<div class="span4" style="background-color:  rgba(208,164,0, 0.5);  -webkit-border-radius: 25px 5px 1px 4px; /* recuerda la primera frase */ -moz-border-radius: 24px; /* si quieres todas las esquinas iguales */ border-radius: 0px 50px 50px 0px;">
				<div class="row">
					<div class="span1 text-center">
						<div class="hidden-phone">
							<?php echo TbHtml::imagePolaroid(Yii::app()->request->baseUrl."/images/iconos/desarrollo.png"); ?>
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
								<p>En este item se puede dar de baja a un alumno</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</a>
	</div>
	<br>
</div>		
<br>
<div class="span12" style="border-top: 3px solid #772000;border-bottom: 3px solid #772000; -webkit-border-radius: 25px 5px 1px 4px; /* recuerda la primera frase */ -moz-border-radius: 24px; /* si quieres todas las esquinas iguales */ border-radius: 25px;">
	<div style="padding-left: 10px;">
		<br>
		<h2><font face="papyrus">Gestion Cursos</font></h2>
	</div>
	<div class="row">
		<a class="link-negro" href="<?php echo Yii::app()->createUrl('curso/admin'); ?>">
			<div class="span4" style="background-color:  rgba(208,164,0, 0.5);  -webkit-border-radius: 25px 5px 1px 4px; /* recuerda la primera frase */ -moz-border-radius: 24px; /* si quieres todas las esquinas iguales */ border-radius: 0px 50px 50px 0px;">
				<div class="row">
					<div class="span1 text-center">
						<div class="hidden-phone">
							<?php echo TbHtml::imagePolaroid(Yii::app()->request->baseUrl."/images/eevee.gif"); ?>
						</div>
					</div>
					<div class="span3">
						<div class="row">
							<div class="span3">
								<strong>Generacion curso</strong>
							</div>
						</div>
						<div class="row">
							<div class="span3">
								<p>En este item se puede administrar los cursos del colegio</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</a>
		<div class="visible-phone"><br/></div>
		<a class="link-negro" href="<?php echo Yii::app()->createUrl('informedesarrollo/create'); ?>">
			<div class="span4" style="background-color:  rgba(208,164,0, 0.5);  -webkit-border-radius: 25px 5px 1px 4px; /* recuerda la primera frase */ -moz-border-radius: 24px; /* si quieres todas las esquinas iguales */ border-radius: 0px 50px 50px 0px;">
				<div class="row">
					<div class="span1 text-center">
						<div class="hidden-phone">
							<?php echo TbHtml::imagePolaroid(Yii::app()->request->baseUrl."/images/jolteon.gif"); ?>
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
		<div class="visible-phone"><br/></div>
		<a class="link-negro" href="<?php echo Yii::app()->createUrl('informedesarrollo/inf_d'); ?>">
			<div class="span4" style="background-color:  rgba(208,164,0, 0.5);  -webkit-border-radius: 25px 5px 1px 4px; /* recuerda la primera frase */ -moz-border-radius: 24px; /* si quieres todas las esquinas iguales */ border-radius: 0px 50px 50px 0px;">
				<div class="row">
					<div class="span1 text-center">
						<div class="hidden-phone">
							<?php echo TbHtml::imagePolaroid(Yii::app()->request->baseUrl."/images/vaporeon.gif"); ?>
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
	<div class="row">
		<a class="link-negro" href="<?php echo Yii::app()->createUrl('matricula/create'); ?>">
			<div class="span4" style="background-color:  rgba(208,164,0, 0.5);  -webkit-border-radius: 25px 5px 1px 4px; /* recuerda la primera frase */ -moz-border-radius: 24px; /* si quieres todas las esquinas iguales */ border-radius: 0px 50px 50px 0px;">
				<div class="row">
					<div class="span1 text-center">
						<div class="hidden-phone">
							<?php echo TbHtml::imagePolaroid(Yii::app()->request->baseUrl."/images/flareon.gif"); ?>
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
		<div class="visible-phone"><br/></div>
		<a class="link-negro" href="<?php echo Yii::app()->createUrl('matricula/admin'); ?>">
			<div class="span4" style="background-color:  rgba(208,164,0, 0.5);  -webkit-border-radius: 25px 5px 1px 4px; /* recuerda la primera frase */ -moz-border-radius: 24px; /* si quieres todas las esquinas iguales */ border-radius: 0px 50px 50px 0px;">
				<div class="row">
					<div class="span1 text-center">
						<div class="hidden-phone">
							<?php echo TbHtml::imagePolaroid(Yii::app()->request->baseUrl."/images/umbreon.gif"); ?>
						</div>
					</div>
					<div class="span3">
						<div class="row">
							<div class="span3">
								<strong>Dar baja matricula</strong>
							</div>
						</div>
						<div class="row">
							<div class="span3">
								<p>En este item se puede dar de baja a un alumno</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</a>
		<div class="visible-phone"><br/></div>
		<a class="link-negro" href="<?php echo Yii::app()->createUrl('curso/buscar_notas'); ?>">
			<div class="span4" style="background-color:  rgba(208,164,0, 0.5);  -webkit-border-radius: 25px 5px 1px 4px; /* recuerda la primera frase */ -moz-border-radius: 24px; /* si quieres todas las esquinas iguales */ border-radius: 0px 50px 50px 0px;">
				<div class="row">
					<div class="span1 text-center">
						<div class="hidden-phone">
							<?php echo TbHtml::imagePolaroid(Yii::app()->request->baseUrl."/images/espeon.gif"); ?>
						</div>
					</div>
					<div class="span3">
						<div class="row">
							<div class="span3">
								<strong>Calificaciones parciales</strong>
							</div>
						</div>
						<div class="row">
							<div class="span3">
								<p>En este item se puede ingresar las notas en cada asignatura</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</a>
	</div>
	<br>
	<div class="row">
		<a class="link-negro" href="<?php echo Yii::app()->createUrl('cruge/ui/usermanagementadmin'); ?>">
			<div class="span4" style="background-color:  rgba(208,164,0, 0.5);  -webkit-border-radius: 25px 5px 1px 4px; /* recuerda la primera frase */ -moz-border-radius: 24px; /* si quieres todas las esquinas iguales */ border-radius: 0px 50px 50px 0px;">
				<div class="row">
					<div class="span1 text-center">
						<div class="hidden-phone">
							<?php echo TbHtml::imagePolaroid(Yii::app()->request->baseUrl."/images/leaf.gif"); ?>
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
								<p>En este item se puede administrar los distintos usuarios del sistema</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</a>
		<div class="visible-phone"><br/></div>
		<a class="link-negro" href="<?php echo Yii::app()->createUrl('parametro/index'); ?>">
			<div class="span4" style="background-color:  rgba(208,164,0, 0.5);  -webkit-border-radius: 25px 5px 1px 4px; /* recuerda la primera frase */ -moz-border-radius: 24px; /* si quieres todas las esquinas iguales */ border-radius: 0px 50px 50px 0px;">
				<div class="row">
					<div class="span1 text-center">
						<div class="hidden-phone">
							<?php echo TbHtml::imagePolaroid(Yii::app()->request->baseUrl."/images/glaceon.gif"); ?>
						</div>
					</div>
					<div class="span3">
						<div class="row">
							<div class="span3">
								<strong>Parametros</strong>
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
</div>
<br>
<div class="span12" style="border-top: 3px solid #772000;border-bottom: 3px solid #772000; -webkit-border-radius: 25px 5px 1px 4px; /* recuerda la primera frase */ -moz-border-radius: 24px; /* si quieres todas las esquinas iguales */ border-radius: 25px;">
	<div style="padding-left: 10px;">
	<br>
	<h2><font face="papyrus">Certificados e Informes</font></h2>
	</div>
	<div class="row">
		<a class="link-negro" href="<?php echo Yii::app()->createUrl('curso/admin'); ?>">
			<div class="span4" style="background-color:  rgba(208,164,0, 0.5);  -webkit-border-radius: 25px 5px 1px 4px; /* recuerda la primera frase */ -moz-border-radius: 24px; /* si quieres todas las esquinas iguales */ border-radius: 0px 50px 50px 0px;">
				<div class="row">
					<div class="span1 text-center">
						<div class="hidden-phone">
							<?php echo TbHtml::imagePolaroid(Yii::app()->request->baseUrl."/images/eevee.gif"); ?>
						</div>
					</div>
					<div class="span3">
						<div class="row">
							<div class="span3">
								<strong>Generacion curso</strong>
							</div>
						</div>
						<div class="row">
							<div class="span3">
								<p>En este item se puede administrar los cursos del colegio</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</a>
		<div class="visible-phone"><br/></div>
		<a class="link-negro" href="<?php echo Yii::app()->createUrl('informedesarrollo/create'); ?>">
			<div class="span4" style="background-color:  rgba(208,164,0, 0.5);  -webkit-border-radius: 25px 5px 1px 4px; /* recuerda la primera frase */ -moz-border-radius: 24px; /* si quieres todas las esquinas iguales */ border-radius: 0px 50px 50px 0px;">
				<div class="row">
					<div class="span1 text-center">
						<div class="hidden-phone">
							<?php echo TbHtml::imagePolaroid(Yii::app()->request->baseUrl."/images/jolteon.gif"); ?>
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
		<div class="visible-phone"><br/></div>
		<a class="link-negro" href="<?php echo Yii::app()->createUrl('informedesarrollo/inf_d'); ?>">
			<div class="span4" style="background-color:  rgba(208,164,0, 0.5);  -webkit-border-radius: 25px 5px 1px 4px; /* recuerda la primera frase */ -moz-border-radius: 24px; /* si quieres todas las esquinas iguales */ border-radius: 0px 50px 50px 0px;">
				<div class="row">
					<div class="span1 text-center">
						<div class="hidden-phone">
							<?php echo TbHtml::imagePolaroid(Yii::app()->request->baseUrl."/images/vaporeon.gif"); ?>
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
		<div class="row">
		<a class="link-negro" href="<?php echo Yii::app()->createUrl('matricula/create'); ?>">
			<div class="span4" style="background-color:  rgba(208,164,0, 0.5);  -webkit-border-radius: 25px 5px 1px 4px; /* recuerda la primera frase */ -moz-border-radius: 24px; /* si quieres todas las esquinas iguales */ border-radius: 0px 50px 50px 0px;">
				<div class="row">
					<div class="span1 text-center">
						<div class="hidden-phone">
							<?php echo TbHtml::imagePolaroid(Yii::app()->request->baseUrl."/images/flareon.gif"); ?>
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
		<div class="visible-phone"><br/></div>
		<a class="link-negro" href="<?php echo Yii::app()->createUrl('matricula/admin'); ?>">
			<div class="span4" style="background-color:  rgba(208,164,0, 0.5);  -webkit-border-radius: 25px 5px 1px 4px; /* recuerda la primera frase */ -moz-border-radius: 24px; /* si quieres todas las esquinas iguales */ border-radius: 0px 50px 50px 0px;">
				<div class="row">
					<div class="span1 text-center">
						<div class="hidden-phone">
							<?php echo TbHtml::imagePolaroid(Yii::app()->request->baseUrl."/images/umbreon.gif"); ?>
						</div>
					</div>
					<div class="span3">
						<div class="row">
							<div class="span3">
								<strong>Dar baja matricula</strong>
							</div>
						</div>
						<div class="row">
							<div class="span3">
								<p>En este item se puede dar de baja a un alumno</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</a>
		<div class="visible-phone"><br/></div>
		<a class="link-negro" href="<?php echo Yii::app()->createUrl('curso/buscar_notas&id=11'); ?>">
			<div class="span4" style="background-color:  rgba(208,164,0, 0.5);  -webkit-border-radius: 25px 5px 1px 4px; /* recuerda la primera frase */ -moz-border-radius: 24px; /* si quieres todas las esquinas iguales */ border-radius: 0px 50px 50px 0px;">
				<div class="row">
					<div class="span1 text-center">
						<div class="hidden-phone">
							<?php echo TbHtml::imagePolaroid(Yii::app()->request->baseUrl."/images/espeon.gif"); ?>
						</div>
					</div>
					<div class="span3">
						<div class="row">
							<div class="span3">
								<strong>Calificaciones parciales</strong>
							</div>
						</div>
						<div class="row">
							<div class="span3">
								<p>En este item se puede ingresar las notas en cada asignatura</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</a>
		</div>
		<br>
		<div class="row">
		<a class="link-negro" href="<?php echo Yii::app()->createUrl('cruge/ui/usermanagementadmin'); ?>">
			<div class="span4" style="background-color:  rgba(208,164,0, 0.5);  -webkit-border-radius: 25px 5px 1px 4px; /* recuerda la primera frase */ -moz-border-radius: 24px; /* si quieres todas las esquinas iguales */ border-radius: 0px 50px 50px 0px;">
				<div class="row">
					<div class="span1 text-center">
						<div class="hidden-phone">
							<?php echo TbHtml::imagePolaroid(Yii::app()->request->baseUrl."/images/leaf.gif"); ?>
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
								<p>En este item se puede administrar los distintos usuarios del sistema</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</a>
		<div class="visible-phone"><br/></div>
		<a class="link-negro" href="<?php echo Yii::app()->createUrl('parametro/index'); ?>">
			<div class="span4" style="background-color:  rgba(208,164,0, 0.5);  -webkit-border-radius: 25px 5px 1px 4px; /* recuerda la primera frase */ -moz-border-radius: 24px; /* si quieres todas las esquinas iguales */ border-radius: 0px 50px 50px 0px;">
				<div class="row">
					<div class="span1 text-center">
						<div class="hidden-phone">
							<?php echo TbHtml::imagePolaroid(Yii::app()->request->baseUrl."/images/glaceon.gif"); ?>
						</div>
					</div>
					<div class="span3">
						<div class="row">
							<div class="span3">
								<strong>Parametros</strong>
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
</div>				
<br>
<div class="span12" style="border-top: 3px solid #772000;border-bottom: 3px solid #772000; -webkit-border-radius: 25px 5px 1px 4px; /* recuerda la primera frase */ -moz-border-radius: 24px; /* si quieres todas las esquinas iguales */ border-radius: 25px;">
	<div style="padding-left: 10px;">
	<br>
	<h2><font face="papyrus">Administracion</font></h2>
	</div>
	<div class="row">
		<a class="link-negro" href="<?php echo Yii::app()->createUrl('usuario/create'); ?>">
			<div class="span4" style="background-color:  rgba(208,164,0, 0.5);  -webkit-border-radius: 25px 5px 1px 4px; /* recuerda la primera frase */ -moz-border-radius: 24px; /* si quieres todas las esquinas iguales */ border-radius: 0px 50px 50px 0px;">
				<div class="row">
					<div class="span1 text-center">
						<div class="hidden-phone">
							<?php echo TbHtml::imagePolaroid(Yii::app()->request->baseUrl."/images/eevee.gif"); ?>
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
		<div class="visible-phone"><br/></div>
		<a class="link-negro" href="<?php echo Yii::app()->createUrl('usuario/admin'); ?>">
			<div class="span4" style="background-color:  rgba(208,164,0, 0.5);  -webkit-border-radius: 25px 5px 1px 4px; /* recuerda la primera frase */ -moz-border-radius: 24px; /* si quieres todas las esquinas iguales */ border-radius: 0px 50px 50px 0px;">
				<div class="row">
					<div class="span1 text-center">
						<div class="hidden-phone">
							<?php echo TbHtml::imagePolaroid(Yii::app()->request->baseUrl."/images/jolteon.gif"); ?>
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
		<div class="visible-phone"><br/></div>
		<a class="link-negro" href="<?php echo Yii::app()->createUrl('informedesarrollo/inf_d'); ?>">
			<div class="span4" style="background-color:  rgba(208,164,0, 0.5);  -webkit-border-radius: 25px 5px 1px 4px; /* recuerda la primera frase */ -moz-border-radius: 24px; /* si quieres todas las esquinas iguales */ border-radius: 0px 50px 50px 0px;">
				<div class="row">
					<div class="span1 text-center">
						<div class="hidden-phone">
							<?php echo TbHtml::imagePolaroid(Yii::app()->request->baseUrl."/images/vaporeon.gif"); ?>
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
		<div class="row">
		<a class="link-negro" href="<?php echo Yii::app()->createUrl('matricula/create'); ?>">
			<div class="span4" style="background-color:  rgba(208,164,0, 0.5);  -webkit-border-radius: 25px 5px 1px 4px; /* recuerda la primera frase */ -moz-border-radius: 24px; /* si quieres todas las esquinas iguales */ border-radius: 0px 50px 50px 0px;">
				<div class="row">
					<div class="span1 text-center">
						<div class="hidden-phone">
							<?php echo TbHtml::imagePolaroid(Yii::app()->request->baseUrl."/images/flareon.gif"); ?>
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
		<div class="visible-phone"><br/></div>
		<a class="link-negro" href="<?php echo Yii::app()->createUrl('matricula/admin'); ?>">
			<div class="span4" style="background-color:  rgba(208,164,0, 0.5);  -webkit-border-radius: 25px 5px 1px 4px; /* recuerda la primera frase */ -moz-border-radius: 24px; /* si quieres todas las esquinas iguales */ border-radius: 0px 50px 50px 0px;">
				<div class="row">
					<div class="span1 text-center">
						<div class="hidden-phone">
							<?php echo TbHtml::imagePolaroid(Yii::app()->request->baseUrl."/images/umbreon.gif"); ?>
						</div>
					</div>
					<div class="span3">
						<div class="row">
							<div class="span3">
								<strong>Dar baja matricula</strong>
							</div>
						</div>
						<div class="row">
							<div class="span3">
								<p>En este item se puede dar de baja a un alumno</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</a>
		<div class="visible-phone"><br/></div>
		<a class="link-negro" href="<?php echo Yii::app()->createUrl('curso/buscar_notas&id=11'); ?>">
			<div class="span4" style="background-color:  rgba(208,164,0, 0.5);  -webkit-border-radius: 25px 5px 1px 4px; /* recuerda la primera frase */ -moz-border-radius: 24px; /* si quieres todas las esquinas iguales */ border-radius: 0px 50px 50px 0px;">
				<div class="row">
					<div class="span1 text-center">
						<div class="hidden-phone">
							<?php echo TbHtml::imagePolaroid(Yii::app()->request->baseUrl."/images/espeon.gif"); ?>
						</div>
					</div>
					<div class="span3">
						<div class="row">
							<div class="span3">
								<strong>Calificaciones parciales</strong>
							</div>
						</div>
						<div class="row">
							<div class="span3">
								<p>En este item se puede ingresar las notas en cada asignatura</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</a>
		</div>
		<br>
		<div class="row">
		<a class="link-negro" href="<?php echo Yii::app()->createUrl('cruge/ui/usermanagementadmin'); ?>">
			<div class="span4" style="background-color:  rgba(208,164,0, 0.5);  -webkit-border-radius: 25px 5px 1px 4px; /* recuerda la primera frase */ -moz-border-radius: 24px; /* si quieres todas las esquinas iguales */ border-radius: 0px 50px 50px 0px;">
				<div class="row">
					<div class="span1 text-center">
						<div class="hidden-phone">
							<?php echo TbHtml::imagePolaroid(Yii::app()->request->baseUrl."/images/leaf.gif"); ?>
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
								<p>En este item se puede administrar los distintos usuarios del sistema</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</a>
		<div class="visible-phone"><br/></div>
		<a class="link-negro" href="<?php echo Yii::app()->createUrl('parametro/index'); ?>">
			<div class="span4" style="background-color:  rgba(208,164,0, 0.5);  -webkit-border-radius: 25px 5px 1px 4px; /* recuerda la primera frase */ -moz-border-radius: 24px; /* si quieres todas las esquinas iguales */ border-radius: 0px 50px 50px 0px;">
				<div class="row">
					<div class="span1 text-center">
						<div class="hidden-phone">
							<?php echo TbHtml::imagePolaroid(Yii::app()->request->baseUrl."/images/glaceon.gif"); ?>
						</div>
					</div>
					<div class="span3">
						<div class="row">
							<div class="span3">
								<strong>Parametros</strong>
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
</div>
<br>

</div>