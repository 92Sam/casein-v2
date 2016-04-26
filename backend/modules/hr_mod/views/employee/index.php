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
            <span class="caption-subject bold uppercase"> Crear Nueva Persona </span>
          </div>
        </div>
        <div class="portlet-body form">
          <?php $form = ActiveForm::begin([
                'options' => [
                // 'class' => 'ng-pristine ng-valid validaMetro',
                ],
            ]); ?>
            <div class="form-body"  ng-controller="countryController">

				<div class="col-md-6 portlet light">
                    <div>
                        <div class="portlet-body form">
                            <div class="caption font-blue">
                                <i class="icon-pin font-blue"></i>
                                <span class="caption-subject bold uppercase"> Perfil</span>
                            </div>
                            <div class="alert alert-danger display-hide">
                              <button class="close" data-close="alert"></button>
                              Usted tiene algunos errores en el formulario . Por favor , consulte más abajo .
                            </div>
                            <?= $form->field($personData, 'first_name', ['options' => ['class' => 'form-group form-md-line-input form-md-floating-label'], 'template' => '{input}<label >{label}</label>{error}'])->textInput(['ng-model' => 'name', 'ng-init'=>["name"=>'Bob'], 'ng-value'=>'bob']) /*textInput(actionDinamycusername)*/ ?>
                            <?= $form->field($personData, 'second_name', ['options' => ['class' => 'form-group form-md-line-input form-md-floating-label'], 'template' => '{input}<label >{label}</label>{error}'])->textInput(['ng-model' => 'name', 'ng-init'=>["name"=>'Bob'], 'ng-value'=>'bob']) /*textInput(actionDinamycusername)*/ ?>
                            <?= $form->field($personData, 'first_surname', ['options' => ['class' => 'form-group form-md-line-input form-md-floating-label'], 'template' => '{input}<label >{label}</label>{error}'])->textInput(['ng-model' => 'name', 'ng-init'=>["name"=>'Bob'], 'ng-value'=>'bob']) /*textInput(actionDinamycusername)*/ ?>
                            <?= $form->field($personData, 'second_surname', ['options' => ['class' => 'form-group form-md-line-input form-md-floating-label'], 'template' => '{input}<label >{label}</label>{error}'])->textInput(['ng-model' => 'name', 'ng-init'=>["name"=>'Bob'], 'ng-value'=>'bob']) /*textInput(actionDinamycusername)*/ ?>
                            <div class="row">
                                <div class="col-md-3">
                                <?= $form->field($personData, 'dni_type_id')->dropDownList( ['1'=>'J-','2'=>'G-','3'=>'E-'] , ['prompt'=>'Tipo de Registro','class'=>'form-control select2me', 'ng-model' => 'dni_type_id'])?>
                                </div>  
                                <div class="col-md-4">
                                <?= $form->field($personData, 'dni', ['options' => ['class' => 'form-group form-md-line-input form-md-floating-label', 'maxlength'=>'10'], 'template' => '{input}<label >{label}</label>{error}'])->textInput(['ng-model' => 'dni']) ?>
                                </div>  
                            </div>  

                        </div>
                    </div>
                </div>


            
              <div class="row margin-top-10">
                <div class="col-md-12">
                <!-- <input type="submit" class="btn btn-ribela'" value="Guardar" ng-click=""> -->
                  <!-- ?= Html::submitButton('Enviar', ['class' => 'btn purple btn-block', 'ng-cloak' => '']) ?> -->
                  <!-- ?= Html::submitButton($companyConsortium->isNewRecord ? 'Create' : 'Update', ['class' => $companyConsortium->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?> -->
                    <input type="submit" class="btn blue btn-block" value="Guardar" />
                </div>
              </div>
            </div>
            <?php ActiveForm::end(); ?>
          </div>
        </div>
      </div> 
    </div>     
  </div>
</div><!-- create_account -->