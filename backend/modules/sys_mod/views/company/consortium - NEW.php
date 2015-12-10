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
                // 'class' => 'ng-pristine ng-valid validaMetro',
                'ng-app' => 'companyMod',
                'ng-controller'=>'submitCompany',
                'ng-submit'=>'submit()'
                ],
            ]); ?>
            <div class="form-body"  ng-controller="countryController">
                
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
                                <?= $form->field($companyConsortium, 'dni_type_id')->dropDownList( ['1'=>'J-','2'=>'G-','3'=>'E-'] , ['prompt'=>'Tipo de Registro','class'=>'form-control select2me', 'ng-model' => 'dni_type_id'])?>
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
                            
                            <?= $form->field($companyConsortium, 'country_id')->dropDownList($countryList, ['class'=>'form-control select2me', 'ng-model' => 'country_id', 'ng-change' => 'countryAction()', 'prompt'=>"Seleccionar país"]) ?>
                            <!-- $form->field($companyConsortium, 'state_id')->dropDownList(['{{x.id}}'=>'{{x.name}}'], ['class'=>'form-control select2me', 'ng-model' => 'state_id', 'data-ng-repeat' => 'x in states_list'] )?> -->
                            
                            <div class="form-group field-companyconsortium-state_id">
                                    <label class="control-label" for="companyconsortium-state_id">State Id</label>
                                    <select id="companyconsortium-state_id" class="form-control ng-pristine ng-valid ng-touched select2me" name="CompanyConsortium[state_id]" ng-model="state_id" ng-change="stateAction()">
                                    <option value="">Seleccionar Estado</option>
                                    <option data-ng-repeat="state in states_list" value="{{state.id}}">{{state.name}}</option>
                                    </select>
                                <div class="help-block"></div>
                            </div>

                            <div class="form-group field-companyconsortium-city_id">
                                    <label class="control-label" for="companyconsortium-city_id">City Id</label>
                                    <select id="companyconsortium-city_id" class="form-control ng-pristine ng-valid ng-touched select2me" name="CompanyConsortium[city_id]" ng-model="city_id">
                                    <option value="">Seleccionar Estado</option>
                                    <option data-ng-repeat="country in country_list" value="{{country.id}}">{{country.name}}</option>
                                    </select>
                                <div class="help-block"></div>
                            </div>

                            <!-- ?= $form->field($companyConsortium, 'city_id')->dropDownList(array('prompt'=>'Seleccionar La Ciudad'), ['class'=>'form-control select2me', 'ng-model' => 'city_id', ])?> -->
                            <?= $form->field($companyConsortium, 'address')->textArea(['options' => ['class'=>'form-group form-md-line-input form-md-floating-label', 'ng-model' => 'address', 'rows' => '6', 'maxlength' => '10']]) ?>
                            <?= $form->field($companyConsortium, 'postal_code', ['options' => ['class' => 'form-group form-md-line-input form-md-floating-label', 'maxlength'=>'10'], 'template' => '{input}<label >{label}</label>{error}'])->textInput(['ng-model' => 'postal_code']) ?>
                            <?= $form->field($companyConsortium, 'time_zone_id')->dropDownList( ['1'=>'Carcas GTM -4:30'] , ['prompt'=>'Seleccione Zona Horaria','class'=>'form-control select2me', 'ng-model' => 'time_zone_id'])?>
                            <p>You wrote: {{ currency_id + " " + country_id + " " + state_id + " " + city_id + " " + address + " " + time_zone_id}}</p> 
                        </div>
                    </div>
                </div>

                <div class="col-md-6 portlet light" ng-show="isEven == true">
                    <div class="" ng-controller="newFields">
                        <div class="portlet-body form">
                            <div class="caption font-blue">
                                <i class="fa fa-book font-blue"></i>
                                <span class="caption-subject bold uppercase">Directorio</span>
                            </div>
                            
                            <div class="row col-md-12">
                                <div class="form-group form-md-line-input has-info form-md-floating-label">
                                    <div class="input-group left-addon">
                                                    <span class="input-group-addon">
                                                    <i class="fa fa-envelope"></i>
                                                    </span>
                                        <?= $form->field($companyConsortium, 'email', ['template' => '{input}<label >{label}</label>{error}'])->textInput(['ng-model' => 'email']) /*textInput(actionDinamycusername)*/ ?>
                                    </div>  
                                </div>
                                <?= $form->field($companyConsortium, 'website', ['options' => ['class' => 'form-group form-md-line-input form-md-floating-label'], 'template' => '{input}<label >{label}</label>{error}'])->textInput(['ng-model' => 'website']) /*textInput(actionDinamycusername)*/ ?>
                            </div>

                            <div class="row col-md-4" data-ng-repeat="multiple in array">
                                <div class="row col-md-12">
                                    <?= $form->field($companyConsortium, 'phone', ['options' => ['class' => 'form-group form-md-line-input form-md-floating-label'], 'template' => '{input}<label >{label}</label>{error}'])->textInput(['ng-model'=>'multiple.phone']) /*textInput(actionDinamycusername)*/ ?>
                                    <a href="javascript:;" class="btn btn-icon-only btn-circle purple" ng-show="$last" ng-click="removeChoice()">
                                        <i class="fa fa-times"></i>
                                    </a>       
                                    <a href="javascript:;" class="btn btn-icon-only btn-circle green" ng-show="$last" ng-click="addNewChoice()" >
                                        <span class="md-click-circle md-click-animate" style="height: 34px; width: 34px; top: 9px; left: -3.75px;"></span>
                                        <i class="fa fa-plus"></i>
                                    </a>
                                </div> 
                                 <!-- {{array}} -->
                            </div> 
                            <!-- <div class="row col-md-2">
                                <input type="button" class="remove" value="Agregar">
    
                            </div> -->

                            <div class="row col-md-12 margin-top-20">
                                <div class="col-md-6 portlet light" data-ng-repeat="multiple in contact">
                                    <div class="caption font-blue">
                                        <i class="icon-users font-blue"></i>
                                        <span class="caption-subject bold uppercase">Contacto {{multiple.contact_name}}</span>
                                    </div>
                                            <?= $form->field($companyConsortium, 'contact_name', ['options' => ['class' => 'form-group form-md-line-input form-md-floating-label', 'maxlength'=>'10'], 'template' => '{input}<label >{label}</label>{error}'])->textInput(['ng-model' => 'multiple.contact_name']) ?>
                                            <?= $form->field($companyConsortium, 'contact_phone', ['options' => ['class' => 'form-group form-md-line-input form-md-floating-label', 'maxlength'=>'10'], 'template' => '{input}<label >{label}</label>{error}'])->textInput(['ng-model' => 'multiple.contact_phone']) ?>
                                            <?= $form->field($companyConsortium, 'contact_email', ['options' => ['class' => 'form-group form-md-line-input form-md-floating-label', 'maxlength'=>'10'], 'template' => '{input}<label >{label}</label>{error}'])->textInput(['ng-model' => 'multiple.contact_email']) ?>
                                    
                                    <a href="javascript:;" class="btn btn-icon-only btn-circle purple" ng-show="$last" ng-click="removeChoiceCotact()">
                                        <i class="fa fa-times"></i>
                                    </a>       
                                    <a href="javascript:;" class="btn btn-icon-only btn-circle green" ng-show="$last" ng-click="addNewChoiceCotact()" >
                                        <span class="md-click-circle md-click-animate" style="height: 34px; width: 34px; top: 9px; left: -3.75px;"></span>
                                        <i class="fa fa-plus"></i>
                                    </a>
                                </div>

                                {{contact}}

                            </div>

                        </div>
                        <div id="choicesDisplay">
                            <!-- {{ array }} -->
                        </div>

                    </div>
                </div>


                <div class="col-md-6" ng-show="isEven == true">
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
                            <!-- = $form->field($companyConsortium, 'bank_id')->dropDownList(['{{x.id}}'=>'{{x.name}}'], ['class'=>'form-control select2me', 'ng-model' => 'bank_id', 'data-ng-repeat' => 'x in bank_list', 'prompt'=>"Seleccionar Bancos"]) ?> -->
                            
                            <div class="form-group field-companyconsortium-bank_id">
                                    <label class="control-label" for="companyconsortium-bank_id">State Id</label>
                                    <select id="companyconsortium-bank_id" class="form-control ng-pristine ng-valid ng-touched select2me" name="CompanyConsortium[bank_id]" ng-model="bank_id">
                                        <option value="">Seleccionar Bancos</option>
                                        <option data-ng-repeat="bank in bank_list" value="{{bank.id}}">{{bank.name}}</option>
                                    </select>
                                <div class="help-block"></div>
                            </div>
                            <?= $form->field($companyConsortium, 'account_number', ['options' => ['class' => 'form-group form-md-line-input form-md-floating-label'], 'template' => '{input}<label >{label}</label>{error}'])->textInput(['ng-model' => 'account_number']) /*textInput(actionDinamycusername)*/ ?>


                            <p>You wrote: {{ currency_id + " " + country_id + " " + state_id + " " + city_id + " " + address}}</p> 
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

