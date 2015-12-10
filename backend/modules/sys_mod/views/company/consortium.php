<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model common\modules\sys_account_manager\models\SysAccount */
/* @var $form ActiveForm */
$this->title = "Gestión de cuentas";
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- BEGIN PAGE CONTENT-->
<div class="row">
  <div class="col-md-12">
    <div ui-view="" class="fade-in-up ng-scope">
      <div class="portlet light">
        <div class="portlet-title">
          <div class="caption ">
            <!-- <i class="fa fa-cogs"></i>
            <span >Genera una nueva cuenta para una empresa</span> -->
            <i class="fa fa-institution"></i>
            <span class="caption-subject bold uppercase"> Genera una nueva cuenta para un consorcio<span>
          </div>
            </div>
            <div class="portlet-body form">
              
              <div ng-app="myapp">
                <form  name="myform" class="ng-pristine ng-valid validaMetro" ng-controller="myappCtrl" novalidate>
                <legend>Angular User Validation with Bootstrap Decorations</legend>

                <div class="form-group form-md-line-input form-md-floating-label" ng-class="{error:!myform.username.$valid}">
                        <input type="text" class="form-control ng-pristine ng-untouched ng-valid" id="inputUsername" name="username" ng-model="username" valid-username />
                        <label>
                            <label class="control-label" for="companyconsortium-name">Name</label>
                        </label>
                        <div class="alert alert-danger">
                            <!-- <button class="close" data-close="alert"></button> -->
                            <span ng-show="!!myform.username.$error.isBlank">Username Required.</span>
                            <span ng-show="!!myform.username.$error.invalidChars">Username must contain letters &amp; spaces only.</span>
                            <span ng-show="!!myform.username.$error.invalidLen">Username must be 5-20 characters.</span>
                        </div>
<!--                         <div class="help-inline alert alert-danger display-hide">
                            <span ng-show="!!myform.username.$error.isBlank">Username Required.</span>
                            <span ng-show="!!myform.username.$error.invalidChars">Username must contain letters &amp; spaces only.</span>
                            <span ng-show="!!myform.username.$error.invalidLen">Username must be 5-20 characters.</span>
                        </div> -->
                </div>

                <div class="form-group form-md-line-input form-md-floating-label field-companyconsortium-name required" aria-required="true">
                    <input type="text" id="companyconsortium-name" class="form-control ng-pristine ng-untouched ng-valid" name="CompanyConsortium[name]" ng-model="name" ng-init="{&quot;name&quot;:&quot;Bob&quot;}" ng-value="bob">
                    <label><label class="control-label" for="companyconsortium-name">Name</label>
                    </label><div class="help-block"></div>
                </div>

                <div class="control-group" ng-class="{error:!myform.password.$valid}">
                    <label for="inputPassword" class="control-label">Password:</label>
                    <div class="controls">
                        <input type="text" id="inputPassword" name="password" ng-model="password" valid-password />
                        <div class="help-inline">
                            <span ng-show="!!myform.password.$error.isBlank">Password Required.</span>
                            <span ng-show="!!myform.password.$error.isWeak">Must contain one upper &amp; lower case letter and a non-letter (number or symbol.)</span> 
                            <span ng-show="!!myform.password.$error.invalidLen">Must be 8-20 characters.</span>
                        </div>
                    </div>
                </div>
                <div class="control-group" ng-class="{error:!myform.password_c.$valid}">
                    <label for="password_c" class="control-label">Confirm Password:</label>
                    <div class="controls">
                        <input type="text" id="password_c" name="password_c" ng-model="password_c" valid-password-c />
                        <div class="help-inline"> 
                            <span ng-show="!!myform.password_c.$error.isBlank">Confirmation Required.</span>
                            <span ng-show="!!myform.password_c.$error.noMatch">Passwords don't match.</span>
                        </div>
                    </div>
                </div>
                <div class="form-actions" ng-show="formAllGood()">
                    <input type="submit" class="btn btn-primary" value="Submit" />
                </div>
                </form></div>

            </div>
        </div>
      </div> 
    </div>     
  </div>
</div><!-- create_account -->

