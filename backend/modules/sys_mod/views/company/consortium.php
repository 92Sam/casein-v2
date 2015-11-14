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
          <?php $form = ActiveForm::begin([
            'options' => [
            'class' => 'ng-pristine ng-valid validaMetro',
            'ng-app' => 'companyMod',
            ],
            ]); ?>
            <div class="form-body">
                
                <div class="col-md-6 portlet light">
                    <div>
                        <div class="portlet-body form">
                            <div class="caption font-blue">
                                <i class="icon-pin font-blue"></i>
                                <span class="caption-subject bold uppercase"> Datos Empresa</span>
                            </div>
                            <div class="alert alert-danger display-hide">
                              <button class="close" data-close="alert"></button>
                              Usted tiene algunos errores en el formulario . Por favor , consulte más abajo .
                            </div>
                            <?= $form->field($companyConsortium, 'name', ['options' => ['class' => 'form-group form-md-line-input form-md-floating-label'], 'template' => '{input}<label >{label}</label>{error}'])->textInput(['ng-model' => 'name', 'ng-init'=>["name"=>'Bob'], 'ng-value'=>'bob']) /*textInput(actionDinamycusername)*/ ?>
                            <p>You wrote: {{ name + " " + company_ground_id + " " + dni_type_id + " " + dni}}</p> 
                            <div class="row">
                                <div class="col-md-3">
                                <?= $form->field($companyConsortium, 'dni_type_id')->dropDownList( ["J-","G-","E-"] , ['prompt'=>'Tipo de Registro','class'=>'form-control select2me', 'ng-model' => 'dni_type_id'])?>
                                </div>  
                                <div class="col-md-4">
                                <?= $form->field($companyConsortium, 'dni', ['options' => ['class' => 'form-group form-md-line-input form-md-floating-label', 'maxlength'=>'10'], 'template' => '{input}<label >{label}</label>{error}'])->textInput(['ng-model' => 'dni']) ?>
                                </div>  
                            </div>  

                            <?= $form->field($companyConsortium, 'company_ground_id')->dropDownList($companyGroundList, ['class'=>'form-control select2me', 'ng-model' => 'company_ground_id'])?>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="portlet light" >
                        <div class="portlet-body form" >
                            <div class="caption font-blue">
                                <i class="icon-globe font-blue"></i>
                                <span class="caption-subject bold uppercase"> Ubicacion de Consorcio</span>
                            </div>
                            <div class="alert alert-danger display-hide">
                              <button class="close" data-close="alert"></button>
                              Usted tiene algunos errores en el formulario . Por favor , consulte más abajo .
                            </div>
                            <?= $form->field($companyConsortium, 'country_id')->dropDownList($countryList, ['class'=>'form-control select2me', 'ng-model' => 'country_id', 'prompt'=>"Seleccionar país", 'onchange'=>'$.post("'.Yii::$app->urlManager->createUrl(["/sys_timezone/state/stateslist"]).'&idCountry="+$(this).val(), function(data){$("select#companyconsortium-state_id").html(data);});']) ?>
                            <?= $form->field($companyConsortium, 'state_id')->dropDownList(array('prompt'=>'Seleccionar Estado'), ['class'=>'form-control select2me', 'ng-model' => 'state_id', 'onchange'=>'$.post("'.Yii::$app->urlManager->createUrl(["/sys_timezone/city/listbystate"]).'&idState="+$(this).val(), function(data){$("select#companyconsortium-city_id").html(data);});']) ?>
                            <?= $form->field($companyConsortium, 'city_id')->dropDownList(array('prompt'=>'Seleccionar La Ciudad'), ['class'=>'form-control select2me', 'ng-model' => 'city_id', ])?>
                            <?= $form->field($companyConsortium, 'address')->textArea(['options' => ['class'=>'form-group form-md-line-input form-md-floating-label', 'ng-model' => 'address', 'rows' => '6', 'maxlength' => 1000]]) ?>
                            <?= $form->field($companyConsortium, 'postal_code', ['options' => ['class' => 'form-group form-md-line-input form-md-floating-label', 'maxlength'=>'10'], 'template' => '{input}<label >{label}</label>{error}'])->textInput(['ng-model' => 'postal_code']) ?>
                            <p>You wrote: {{ currency_id + " " + country_id + " " + state_id + " " + city_id + " " + address}}</p> 
                        </div>
                    </div>
                </div>

                <div class="col-md-6 portlet light">
                    <div class="" ng-controller="newFields">
                        <div class="portlet-body form">
                            <div class="caption font-blue">
                                <i class="icon-users font-blue"></i>
                                <span class="caption-subject bold uppercase"> Contacto</span>
                            </div>
                        <?= $form->field($companyConsortium, 'website', ['options' => ['class' => 'form-group form-md-line-input form-md-floating-label'], 'template' => '{input}<label >{label}</label>{error}'])->textInput(['ng-model' => 'website']) /*textInput(actionDinamycusername)*/ ?>
                        <div class="row col-md-5" data-ng-repeat="multiple in array">
                            <div class="row col-md-10">
                                <?= $form->field($companyConsortium, 'phone', ['options' => ['class' => 'form-group form-md-line-input form-md-floating-label'], 'template' => '{input}<label >{label}</label>{error}'])->textInput(['ng-model'=>'multiple.phone']) /*textInput(actionDinamycusername)*/ ?>
                                <!-- <input type="button" ng-show="$last" ng-click="removeChoice()" value="-"> -->
                                <input type="button" ng-show="show" ng-click="removeChoice()" value="-">
                            </div> 
                        </div> 
                        <input type="button" class="remove" value="Agregar" ng-click="addNewChoice()">
                        </div>
                        <div id="choicesDisplay">
                            {{ array }}
                        </div>

<!--                         <div class="col-md-3">
                                            <input class="form-control form-control-inline input-medium date-picker" size="16" type="text" value="">
                                            <span class="help-block">
                                            Select date </span>
                                        </div> -->
                        
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="portlet light" >
                        <div class="portlet-body form" >
                            <div class="caption font-green">
                                <i class="icon-graph font-green"></i>
                                <span class="caption-subject bold uppercase"> Finanzas de Consorcio</span>
                            </div>
                            <div class="alert alert-danger display-hide">
                              <button class="close" data-close="alert"></button>
                              Usted tiene algunos errores en el formulario . Por favor , consulte más abajo .
                            </div>
                            <?= $form->field($companyConsortium, 'currency_id')->dropDownList($currencyList, ['class'=>'form-control select2me', 'ng-model' => 'currency_id', 'prompt'=>"Seleccionar Moneda"]) ?>
                            <?= $form->field($companyConsortium, 'bank_id')->dropDownList(array('prompt'=>'Seleccionar Bancos'), ['class'=>'form-control select2me', 'ng-model' => 'bank_id', 'prompt'=>"Seleccionar Bancos", 'onchange'=>'$.post("'.Yii::$app->urlManager->createUrl(["/sys_timezone/state/stateslist"]).'&idCountry="+$(this).val(), function(data){$("select#companyconsortium-state_id").html(data);});']) ?>
                            <p>You wrote: {{ currency_id + " " + country_id + " " + state_id + " " + city_id + " " + address}}</p> 
                        </div>
                    </div>
                </div>

   

              <div class="row margin-top-10">
                <div class="col-md-12">
                <input type="submit" class="btn btn-ribela'" value="Guardar" ng-click="">
                  <!-- <?= Html::submitButton('Enviar', ['class' => 'btn btn-ribela', 'ng-cloak' => '']) ?> -->
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

