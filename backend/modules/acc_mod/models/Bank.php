<?php

namespace backend\modules\acc_mod\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "acc_bank".
 *
 * @property integer $id
 * @property integer $country_id
 * @property string $name
 * @property string $bank_data
 */
class Bank extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'acc_bank';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['country_id'], 'integer'],
            [['bank_data'], 'string'],
            [['name'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'country_id' => 'Country ID',
            'name' => 'Name',
            'bank_data' => 'Bank Data',
        ];
    }

    public function getBankslistbycountry($country_id)
    { 
        $models = self::find()->where(['country_id' => $country_id])->all();
        var_dump($models); exit();
        // $listCurrency = [];
        // foreach ($models as $key => $value) {
        //     # code...
        //     $listCurrency[$key]['id'] = $value['id'];
        //     $listCurrency[$key]['value'] = $value['alphabetic_code'] . ' - ' . $value['name'] . ' (' . $value['symbol'] . ')';
        // }
        // //var_dump($listCurrency); exit();
        // return ArrayHelper::map($listCurrency, 'id', 'value');
    }
}
