<div class="row">
	<div class="span6 offset3" style="border-top: 3px solid #772000;border-bottom: 3px solid #772000; -webkit-border-radius: 25px 5px 1px 4px; /* recuerda la primera frase */ -moz-border-radius: 24px; /* si quieres todas las esquinas iguales */ border-radius: 25px;">
	<div style="padding-left: 10px;">
		<br>
		<h2 class="text-center"><font face="papyrus">Gestion Cursos</font></h2>
	</div>
	<div class="row">
		<a class="link-negro" href="<?php echo Yii::app()->createUrl('curso/create'); ?>">
			<div class="span4 offset1" style="background-color:  rgba(208,164,0, 0.5);  -webkit-border-radius: 25px 5px 1px 4px; /* recuerda la primera frase */ -moz-border-radius: 24px; /* si quieres todas las esquinas iguales */ border-radius: 0px 50px 50px 0px;">
				<div class="row">
					<div class="span1 text-center">
						<div class="hidden-phone">
							<?php echo TbHtml::imagePolaroid(Yii::app()->request->baseUrl."/images/eevee.gif"); ?>
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
		<div class="row">
		<div class="visible-phone"><br/></div>
		<a class="link-negro" href="<?php echo Yii::app()->createUrl('curso/admin'); ?>">
			<div class="span4 offset1" style="background-color:  rgba(208,164,0, 0.5);  -webkit-border-radius: 25px 5px 1px 4px; /* recuerda la primera frase */ -moz-border-radius: 24px; /* si quieres todas las esquinas iguales */ border-radius: 0px 50px 50px 0px;">
				<div class="row">
					<div class="span1 text-center">
						<div class="hidden-phone">
							<?php echo TbHtml::imagePolaroid(Yii::app()->request->baseUrl."/images/jolteon.gif"); ?>
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
		<div class="row">
		<div class="visible-phone"><br/></div>
		<a class="link-negro" href="<?php echo Yii::app()->createUrl('curso/lista_cursos'); ?>">
			<div class="span4 offset1" style="background-color:  rgba(208,164,0, 0.5);  -webkit-border-radius: 25px 5px 1px 4px; /* recuerda la primera frase */ -moz-border-radius: 24px; /* si quieres todas las esquinas iguales */ border-radius: 0px 50px 50px 0px;">
				<div class="row">
					<div class="span1 text-center">
						<div class="hidden-phone">
							<?php echo TbHtml::imagePolaroid(Yii::app()->request->baseUrl."/images/vaporeon.gif"); ?>
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

	<div class="row">
		<a class="link-negro" href="<?php echo Yii::app()->createUrl('curso/buscar_asistencia'); ?>">
			<div class="span4 offset1" style="background-color:  rgba(208,164,0, 0.5);  -webkit-border-radius: 25px 5px 1px 4px; /* recuerda la primera frase */ -moz-border-radius: 24px; /* si quieres todas las esquinas iguales */ border-radius: 0px 50px 50px 0px;">
				<div class="row">
					<div class="span1 text-center">
							<div class="hidden-phone">
							<?php echo TbHtml::imagePolaroid(Yii::app()->request->baseUrl."/images/flareon.gif"); ?>
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
	<div class="row">
		<a class="link-negro" href="<?php echo Yii::app()->createUrl('listacurso'); ?>">
			<div class="span4 offset1" style="background-color:  rgba(208,164,0, 0.5);  -webkit-border-radius: 25px 5px 1px 4px; /* recuerda la primera frase */ -moz-border-radius: 24px; /* si quieres todas las esquinas iguales */ border-radius: 0px 50px 50px 0px;">
				<div class="row">
					<div class="span1 text-center">
							<div class="hidden-phone">
							<?php echo TbHtml::imagePolaroid(Yii::app()->request->baseUrl."/images/flareon.gif"); ?>
						</div>
					</div>
					<div class="span3">
						<div class="row">
							<div class="span3">
								<strong>Lista de alumnos</strong>
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
	
</div>		
<br>
</div>