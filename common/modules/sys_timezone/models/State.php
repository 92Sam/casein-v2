<?php

namespace common\modules\sys_timezone\models;

use Yii;

/**
 * This is the model class for table "sys_state".
 *
 * @property integer $id
 * @property integer $country_id
 * @property string $name
 * @property string $code
 *
 * @property SysCity[] $sysCities
 * @property SysCountry $country
 */
class State extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sys_state';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['country_id'], 'integer'],
            [['code'], 'string'],
            [['name'], 'string', 'max' => 100]
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
            'code' => 'Code',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSysCities()
    {
        return $this->hasMany(SysCity::className(), ['state_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCountry()
    {
        return $this->hasOne(SysCountry::className(), ['id' => 'country_id']);
    }
}
