<h1><?php echo ucwords(CrugeTranslator::t("roles"));?></h1>

<div class='auth-item-create-button'>
<?php echo CHtml::link(CrugeTranslator::t("Crear Nuevo Rol")
	,Yii::app()->user->ui->getRbacAuthItemCreateUrl(CAuthItem::TYPE_ROLE));?>
</div>
<div class="rowLength">
	<div class="span11">
	<?php $this->renderPartial('_listauthitems',array('dataProvider'=>$dataProvider),false);?>
	</div>

</div>
