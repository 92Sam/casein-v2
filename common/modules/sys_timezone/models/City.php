<?php

namespace common\modules\sys_timezone\models;

use Yii;

/**
 * This is the model class for table "sys_city".
 *
 * @property integer $id
 * @property string $name
 * @property string $country_code
 * @property string $district
 * @property integer $population
 * @property integer $state_id
 *
 * @property SysState $state
 */
class City extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sys_city';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['population', 'state_id'], 'integer'],
            [['name'], 'string', 'max' => 100],
            [['country_code'], 'string', 'max' => 3],
            [['district'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'country_code' => 'Country Code',
            'district' => 'District',
            'population' => 'Population',
            'state_id' => 'State ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getState()
    {
        return $this->hasOne(SysState::className(), ['id' => 'state_id']);
    }
}
