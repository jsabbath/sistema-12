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

    <body>

        <div class="container" id="page">
            <?php
            if (!Yii::app()->user->isGuest) {
                $this->widget('bootstrap.widgets.TbNavbar', array(
                    'brandLabel' => 'AMSYS',
                    'collapse' => true,
                    'display' => null, // default is static to top
                    'items' => array(
                        array(
                            'class' => 'bootstrap.widgets.TbNav',
                            'items' => array(
                                array('label' => 'Home', 'icon' => 'home', 'url' => array('/site/index')),
                                array('label' => 'About','icon'=>'question-sign' ,'url' =>array('/site/page', 'view'=>'about')),
                                array('label' => 'Contact','icon' => 'random' ,'url'=>array('/site/contact')  ),
                               
                            ),
                        ),
                        
                        array(
                            'class' => 'bootstrap.widgets.TbNav',
                            'htmlOptions' => array('class' => 'pull-right'),
                            'items' => array(
                                 array('label' => 'Administrar Usuarios' ,'icon' => 'pencil', 'url' =>Yii::app()->user->ui->userManagementAdminUrl ,'visible'=>!Yii::app()->user->isGuest),
                            
                                array('label' => 'Logout (' . Yii::app()->user->name . ')'
                                    , 'url' => Yii::app()->user->ui->logoutUrl
                                    , 'icon' => 'user'
                                    , 'visible' => !Yii::app()->user->isGuest),
                            )
                        ),
                        
                    ),
                ));
            }
            ?>


<?php if (isset($this->breadcrumbs)): ?>
                <?php
                $this->widget('zii.widgets.CBreadcrumbs', array(
                    'links' => $this->breadcrumbs,
                ));
                ?><!-- breadcrumbs -->
            <?php endif ?>

            <?php echo $content; ?>

            <div class="clear"></div>

        </div><!-- page -->
<?php echo Yii::app()->user->ui->displayErrorConsole(); ?>
    </body>
</html>
