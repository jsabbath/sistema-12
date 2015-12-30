<?php
/* @var $this SiteController */
/* @var $error array */
$this->pageTitle=Yii::app()->name . ' - Error';


?>


<?php if( 	Yii::app()->user->checkAccess('administrador') OR
    		Yii::app()->user->isSuperAdmin  
   ){ ?>
		 <div class="row" >
			<div class="span12 text-center" style="background-color: #FAADA8">
				<h4>Error <?php echo $code; ?></h4>

				<div class="error">
				<?php echo CHtml::encode($message); ?>
				</div>
			</div>
		</div> 

<?php } ?>




<?php 

if($code==55){
?>
	<div class="container" >
		<div class="row">
		
			<div class="span12 text-center" style="background-color: #EEEEEE">
				<h3>Debe seleccionar un archivo a subir.</h3>
			</div>

			<div class="span12 text-center"><br>
				<a href="<?php echo Yii::app()->createUrl('matricula/subir_xml'); ?>" class="btn btn-danger">Importar Alumnos</a>
			</div> 

			<div class="span4 offset4">
				<br><br>
			</div>
		 	
		</div>
		<br>
	</div>
<?php
}elseif($code==666){
?>
	<div class="container" >
		<div class="row">
		
			<div class="span12 text-center" style="background-color: #EEEEEE">
				<h3>No hay cursos disponibles en  este año, deben ingresarse antes de realizar esta accion.</h3>
			</div>

			<div class="span12 text-center"><br>
				<a href="<?php echo Yii::app()->createUrl('curso/menu'); ?>" class="btn btn-danger">Gesion Cursos</a>
			</div> 

			<div class="span4 offset4">
				<br><br>
			</div>
		 	
		</div>
		<br>
	</div>
<?php
}elseif($code==401){
?>
<div class="container" >
<div class="row">
	<div class="span12 text-center">
		<h1>Usted no tiene permiso para entrar a este lugar</h1>
	</div>
	<div class="span4 offset4">
		<br><br>
	</div>

	<div class="span12 text-center">
		<a href="<?php echo Yii::app()->createUrl('site/index'); ?>" class="btn btn-primary">Regresar</a>
	</div>
</div>
</div>
<?php
}elseif($code==404){
?>
<div class="container" >
<div class="row">
	<div class="span12 text-center">
		<h1>No se encuentra la ruta que esta buscando</h1>
	</div>
	<div class="span4 offset4">
		<br><br>
	</div>

	<div class="span12 text-center">
		<a href="<?php echo Yii::app()->createUrl('site/index'); ?>" class="btn btn-primary">Regresar</a>
	</div>
</div>
</div>
<?php
}elseif($code==500){
?>
<div class="container" >
<div class="row">
	<div class="span12 text-center">
		<h1>UPS! Actualmente estamos trabajando en este error</h1>
	</div>
	<div class="span4 offset4">
		<br><br>
	</div>

	<div class="span12 text-center">
		<a href="<?php echo Yii::app()->createUrl('site/index'); ?>" class="btn btn-primary">Regresar</a>
	</div>
</div>
</div>
<?php
}else{
	Yii::app()->redirect('site/index');
}

?>