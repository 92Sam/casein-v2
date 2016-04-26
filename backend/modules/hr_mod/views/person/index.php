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
                             <div class="row col-md-10">
                                <?= $form->field($personData, 'first_name', ['options' => ['class' => 'form-group form-md-line-input form-md-floating-label'], 'template' => '{input}<label >{label}</label>{error}'])->textInput(['ng-model' => 'name', 'ng-init'=>["name"=>'Bob'], 'ng-value'=>'bob']) /*textInput(actionDinamycusername)*/ ?>
                                <?= $form->field($personData, 'second_name', ['options' => ['class' => 'form-group form-md-line-input form-md-floating-label'], 'template' => '{input}<label >{label}</label>{error}'])->textInput(['ng-model' => 'name', 'ng-init'=>["name"=>'Bob'], 'ng-value'=>'bob']) /*textInput(actionDinamycusername)*/ ?>
                                <?= $form->field($personData, 'first_surname', ['options' => ['class' => 'form-group form-md-line-input form-md-floating-label'], 'template' => '{input}<label >{label}</label>{error}'])->textInput(['ng-model' => 'name', 'ng-init'=>["name"=>'Bob'], 'ng-value'=>'bob']) /*textInput(actionDinamycusername)*/ ?>
                                <?= $form->field($personData, 'second_surname', ['options' => ['class' => 'form-group form-md-line-input form-md-floating-label'], 'template' => '{input}<label >{label}</label>{error}'])->textInput(['ng-model' => 'name', 'ng-init'=>["name"=>'Bob'], 'ng-value'=>'bob']) /*textInput(actionDinamycusername)*/ ?>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                  <?= $form->field($personData, 'dni_type_id')->dropDownList( ['1'=>'J-','2'=>'G-','3'=>'E-'] , ['prompt'=>'Tipo de Registro','class'=>'form-control select2me', 'ng-model' => 'dni_type_id'])?>
                                </div>  
                                <div class="col-md-3">
                                  <?= $form->field($personData, 'dni', ['options' => ['class' => 'form-group form-md-line-input form-md-floating-label', 'maxlength'=>'10'], 'template' => '{input}<label >{label}</label>{error}'])->textInput(['value' => '123456']) ?>
                                </div>                            
                            </div>  

                            <div class="row">

                              

                               <!--  <div class="col-md-3">
                                  ?= $form->field($personData, 'date_born', ['options' => ['class' => 'form-group form-md-line-input form-md-floating-label', 'maxlength'=>'10'], 'template' => '{input}<label >{label}</label>{error}'])->textInput(['value' => '1975-09-15']) ?>
                                </div>  -->
                                <div class="col-md-3">
                                  <?= $form->field($personData, 'gender')->dropDownList(['M'=>'M','F'=>'F'], ['prompt'=>'Genero','class'=>'form-control select2me', 'ng-model' => 'dni_type_id'])?>
                                </div>  
                                <div class="col-md-3">
                                  <?= $form->field($personData, 'marital_status_id')->dropDownList(['1'=>'Casado','2'=>'Soltero','3'=>'Viudo'], ['prompt'=>'Estado Marital','class'=>'form-control select2me', 'ng-model' => 'dni_type_id'])?>
                                </div>
                             </div>  

                                <!-- <input class="form-control form-control-inline input-medium date-picker" size="16" type="text" value=""> -->
                                
                              
                              <div class="form-group form-md-line-input form-md-floating-label field-person-second_surname">
                                 <span class="help-block"> Select date </span>
                                  <input type="text" id="person-second_surname" class="form-control form-control-inline input-medium date-picker" name="Person[date_born]" ng-model="date_born" >
                                  <div class="help-block"></div>
                              </div>

                            <?= $form->field($personData, 'blood_group_id')->dropDownList($bloodGroup , ['prompt'=>'Grupo Sanguineo','class'=>'form-control select2me', 'ng-model' => 'dni_type_id'])?>
                            <?= $form->field($personData, 'nationality_country_id')->dropDownList($countryList, ['class'=>'form-control select2me', 'ng-model' => 'nationality_country_id', 'prompt'=>"Seleccione su Nacionalidad"]) ?>
                        </div>
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="portlet light" >
                        <div class="portlet-body form" >
                            <div class="caption font-blue">
                                <i class="icon-globe font-blue"></i>
                                <span class="caption-subject bold uppercase"> Ubicacion</span>
                            </div>
                            <div class="alert alert-danger display-hide">
                              <button class="close" data-close="alert"></button>
                              Usted tiene algunos errores en el formulario . Por favor , consulte más abajo .
                            </div>
                            
                            <?= $form->field($personData, 'country_id')->dropDownList($countryList, ['class'=>'form-control select2me', 'ng-model' => 'country_id', 'ng-change' => 'countryAction()', 'prompt'=>"Seleccionar país"]) ?>
                            <?= $form->field($personData, 'state_id')->dropDownList(['1'=>'Estado 1','2'=>'Estado 2'], ['class'=>'form-control select2me', 'ng-model' => 'state_id', 'data-ng-repeat' => 'x in states_list'] )?>
                            <?= $form->field($personData, 'city_id')->dropDownList(['prompt'=>'Seleccionar La Ciudad','1'=>'Ciudad 1','2'=>'Ciudad 2'], ['class'=>'form-control select2me', 'ng-model' => 'state_id', 'data-ng-repeat' => 'x in states_list'] )?>
                            <?= $form->field($personData, 'address')->textArea(['options' => ['class'=>'form-group form-md-line-input form-md-floating-label', 'ng-model' => 'address', 'rows' => '6', 'maxlength' => '10']]) ?>
                             
                        </div>
                    </div>
                </div>

                <div class="col-md-6" ng-show="isEven == true">
                    <div class="portlet light" >
                        <div class="portlet-body form" >
                            <div class="caption font-green">
                                <i class="icon-graph font-green"></i>
                                <span class="caption-subject bold uppercase"> Area Tecnica</span>
                            </div>
                            <div class="alert alert-danger display-hide">
                              <button class="close" data-close="alert"></button>
                              Usted tiene algunos errores en el formulario . Por favor , consulte más abajo .
                            </div>
                          <?= $form->field($personData, 'education_level_id')->dropDownList(['1'=>'Tecnico','2'=>'Universitario','3'=>'Estudiante'], ['class'=>'form-control select2me', 'ng-model' => 'education_level_id', 'prompt'=>"Seleccione nivel de instruccion"]) ?>
                          <?= $form->field($personData, 'profession_id')->dropDownList(['1'=>'Ingeniero','2'=>'Cocinero','3'=>'Piloto'], ['class'=>'form-control select2me', 'ng-model' => 'education_level_id', 'prompt'=>"Seleccione nivel de instruccion"]) ?>
                        </div>
                    </div>
                </div>

                <div class="col-md-6" ng-show="isEven == true">
                    <div class="portlet light" >
                        <div class="portlet-body form" >
                            <div class="caption font-green">
                                <i class="icon-graph font-green"></i>
                                <span class="caption-subject bold uppercase"> Contacto</span>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <?= $form->field($personData, 'phone_number_personal', ['options' => ['class' => 'form-group form-md-line-input form-md-floating-label', 'maxlength'=>'10'], 'template' => '{input}<label >{label}</label>{error}'])->textInput(['value' => '04128888844']) ?>
                                </div> 
                            </div> 
                            <div class="row">
                                <div class="col-md-6">
                                  <?= $form->field($personData, 'email', ['options' => ['class' => 'form-group form-md-line-input form-md-floating-label', 'maxlength'=>'10'], 'template' => '{input}<label >{label}</label>{error}'])->textInput(['value' => 'correoprueba1@gmail.com']) ?>
                                </div>  
                                <div class="col-md-6">
                                  <?= $form->field($personData, 'email_2', ['options' => ['class' => 'form-group form-md-line-input form-md-floating-label', 'maxlength'=>'10'], 'template' => '{input}<label >{label}</label>{error}'])->textInput(['value' => 'correoprueba2@hotmail.com']) ?>
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