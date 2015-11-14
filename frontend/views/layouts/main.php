<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use frontend\assets\AppAsset;
use frontend\assets\BowerAsset;
use frontend\assets\CommonAsset;

#-- Assets Calls --#
AppAsset::register($this);
BowerAsset::register($this);
CommonAsset::register($this);
#-- /Assets Calls --#
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Fonts START -->
    <!-- <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|Pathway+Gothic+One|PT+Sans+Narrow:400+700|Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet" type="text/css">  -->
    <!-- Fonts END -->

    <?= Html::csrfMetaTags() ?>
    <title>Casein</title>
    <?php $this->head() ?>
</head>
<body>
    <?php $this->beginBody() ?>

    <!--- Header Naw Content ------>
    <div class="header header-mobi-ext">
        <div class="container">
          <div class="row">
            <!-- Logo BEGIN -->
            <div class="col-md-2 col-sm-2">
              <a class="scroll site-logo" href="#promo-block"><img src="<?php echo Yii::getAlias('@webroot') ?>/img/casein2.png" alt="Metronic One Page"></a>
            </div>
            <!-- Logo END -->
            <a href="javascript:void(0);" class="mobi-toggler"><i class="fa fa-bars"></i></a>
            <!-- Navigation BEGIN -->
            <div class="col-md-10 pull-right">
              <ul class="header-navigation">
                <li class="current"><a href="#promo-block">Home</a></li>
                <li class=""><a href="#about">About</a></li>
                <li class=""><a href="#services">Services</a></li>
                <li><a href="#team">Team</a></li>
                <li><a href="#portfolio">Portfolio</a></li>
                <li><a href="#benefits">Benefits</a></li>
                <li><a href="#prices">Pricing</a></li>
                <li><a href="#contact">Contact</a></li>
              </ul>
            </div>
            <!-- Navigation END -->
          </div>
        </div>
    </div>
    <!--- /Header Nav Content ------>

    <!--- BODY CONTENT ------>

            <?= $content ?>

    <!--- END BODY CONTENT ------>

    <!-- BEGIN FOOTER -->
    <div class="footer">
        <div class="container">
          <div class="row">
            <!-- BEGIN COPYRIGHT -->
            <div class="col-md-6 col-sm-6">
              <div class="copyright">Casein 2015</div>
            </div>
            <!-- END COPYRIGHT -->
            <!-- BEGIN SOCIAL ICONS -->
            <div class="col-md-6 col-sm-6 pull-right">
              <ul class="social-icons">
                <li><a class="rss" data-original-title="rss" href="javascript:void(0);"></a></li>
                <li><a class="facebook" data-original-title="facebook" href="javascript:void(0);"></a></li>
                <li><a class="twitter" data-original-title="twitter" href="javascript:void(0);"></a></li>
                <li><a class="googleplus" data-original-title="googleplus" href="javascript:void(0);"></a></li>
                <li><a class="linkedin" data-original-title="linkedin" href="javascript:void(0);"></a></li>
                <li><a class="youtube" data-original-title="youtube" href="javascript:void(0);"></a></li>
                <li><a class="vimeo" data-original-title="vimeo" href="javascript:void(0);"></a></li>
                <li><a class="skype" data-original-title="skype" href="javascript:void(0);"></a></li>
              </ul>
            </div>
            <!-- END SOCIAL ICONS -->
          </div>
        </div>
    </div>
    <!-- END FOOTER -->

    <?php $this->endBody() ?>

    <!-- JAVASCRIPTS -->
    <script>
/*    jQuery(document).ready(function() {    
       // Metronic.init(); // init metronic core componets
       Layout.init(); // init layout
       // FormDropzone.init();
       // ComponentsFormTools2.init();
       // ComponentsDropdowns.init();
       // ComponentsPickers.init();
       // $RIBELA.UI.init();//js de ribela
    });*/
    </script>
    <!-- END JAVASCRIPTS -->

</body>
</html>
<?php $this->endPage() ?>
