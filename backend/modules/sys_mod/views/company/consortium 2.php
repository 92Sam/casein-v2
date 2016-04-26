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
            <!-- FORM -->
            <form name="myform" ng-app="companyMod" ng-controller="saveCompany" ng-submit="submitCompany()">
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

                            <div class="form-group form-md-line-input form-md-floating-label" aria-required="true">
                                <input type="text" id="companyconsortium-name" class="form-control ng-pristine ng-untouched ng-valid" name="CompanyConsortium[name]" ng-model="name">
                                <label><label class="control-label" for="companyconsortium-phone">name</label>
                                </label><div class="help-block"></div>
                            </div>
                            <!-- ?= $form->field($companyConsortium, 'name', ['options' => ['class' => 'form-group form-md-line-input form-md-floating-label'], 'template' => '{input}<label >{label}</label>{error}'])->textInput(['ng-model' => 'name', 'ng-init'=>["name"=>'Bob'], 'ng-value'=>'bob']) /*textInput(actionDinamycusername)*/ ?> -->
                            <p>You wrote: {{ name + " " + company_ground_id + " " + dni_type_id + " " + dni }}</p> 
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group field-companyconsortium-dni_type_id">
                                        <label class="control-label" for="companyconsortium-dni_type_id">dni_type_id</label>
                                        <select id="companyconsortium-dni_type_id" name="CompanyConsortium[dni_type_id]" class="form-control select2me" ng-model="dni_type_id">
                                            <option value=""> Tipo de Registro </option>
                                            <option value="J"> J </option>
                                            <option value="G"> G </option>
                                            <option value="E"> E </option>
                                        </select>
                                        <div class="help-block"></div>
                                    </div>
                                <!-- ?= $form->field($companyConsortium, 'dni_type_id')->dropDownList( ['1'=>'J-','2'=>'G-','3'=>'E-'] , ['prompt'=>'Tipo de Registro','class'=>'form-control select2me', 'ng-model' => 'dni_type_id'])?> -->
                                </div>  
                                <div class="col-md-4">
                                    <div class="form-group form-md-line-input form-md-floating-label" aria-required="true">
                                            <input type="text" id="companyconsortium-dni" class="form-control ng-pristine ng-untouched ng-valid" name="CompanyConsortium[dni]" ng-model="dni">
                                            <label><label class="control-label" for="companyconsortium-phone">dni</label>
                                            </label><div class="help-block"></div>
                                    </div>
                                <!-- ?= $form->field($companyConsortium, 'dni', ['options' => ['class' => 'form-group form-md-line-input form-md-floating-label', 'maxlength'=>'10'], 'template' => '{input}<label >{label}</label>{error}'])->textInput(['ng-model' => 'dni']) ?>  -->
                                </div>  
                            </div>  
                            <div class="form-group field-companyconsortium-company_ground_id">
                                <label class="control-label" for="companyconsortium-company_ground_id">company_ground_id</label>
                                <select id="companyconsortium-company_ground_id" name="CompanyConsortium[company_ground_id]" class="form-control select2me" ng-model="company_ground_id">>
                                    <option value=""> Seleccione Campo de Empresa </option>
                                    <?php foreach ($companyGroundList as $key => $value) { ?>
                                        <option value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
                                    <?php } ?>
                                </select>
                                <div class="help-block"></div>
                            </div>
                            <!-- ?= $form->field($companyConsortium, 'company_ground_id')->dropDownList($companyGroundList, ['class'=>'form-control select2me', 'ng-model' => 'company_ground_id'])?>  -->
                        </div>
                    </div>
                </div>



                <div class="col-md-6" ng-controller="countryController">
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
                            
                            <div class="form-group field-companyconsortium-country_id">
                                <label class="control-label" for="companyconsortium-country_id">country_id</label>
                                <select id="companyconsortium-country_id" name="CompanyConsortium[country_id]" class="form-control select2me" ng-change="countryAction()" ng-model="country_id">
                                    <option value=""> Seleccione un Pais </option>
                                    <?php foreach ($countryList as $key => $value) { ?>
                                        <option value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
                                    <?php } ?>
                                </select>
                                <div class="help-block"></div>
                            </div>

                            <!-- ?= $form->field($companyConsortium, 'country_id')->dropDownList($countryList, ['class'=>'form-control select2me', 'ng-model' => 'country_id', 'ng-change' => 'countryAction()', 'prompt'=>"Seleccionar país"]) ?> -->
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
                                    <select id="companyconsortium-city_id" class="form-control ng-pristine ng-valid ng-touched select2me" name="CompanyConsortium[city_id]" ng-model="city_id"/>
                                    <option value="">Seleccionar Estado</option>
                                    <option data-ng-repeat="country in country_list" value="{{country.id}}">{{country.name}}</option>
                                    </select>
                                <div class="help-block"></div>
                            </div>

                            <!-- ?= $form->field($companyConsortium, 'city_id')->dropDownList(array('prompt'=>'Seleccionar La Ciudad'), ['class'=>'form-control select2me', 'ng-model' => 'city_id', ])?> -->
                            <div class="form-group form-md-line-input form-md-floating-label" aria-required="true">
                                <input type="text" id="companyconsortium-address" class="form-control ng-pristine ng-untouched ng-valid" name="CompanyConsortium[address]" ng-model="address"/>
                                <label><label class="control-label" for="companyconsortium-address">address</label>
                                </label><div class="help-block"></div>      
                            </div>
                            <!-- ?= $form->field($companyConsortium, 'address')->textArea(['options' => ['class'=>'form-group form-md-line-input form-md-floating-label', 'ng-model' => 'address', 'rows' => '6', 'maxlength' => '10']]) ?> -->
                            
                            <div class="form-group form-md-line-input form-md-floating-label" aria-required="true">
                                <input type="text" id="companyconsortium-postal_code" class="form-control ng-pristine ng-untouched ng-valid" name="CompanyConsortium[postal_code]" ng-model="postal_code"/>
                                <label><label class="control-label" for="companyconsortium-phone">postal_code</label>
                                </label><div class="help-block"></div>      
                            </div>
                            <!-- ?= $form->field($companyConsortium, 'postal_code', ['options' => ['class' => 'form-group form-md-line-input form-md-floating-label', 'maxlength'=>'10'], 'template' => '{input}<label >{label}</label>{error}'])->textInput(['ng-model' => 'postal_code']) ?> -->
                            
                            <div class="form-group form-md-line-input form-md-floating-label" aria-required="true">
                                        <label class="control-label" for="companyconsortium-time_zone_id">time_zone_id</label>
                                        <select id="companyconsortium-time_zone_id" name="CompanyConsortium[time_zone_id]" class="form-control select2me" ng-model="time_zone_id">>
                                            <option value=""> Zona Horaria </option>
                                            <option value="1"> Caracas GTM -4:30 </option>
                                        </select>
                                        <div class="help-block"></div>
                            </div>
                            <!-- ?= $form->field($companyConsortium, 'time_zone_id')->dropDownList( ['1'=>'Carcas GTM -4:30'] , ['prompt'=>'Seleccione Zona Horaria','class'=>'form-control select2me', 'ng-model' => 'time_zone_id'])?> -->
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
                                        <input type="text" id="companyconsortium-email" class="form-control ng-pristine ng-untouched ng-valid" name="CompanyConsortium[email]" ng-model="email"/>
                                        <label>
                                        <label class="control-label" for="companyconsortium-email">email</label>
                                        </label>
                                        <div class="help-block"></div>      
                                        <!-- ?= $form->field($companyConsortium, 'email', ['template' => '{input}<label >{label}</label>{error}'])->textInput(['ng-model' => 'email']) /*textInput(actionDinamycusername)*/ ?> -->
                                    </div>  
                                </div>
                                <div class="form-group form-md-line-input form-md-floating-label" aria-required="true">
                                    <input type="text" id="companyconsortium-website" class="form-control ng-pristine ng-untouched ng-valid" name="CompanyConsortium[website]" ng-model="website"/>
                                    <label>
                                        <label class="control-label" for="companyconsortium-website">website</label>
                                    </label>
                                    <div class="help-block"></div>      
                                </div>
                                <!-- ?= $form->field($companyConsortium, 'website', ['options' => ['class' => 'form-group form-md-line-input form-md-floating-label'], 'template' => '{input}<label >{label}</label>{error}'])->textInput(['ng-model' => 'website']) /*textInput(actionDinamycusername)*/ ?> -->
                            </div>

                            <div class="row col-md-4" data-ng-repeat="multiple in array">
                                <div class="row col-md-12">
                                    <div class="form-group form-md-line-input form-md-floating-label" aria-required="true">
                                        <input type="text" id="companyconsortium-multiple.phone" class="form-control ng-pristine ng-untouched ng-valid" name="CompanyConsortium[multiple.phone]" ng-model="multiple.phone" />
                                        <label>
                                            <label class="control-label" for="companyconsortium-multiple.phone">multiple.phone</label>
                                        </label>
                                        <div class="help-block"></div>      
                                    </div>
                                    <!-- ?= $form->field($companyConsortium, 'phone', ['options' => ['class' => 'form-group form-md-line-input form-md-floating-label'], 'template' => '{input}<label >{label}</label>{error}'])->textInput(['ng-model'=>'multiple.phone']) /*textInput(actionDinamycusername)*/ ?> -->
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
                                    <div class="form-group form-md-line-input form-md-floating-label" aria-required="true">
                                        <input type="text" id="companyconsortium-contact_name" class="form-control ng-pristine ng-untouched ng-valid" name="CompanyConsortium[contact_name]" ng-model="multiple.contact_name" />
                                        <label>
                                            <label class="control-label" for="companyconsortium-contact_name">contact_name</label>
                                        </label>
                                        <div class="help-block"></div>
                                    </div>
                                    <div class="form-group form-md-line-input form-md-floating-label" aria-required="true">
                                        <input type="text" id="companyconsortium-contact_phone" class="form-control ng-pristine ng-untouched ng-valid" name="CompanyConsortium[contact_phone]" ng-model="multiple.contact_phone" />
                                        <label>
                                            <label class="control-label" for="companyconsortium-contact_phone">contact_phone</label>
                                        </label>
                                        <div class="help-block"></div>
                                    </div>
                                    <div class="form-group form-md-line-input form-md-floating-label" aria-required="true">
                                        <input type="text" id="companyconsortium-contact_email" class="form-control ng-pristine ng-untouched ng-valid" name="CompanyConsortium[contact_email]" ng-model="multiple.contact_email" />
                                        <label>
                                            <label class="control-label" for="companyconsortium-contact_email">contact_email</label>
                                        </label>
                                        <div class="help-block"></div>
                                    </div>

                                            <!-- ?= $form->field($companyConsortium, 'contact_name', ['options' => ['class' => 'form-group form-md-line-input form-md-floating-label', 'maxlength'=>'10'], 'template' => '{input}<label >{label}</label>{error}'])->textInput(['ng-model' => 'multiple.contact_name']) ?>
                                            ?= $form->field($companyConsortium, 'contact_phone', ['options' => ['class' => 'form-group form-md-line-input form-md-floating-label', 'maxlength'=>'10'], 'template' => '{input}<label >{label}</label>{error}'])->textInput(['ng-model' => 'multiple.contact_phone']) ?>
                                            ?= $form->field($companyConsortium, 'contact_email', ['options' => ['class' => 'form-group form-md-line-input form-md-floating-label', 'maxlength'=>'10'], 'template' => '{input}<label >{label}</label>{error}'])->textInput(['ng-model' => 'multiple.contact_email']) ?> -->
                                    
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

                            <div class="form-group field-companyconsortium-country_id">
                                <label><label class="control-label" for="companyconsortium-currency_id">currency_id</label>
                                <select id="companyconsortium-currency_id" name="CompanyConsortium[currency_id]" class="form-control select2me" ng-model="currency_id">
                                    <option value=""> Seleccione Moneda </option>
                                    <?php foreach ($currencyList as $key => $value) { ?>
                                        <option value="<?= $value['id'] ?>"><?= $value['value'] ?></option>
                                    <?php } ?>
                                </select>
                                <div class="help-block"></div>
                            </div>
                            <!-- ?= $form->field($companyConsortium, 'currency_id')->dropDownList($currencyList, ['class'=>'form-control select2me', 'ng-model' => 'currency_id', 'prompt'=>"Seleccionar Moneda"]) ?> -->
                            <!-- = $form->field($companyConsortium, 'bank_id')->dropDownList(['{{x.id}}'=>'{{x.name}}'], ['class'=>'form-control select2me', 'ng-model' => 'bank_id', 'data-ng-repeat' => 'x in bank_list', 'prompt'=>"Seleccionar Bancos"]) ?> -->
                            
                            <div class="form-group field-companyconsortium-bank_id">
                                    <label class="control-label" for="companyconsortium-bank_id">State Id</label>
                                    <select id="companyconsortium-bank_id" class="form-control ng-pristine ng-valid ng-touched select2me" name="CompanyConsortium[bank_id]" ng-model="bank_id">
                                        <option value="">Seleccionar Bancos</option>
                                        <option data-ng-repeat="bank in bank_list" value="{{bank.id}}">{{bank.name}}</option>
                                    </select>
                                <div class="help-block"></div>
                            </div>
                            
                            <div class="form-group form-md-line-input form-md-floating-label" aria-required="true">
                                <input type="text" id="companyconsortium-account_number" class="form-control ng-pristine ng-untouched ng-valid" name="CompanyConsortium[account_number]" ng-model="account_number" />
                                <label><label class="control-label" for="companyconsortium-phone">account_number</label>
                                </label><div class="help-block"></div>      
                            </div>
                            <!-- ?= $form->field($companyConsortium, 'account_number', ['options' => ['class' => 'form-group form-md-line-input form-md-floating-label'], 'template' => '{input}<label >{label}</label>{error}'])->textInput(['ng-model' => 'account_number']) /*textInput(actionDinamycusername)*/ ?> -->


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
            <!-- END FORM -->
            </form>
          </div>
        </div>
      </div> 
    </div>    
</div><!-- create_account -->

