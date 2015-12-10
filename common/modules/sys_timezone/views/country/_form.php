<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\modules\sys_timezone\models\Country */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="country-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'continent')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'region')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'surface_area')->textInput() ?>

    <?= $form->field($model, 'indep_year')->textInput() ?>

    <?= $form->field($model, 'population')->textInput() ?>

    <?= $form->field($model, 'life_expectancy')->textInput() ?>

    <?= $form->field($model, 'gnp')->textInput() ?>

    <?= $form->field($model, 'gnpold')->textInput() ?>

    <?= $form->field($model, 'local_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'goverment_form')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'head_state')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'capital')->textInput() ?>

    <?= $form->field($model, 'iso_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'numeric_code')->textInput() ?>

    <?= $form->field($model, 'phone_code')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
