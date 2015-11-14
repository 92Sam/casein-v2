<?php

namespace common\modules\sys_timezone\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "sys_currency".
 *
 * @property integer $id
 * @property string $name
 * @property string $alphabetic_code
 * @property string $numeric_code
 * @property string $minor_unit
 * @property integer $status_bit
 * @property integer $symbol
 */
class Currency extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sys_currency';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status_bit'], 'integer'],
            [['name'], 'string', 'max' => 200],
            [['alphabetic_code', 'numeric_code', 'minor_unit'], 'string', 'max' => 3]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Currency',
            'alphabetic_code' => 'Alphabetic Code',
            'numeric_code' => 'Numeric Code',
            'minor_unit' => 'Minor Unit',
            'status_bit' => 'Status Bit',
        ];
    }

    public function getCurrencyList()
    { 
        $models = self::find()->asArray()->all();
        $listCurrency = [];
        foreach ($models as $key => $value) {
            # code...
            $listCurrency[$key]['id'] = $value['id'];
            $listCurrency[$key]['value'] = $value['alphabetic_code'] . ' - ' . $value['name'] . ' (' . $value['symbol'] . ')';
        }
        //var_dump($listCurrency); exit();
        return ArrayHelper::map($listCurrency, 'id', 'value');
    }
}
