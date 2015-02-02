
<?php if(Yii::app()->user->hasFlash('loginflash')): ?>
<div class="flash-error">
	<?php echo Yii::app()->user->getFlash('loginflash'); ?>
</div>
<?php else: ?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'logon-form',
	'enableClientValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>


<div class="row">
	<div class="span3" ></div>
	<div class="span6" id="login">
		
		<div id="caja">
			<?php echo "<img src=\"images/logo2.png\"> <br>"; ?> 
			<?php echo "<br>"; ?> 
		    <?php echo $form->textField($model,'username', array('placeholder'=>'Usuario')); ?>
			<?php echo $form->error($model,'username',array('class'=>TbHtml::ALERT_COLOR_ERROR, '...')); ?><br/>
			<?php echo $form->passwordField($model,'password', array('placeholder'=>'Clave')); ?>
			<?php echo $form->error($model,'password'); ?>
			<?php echo "<br><br>"; ?>
			<input type="submit" class="botonSubmit" value="Ingresar">
		</div>
	</div>
	<div class="span3"></div>

	<?php
		//	si el componente CrugeConnector existe lo usa:
		//
		if(Yii::app()->getComponent('crugeconnector') != null){
		if(Yii::app()->crugeconnector->hasEnabledClients){ 
	?>
	<div class='crugeconnector'>
		<span><?php echo CrugeTranslator::t('logon', 'You also can login with');?>:</span>
		<ul>
		<?php 
			$cc = Yii::app()->crugeconnector;
			foreach($cc->enabledClients as $key=>$config){
				$image = CHtml::image($cc->getClientDefaultImage($key));
				echo "<li>".CHtml::link($image,
					$cc->getClientLoginUrl($key))."</li>";
			}
		?>
		</ul>
	</div>
	<?php }} ?>
	

<?php $this->endWidget(); ?>
</div>
<?php endif; ?>