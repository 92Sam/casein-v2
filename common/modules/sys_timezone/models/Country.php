<?php

namespace common\modules\sys_timezone\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "sys_country".
 *
 * @property integer $id
 * @property string $code
 * @property string $name
 * @property string $continent
 * @property string $region
 * @property double $surface_area
 * @property integer $indep_year
 * @property integer $population
 * @property double $life_expectancy
 * @property double $gnp
 * @property double $gnpold
 * @property string $local_name
 * @property string $goverment_form
 * @property string $head_state
 * @property integer $capital
 * @property string $iso_code
 * @property string $currency_data
 * @property integer $numeric_code
 * @property integer $phone_code
 *
 * @property SysState[] $sysStates
 */
class Country extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sys_country';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'local_name', 'code'], 'required'],
            [['surface_area', 'life_expectancy', 'gnp', 'gnpold'], 'number'],
            [['indep_year', 'population', 'capital', 'numeric_code', 'phone_code'], 'integer'],
            [['currency_data'], 'string'],
            [['code'], 'string', 'max' => 3],
            [['name'], 'string', 'max' => 100],
            [['continent', 'region'], 'string', 'max' => 30],
            [['local_name', 'goverment_form', 'head_state'], 'string', 'max' => 60],
            [['iso_code'], 'string', 'max' => 2]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'Code',
            'name' => 'Name',
            'continent' => 'Continent',
            'region' => 'Region',
            'surface_area' => 'Surface Area',
            'indep_year' => 'Indep Year',
            'population' => 'Population',
            'life_expectancy' => 'Life Expectancy',
            'gnp' => 'Gnp',
            'gnpold' => 'Gnpold',
            'local_name' => 'Local Name',
            'goverment_form' => 'Goverment Form',
            'head_state' => 'Head State',
            'capital' => 'Capital',
            'iso_code' => 'Iso Code',
            'currency_data' => 'Currency Data',
            'numeric_code' => 'Numeric Code',
            'phone_code' => 'Phone Code',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSysStates()
    {
        return $this->hasMany(SysState::className(), ['country_id' => 'id']);
    }

    public function getCountryList()
    { 
        $models = self::find()->select('id, name')->orderBy(['name'=>SORT_ASC])->asArray()->all();
        // var_dump($models); exit();
        return ArrayHelper::map($models, 'id', 'name');
    }
}
