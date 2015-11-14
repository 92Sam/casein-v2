<?php
use backend\assets\AppAsset;
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" ng-app="RibelaApp">
<head>
  <meta charset="<?= Yii::$app->charset ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?= Html::csrfMetaTags() ?>
  <title ng-cloak>Casein - Login</title>
  <?php $this->head() ?>
</head>
<!-- BEGIN HEADER TOP -->
<div class="container">
  <!-- BEGIN TOP NAVIGATION MENU -->
  <ul class="nav pull-right">
    <!-- BEGIN LANGUAGE DROPDOWN -->
    <li class="dropdown dropdown-language dropdown-dark" ng-controller="LanguageController" ng-cloak>
      <a href="javascript:;" class="dropdown-toggle btn btn-default navbar-btn" data-toggle="dropdown" data-hover="dropdown">
        <i class="fa fa-globe"></i>
        <span class="langname" data-close-others="true" translate>Seleccionar idioma</span>
        <i class="fa fa-caret-down"></i>
      </a>
      <ul class="dropdown-menu dropdown-menu-default">
        <li>
          <a ng-click="changeLanguage('en')">
            <img alt="" ng-src="<?php echo Yii::getAlias('@web') ?>/img/flags/us.png"> English
          </a>
          <a ng-click="changeLanguage('es')">
            <img alt="" ng-src="<?php echo Yii::getAlias('@web') ?>/img/flags/es.png"> Español
          </a>
          <a ng-click="changeLanguage('fr')">
            <img alt="" ng-src="<?php echo Yii::getAlias('@web') ?>/img/flags/fr.png"> Français
          </a>
          <a ng-click="changeLanguage('de')">
            <img alt="" ng-src="<?php echo Yii::getAlias('@web') ?>/img/flags/de.png"> Deutsch
          </a>
        </li>
      </ul>
    </li>
    <!-- END LANGUAGE DROPDOWN -->
  </ul>
  <!-- END TOP NAVIGATION MENU -->
</div>
<!-- END HEADER TOP -->
<body class="page-md login" ng-cloak>
  <?php $this->beginBody() ?>
  <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
  <div class="menu-toggler sidebar-toggler">
  </div>
  <!-- END SIDEBAR TOGGLER BUTTON -->
  <!-- BEGIN LOGO -->
  <div class="logo">
    <img src="../../img/logo_ribela_large.png" alt="Ribel ERP"/>
  </div>
   <div class="text-center">
    <h4 class="sub-title" translate>ERP - CRM Salud</h4>
  </div>
  <!-- END LOGO -->
  <!-- BEGIN LOGIN -->
  <div class="content">
    <?= $content ?>
  </div>
  <!-- END LOGIN -->
  <!-- BEGIN FOOTER -->
<div class="page-footer">
  <div class="container-fluid">
    <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
  </div>
</div>
<div class="scroll-to-top">
  <i class="icon-arrow-up"></i>
</div>
  <!-- END FOOTER -->
  <!--[if lt IE 9]>
  <script src="../../js/respond.min.js"></script>
  <script src="../../js/excanvas.min.js"></script>
  <![endif]-->
<?php $this->endBody() ?>
<script>
  jQuery(document).ready(function() {     
  Metronic.init(); // init metronic core components
  Layout.init(); // init current layout
  Login.init();

});
</script>
</body>
</html>
<?php $this->endPage() ?>