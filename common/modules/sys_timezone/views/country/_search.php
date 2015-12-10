<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\modules\sys_timezone\models\CountrySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="country-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'code') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'continent') ?>

    <?= $form->field($model, 'region') ?>

    <?php // echo $form->field($model, 'surface_area') ?>

    <?php // echo $form->field($model, 'indep_year') ?>

    <?php // echo $form->field($model, 'population') ?>

    <?php // echo $form->field($model, 'life_expectancy') ?>

    <?php // echo $form->field($model, 'gnp') ?>

    <?php // echo $form->field($model, 'gnpold') ?>

    <?php // echo $form->field($model, 'local_name') ?>

    <?php // echo $form->field($model, 'goverment_form') ?>

    <?php // echo $form->field($model, 'head_state') ?>

    <?php // echo $form->field($model, 'capital') ?>

    <?php // echo $form->field($model, 'iso_code') ?>

    <?php // echo $form->field($model, 'currency_data') ?>

    <?php // echo $form->field($model, 'numeric_code') ?>

    <?php // echo $form->field($model, 'phone_code') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
