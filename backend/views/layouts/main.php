<?php

/* @var $this \yii\web\View */
/* @var $content string */


use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use backend\assets\AppAsset;
use backend\assets\BowerAsset;
use backend\assets\CommonAsset;
use yii\widgets\Menu;
use yii\helpers\Url;

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
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>


<!-- BEGIN HEADER -->
<div class="page-header">
  <!-- BEGIN HEADER TOP -->
  <div class="page-header-top">
    <div class="container-fluid">
      <!-- BEGIN LOGO -->
      <div class="page-logo">
        <a href="/"><img src="<?php echo Yii::getAlias('@web') ?>/img/casein2.png" alt="logo" class="logo-default"></a>
      </div>
      <!-- END LOGO -->
      <!-- BEGIN RESPONSIVE MENU TOGGLER -->
      <a href="javascript:;" class="menu-toggler"></a>
      <!-- END RESPONSIVE MENU TOGGLER -->
      <!-- BEGIN PAGE ACTIONS -->
      <div class="page-actions">
        <div class="btn-group">
          <button type="button" class="btn red-haze btn-sm dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
            <span class="hidden-sm hidden-xs"><span >Acciones</span>&nbsp;</span><i class="fa fa-angle-down"></i>
          </button>
          <ul class="dropdown-menu" role="menu">
          <li>
              <a href="/">
              <i class="icon-home"></i> 
                <span >Panel principal</span>
              </a>
            </li>
            <li>
              <a href="javascript:;">
                <i class="icon-book-open"></i> 
                <span >Base de conocimiento</span>
              </a>
            </li>
            <li>
              <a href="javascript:;">
                <i class="icon-wrench"></i> 
                <span >Configuración</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
      <!-- END PAGE ACTIONS -->
      <!-- BEGIN TOP NAVIGATION MENU -->
      <div class="top-menu">
        <ul class="nav navbar-nav pull-right">
            <span class="separator"></span>
          </li>
          <!-- BEGIN USER LOGIN DROPDOWN -->
          <li class="dropdown dropdown-user dropdown-dark">
            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">

              <span class="username username-hide-mobile">
                <?php 
                if(isset(Yii::$app->user->identity->username)){
                  echo Yii::$app->session->get('user.name_identity'); 
                }else{
                  return Yii::$app->getResponse()->redirect(Yii::$app->getHomeUrl());
                }   
                ?>
              </span>
                <!-- DOC: Do not remove below empty space(&nbsp;) as its purposely used -->
                <!-- <img alt="" class="img-circle" src="<?php echo Yii::getAlias('@common') ?>/theme/assets/admin/layout3/img/avatar9.jpg"/> -->
                <img alt="" class="img-circle" src="<?php echo Yii::getAlias('@web') ?>/img/avatar9.jpg"/>
                <span ><?= Yii::$app->user->identity->username ?></span>
            </a>
            <?php
              echo Nav::widget([
                'options' => ['class' => 'dropdown-menu dropdown-menu-default'],
                'encodeLabels' => false,
                'items' => [
                  [    
                  'label' => '<i class="icon-user"></i>' . '"Perfil"',
                  'url' => ['#'],
                  //'linkOptions' => ['data-method' => 'post']
                  ],
                  [    
                  'label' => '<i class="icon-wrench"></i> Configuraciones',
                  'url' => ['/site/logout'],
                  'linkOptions' => ['data-method' => 'post']
                  ],
                  [    
                  'label' => '<i class="icon-key"></i> Salir ('. Yii::$app->user->identity->username . ')',
                  'url' => ['/site/logout'],
                  'linkOptions' => ['data-method' => 'post']
                  ],
                ],
              ]); 
            ?>
          </li>
          <!-- END USER LOGIN DROPDOWN -->
        </ul>
      </div>
      <!-- END TOP NAVIGATION MENU -->
    </div>
  </div>
  <!-- END HEADER TOP -->
  <!-- BEGIN HEADER MENU -->
  <div class="page-header-menu">
    <div class="container-fluid">
      <!-- BEGIN MEGA MENU -->
      <!-- DOC: Apply "hor-menu-light" class after the "hor-menu" class below to have a horizontal menu with white background -->
      <!-- DOC: Remove data-hover="dropdown" and data-close-others="true" attributes below to disable the dropdown opening on mouse hover -->
      <div class="hor-menu ">
        <ul class="nav navbar-nav">
          <li class="menu-dropdown classic-menu-dropdown bg-blue">
            <a data-hover="megamenu-dropdown" data-close-others="true" data-toggle="dropdown" href="javascript:;">
            <span ><i class="fa fa-institution"></i> Gestión de Compañias</span> <i class="fa fa-angle-down"></i>
            </a>
            <ul class="dropdown-menu pull-left bg-blue font">
              <li>
                <!-- <a href="/sys_mod/company/consortium"> -->
                <a href="<?= Url::toRoute(['sys_mod/company/consortium']); ?>">
                  <i class="fa fa-institution"></i>
                  <span >Crear Consorcio</span>
                  <!-- <span >Crear compañía</span> -->
                </a>
              </li>
              <li>
                <a href="/sys_account_manager/rol/">
                  <i class="icon-briefcase"></i>
                  <span >Roles</span>
                </a>
              </li>
              <li>
                <a href="/sys_account_manager/user/">
                  <i class="icon-users"></i>
                  <span >Usuarios</span>
                </a>
              </li>
              <li>
                <a href="/sys_account_manager/access/panel">
                  <i class="icon-shuffle"></i>
                  <span >Control de acceso</span>
                </a>
              </li>
            </ul>
          </li>
          <li class="menu-dropdown classic-menu-dropdown bg-green-meadow">
            <a data-hover="megamenu-dropdown" data-close-others="true" data-toggle="dropdown" href="javascript:;">
            <span ><i class="fa fa-stethoscope"></i> Módulo Médico</span> <i class="fa fa-angle-down"></i>
            </a>
            <ul class="dropdown-menu pull-left">
              <li>
                <a href="/its_ticket/ticket/create">
                  <i class="fa fa-user-md"></i>
                  <span>Médicos</span>
                </a>
              </li>
              <li>
                <a href="/its_ticket/ticket/">
                  <i class="fa fa-folder-open-o"></i>
                  <span >Historiales</span>
                </a>
              </li>
              <li>
                <a href="/its_data_entry/typification/create">
                  <i class="icon-note"></i>
                  <span >Crear tipificación</span>
                </a>
              </li>
            </ul>
          </li>
          <li class="menu-dropdown classic-menu-dropdown bg-red-haze">
            <a data-hover="megamenu-dropdown" data-close-others="true" data-toggle="dropdown" href="javascript:;">
            <span ><i class="icon-users"></i> Módulo Recurso Humano</span> <i class="fa fa-angle-down"></i>
            </a>
            <ul class="dropdown-menu pull-left">
              <li>
                <a href="/crm_product/default">
                  <i class="icon-briefcase"></i>
                  <span >Productos</span>
                </a>
              </li>
            </ul>
          </li>
            <li class="menu-dropdown classic-menu-dropdown bg-yellow-gold">
            <a data-hover="megamenu-dropdown" data-close-others="true" data-toggle="dropdown" href="javascript:;">
            <span ><i class="fa fa-usd"></i>Bancos, Ventas, Finanzas</span> <i class="fa fa-angle-down"></i>
            </a>
            <ul class="dropdown-menu pull-left">
              <li>
                <a href="/crm_product/default">
                  <i class="icon-briefcase"></i>
                  <span >Productos</span>
                </a>
              </li>
              <li>
                <a href="/crm_customer/default/">
                  <i class="icon-briefcase"></i>
                  <span >Clientes</span>
                </a>
              </li>
              <li>
                <a href="/sys_account_manager/user/">
                  <i class="icon-users"></i>
                  <span >Líderes de Ventas</span>
                </a>
              </li>
              <li>
                <a href="/sys_account_manager/access/panel">
                  <i class="icon-shuffle"></i>
                  <span >Oportunidades</span>
                </a>
              </li>
              <li>
                <a href="/crm_phone_calls/default/create">
                  <i class="icon-shuffle"></i>
                  <span >Llamadas Telefónicas</span>
                </a>
              </li>
              <li>
                <a href="/sys_account_manager/access/panel">
                  <i class="icon-shuffle"></i>
                  <span >Contactos</span>
                </a>
              </li>
            </ul>
          </li>
          <li class="menu-dropdown classic-menu-dropdown bg-purple-studio">
            <a data-hover="megamenu-dropdown" data-close-others="true" data-toggle="dropdown" href="javascript:;">
            <span ><i class="icon-bar-chart"></i> Reportes</span> <i class="fa fa-angle-down"></i>
            </a>
            <ul class="dropdown-menu pull-left">
              <li>
                <a href="/crm_product/default">
                  <i class="icon-briefcase"></i>
                  <span >Epidemiológicos</span>
                </a>
              </li>
            </ul>
          </li>
          <!-- <li class="active">
            <a href="#">
              <span >Mercadeo</span>
            </a>
          </li>
          <li class="active">
            <a href="#">
              <span >Facturación</span>
            </a>
          </li>
          <li class="active">
            <a href="#">
              <span >Reuniones</span>
            </a>
          </li>
          <li class="active">
            <a href="#">
              <span >Incidencias</span>
            </a>
          </li> -->
        </ul>
      </div>
      <!-- END MEGA MENU -->
    </div>
  </div>
  <!-- END HEADER MENU -->
</div>
<!-- END HEADER -->

        <!-- BEGIN PAGE CONTAINER -->
        <div class="page-container">
          <!-- BEGIN PAGE HEAD -->
          <div class="page-head">
            <div class="container-fluid">
              <!-- BEGIN PAGE TITLE -->
              <div class="page-title" ng-cloak>
                <h1><span ><?= Html::encode($this->title) ?></span></h1>
              </div>
              <!-- END PAGE TITLE -->
            </div>
          </div>
          <!-- END PAGE HEAD -->
          <!-- BEGIN PAGE CONTENT -->
          <div class="page-content">
            <div class="container-fluid">
              <!-- BEGIN PAGE BREADCRUMB -->
              <span ng-cloak>
                <?= 
                  Breadcrumbs::widget([
                    'itemTemplate' => '<li>{link}<i class="fa fa-circle"></i></li>',
                    'homeLink' => [ 
                      'label' => 'Inicio',
                      'url' => Yii::$app->homeUrl,
                    ],
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                  ]) 
                ?>
              </span>
              <!-- END PAGE BREADCRUMB -->
              <!-- BEGIN PAGE CONTENT INNER -->
              <?= $content ?>
              <!-- END PAGE CONTENT INNER -->
            </div>
          </div>
          <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->

</div>

<!-- <footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>
 -->
<div class="page-footer">
  <div class="container-fluid">
    <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
  </div>
</div>
<div class="scroll-to-top">
  <i class="icon-arrow-up"></i>
</div>

<?php $this->endBody() ?>

    <!-- JAVASCRIPTS -->
    <script>
    jQuery(document).ready(function() {    
        Metronic.init(); // init metronic core componets
       // Layout.init(); // init layout
       // FormDropzone.init();
       // ComponentsFormTools2.init();
       // ComponentsDropdowns.init();
       // ComponentsPickers.init();
        //$CASEIN.UI.init();//js de casein
    });
    </script>
    <!-- END JAVASCRIPTS -->
</body>
</html>
<?php $this->endPage() ?>
