<?php

namespace backend\modules\med_mod\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "med_blood_group".
 *
 * @property integer $id
 * @property string $name
 */
class BloodGroup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'med_blood_group';
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

    public function getBloodGroupList()
    { 
        $models = self::find()->select('id, name')->orderBy(['name'=>SORT_ASC])->asArray()->all();
        return ArrayHelper::map($models, 'id', 'name');
    }
}
