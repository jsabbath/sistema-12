<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/glDatePicker.default.css">
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/glDatePicker.js"></script>

<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<div class="row">
	<div class="span8">
		<br>
		<?php $this->actionVer(); ?>
	</div>
	<div class="span4 text-center">
		<input type="text" id="mydate" gldp-id="mydate" />
	    <div gldp-el="mydate"
	         style="width:400px; height:300px; position:absolute; top:70px; left:100px;">
	    </div>
	</div>
</div>

<script type="text/javascript">
$(window).load(function()
{
    $('input').glDatePicker();
});
</script>