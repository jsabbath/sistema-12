<div class="row">
<div class="span12" style="border-top: 3px solid #772000;border-bottom: 3px solid #772000; -webkit-border-radius: 25px 5px 1px 4px; /* recuerda la primera frase */ -moz-border-radius: 24px; /* si quieres todas las esquinas iguales */ border-radius: 25px;">

<div class="row">
	<div class="span6 offset3">
	<div style="padding-left: 10px;">
		<br>
		<h2 class="text-center"><font face="papyrus">Administracion</font></h2>
	</div>
	<div class="row">
		<a class="link-negro" href="<?php echo Yii::app()->createUrl('parametro/admin'); ?>">
			<div class="span4 offset1" style="background-color:  rgba(208,164,0, 0.5);  -webkit-border-radius: 25px 5px 1px 4px; /* recuerda la primera frase */ -moz-border-radius: 24px; /* si quieres todas las esquinas iguales */ border-radius: 0px 50px 50px 0px;">
				<div class="row">
					<div class="span1 text-center">
						<div class="hidden-phone">
							<?php echo TbHtml::imagePolaroid(Yii::app()->request->baseUrl."/images/iconos/technical_wrench.png"); ?>
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
</div>		
<br>
</div>

</div>
</div>