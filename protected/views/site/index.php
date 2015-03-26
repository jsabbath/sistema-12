<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<div class="row">
	<diw class="span12">
		<div class="row">
		<a href="<?php echo Yii::app()->createUrl('curso/admin'); ?>">
			<div class="span4" style="background-color: #eafadd">
				<div class="row">
					<div class="span1 text-center">
						<div class="hidden-phone">
							<?php echo TbHtml::imagePolaroid(Yii::app()->request->baseUrl."/images/char.gif"); ?>
						</div>
					</div>
					<div class="span3">
						<div class="row">
							<div class="span3">
								<strong>Administrar curso</strong>
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
		<a href="<?php echo Yii::app()->createUrl('informedesarrollo/create'); ?>">
			<div class="span4" style="background-color: #eafadd">
				<div class="row">
					<div class="span1 text-center">
						<div class="hidden-phone">
							<?php echo TbHtml::imagePolaroid(Yii::app()->request->baseUrl."/images/eevee.gif"); ?>
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
		<a href="<?php echo Yii::app()->createUrl('informedesarrollo/inf_d'); ?>">
			<div class="span4" style="background-color: #eafadd">
				<div class="row">
					<div class="span1 text-center">
						<div class="hidden-phone">
							<?php echo TbHtml::imagePolaroid(Yii::app()->request->baseUrl."/images/grow.gif"); ?>
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
		<br/>
		<div class="row">
		<a href="<?php echo Yii::app()->createUrl('matricula/create'); ?>">
			<div class="span4" style="background-color: #eafadd">
				<div class="row">
					<div class="span1 text-center">
						<div class="hidden-phone">
							<?php echo TbHtml::imagePolaroid(Yii::app()->request->baseUrl."/images/jiggly.gif"); ?>
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
		<a href="<?php echo Yii::app()->createUrl('matricula/admin'); ?>">
			<div class="span4" style="background-color: #eafadd">
				<div class="row">
					<div class="span1 text-center">
						<div class="hidden-phone">
							<?php echo TbHtml::imagePolaroid(Yii::app()->request->baseUrl."/images/leaf.gif"); ?>
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
		<a href="<?php echo Yii::app()->createUrl('curso/buscar_notas&id=11'); ?>">
			<div class="span4" style="background-color: #eafadd">
				<div class="row">
					<div class="span1 text-center">
						<div class="hidden-phone">
							<?php echo TbHtml::imagePolaroid(Yii::app()->request->baseUrl."/images/link.gif"); ?>
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
		<br/>
		<div class="row">
		<a href="<?php echo Yii::app()->createUrl('cruge/ui/usermanagementadmin'); ?>">
			<div class="span4" style="background-color: #eafadd">
				<div class="row">
					<div class="span1 text-center">
						<div class="hidden-phone">
							<?php echo TbHtml::imagePolaroid(Yii::app()->request->baseUrl."/images/pika.gif"); ?>
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
		<a href="<?php echo Yii::app()->createUrl('parametro/index'); ?>">
			<div class="span4" style="background-color: #eafadd">
				<div class="row">
					<div class="span1 text-center">
						<div class="hidden-phone">
							<?php echo TbHtml::imagePolaroid(Yii::app()->request->baseUrl."/images/vaporeon.gif"); ?>
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
	</diw>
</div>			
			