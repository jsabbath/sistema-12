<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/sweet-alert.css">
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/sweet-alert.min.js"></script>

<?php if (Yii::app()->user->hasFlash('loginflash')): ?>
    <div class="flash-error">
        <?php echo Yii::app()->user->getFlash('loginflash'); ?>
    </div>
<?php else: ?>
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'logon-form',
        'enableClientValidation' => false,
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
    ));
    ?>


<div class="container">
    <div class="row">
        <div class="span3" ></div>
        <div class="span6" id="login">

            <div id="caja">
                <?php echo "<img src=\"images/logo2.png\"> <br>"; ?> 
                <?php echo "<br>"; ?> 
                <?php echo $form->textField($model, 'username', array('placeholder' => 'Usuario')); ?>
                <br/>
                <?php echo $form->passwordField($model, 'password', array('placeholder' => 'Clave')); ?>

                
                   
                    <?php
                    if ($form->error($model, 'username') || $form->error($model, 'password')) {
                        //echo TbHtml::alert(TbHtml::ALERT_COLOR_ERROR, '<strong>ERROR!</strong> Ingrese datos nuevamente.');
                        echo '<script type="text/javascript">'
                           , 'sweetAlert("Oops un error!!", "Escriba sus datos nuevamente", "error");'
                           , '</script>'
                        ;

                        } ?>
                <?php echo "<br><br>"; ?>
                <input type="submit" class="botonSubmit" value="Ingresar">
            </div>
        </div>
        <div class="span3"></div>
</div>


        

        <?php
        //	si el componente CrugeConnector existe lo usa:
        //
		if (Yii::app()->getComponent('crugeconnector') != null) {
            if (Yii::app()->crugeconnector->hasEnabledClients) {
                ?>
                <div class='crugeconnector'>
                    <span><?php echo CrugeTranslator::t('logon', 'You also can login with'); ?>:</span>
                    <ul>
                        <?php
                        $cc = Yii::app()->crugeconnector;
                        foreach ($cc->enabledClients as $key => $config) {
                            $image = CHtml::image($cc->getClientDefaultImage($key));
                            echo "<li>" . CHtml::link($image, $cc->getClientLoginUrl($key)) . "</li>";
                        }
                        ?>
                    </ul>
                </div>
            <?php }
        }
        ?>


    <?php $this->endWidget(); ?>
    </div>
<?php endif; ?>
