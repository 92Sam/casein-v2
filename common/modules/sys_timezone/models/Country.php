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
            [['surface_area', 'life_expectancy', 'gnp', 'gnpold'], 'number'],
            [['indep_year', 'population', 'capital'], 'integer'],
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
        $models = self::find()->asArray()->all();
        return ArrayHelper::map($models, 'id', 'name');
    }
}
