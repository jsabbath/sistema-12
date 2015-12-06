<?php Yii::app()->bootstrap->register(); ?>
<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="language" content="en">

	<!-- blueprint CSS framework -->
	<link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/logo2.ico">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print">
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection">
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/estilo.css">

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body style='background-image: url("<?php echo Yii::app()->request->baseUrl; ?>/images/fondo3.jpg");background-repeat: no-repeat; background-attachment:fixed; background-size:cover-webkit-background-size: cover; /* For WebKit*/
    -moz-background-size: cover;    /* Mozilla*/
    -o-background-size: cover;      /* Opera*/
    background-size: cover;         /* Generic*/'>

<?php 
/*
if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif
*/
?>

	<?php echo $content;?>
	<div class="clear"></div>


	  
<div align="center" class="navbar navbar-fixed-bottom visible-desktop">
	<pre style="color:black">Academic © 2015-2016 <a href="http://www.antumalen.cl">Antumalen</a>. Todos los derechos reservados.</pre>
</div>

<div align="center" class="navbar navbar-static-bottom hidden-desktop">
	<pre style="color:black">Academic © 2015-2016 <a href="http://www.antumalen.cl">Antumalen</a>. Todos los derechos reservados.</pre>
</div>


</div><!-- page -->



<?php echo Yii::app()->user->ui->displayErrorConsole(); ?>
</body>
</html>

