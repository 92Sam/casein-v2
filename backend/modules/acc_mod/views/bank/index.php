<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\acc_mod\models\BankSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Banks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bank-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Bank', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'country_id',
            'name',
            'bank_data',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
