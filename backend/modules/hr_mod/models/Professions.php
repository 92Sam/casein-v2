<?php

namespace backend\modules\hr_mod\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "hr_professions".
 *
 * @property integer $id
 * @property string $name
 */
class Professions extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hr_professions';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string']
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
        ];
    }

    public function getProfessionList()
    { 
        $models = self::find()->select('id, name')->orderBy(['name'=>SORT_ASC])->asArray()->all();
        return ArrayHelper::map($models, 'id', 'name');
    }
}
