<?php

namespace backend\modules\sys_mod\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "sys_company_ground".
 *
 * @property integer $id
 * @property string $name
 */
class CompanyGround extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sys_company_ground';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 300]
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

    public function getCompanyGroundList()
    { 
        $models = self::find()->asArray()->all();
        // return ArrayHelper::map($models, 'id', 'name');

        $listCompanyGround = [];
        foreach ($models as $key => $value) {
            # code...
            $listCompanyGround[$key]['id'] = $value['id'];
            $listCompanyGround[$key]['name'] = $value['name'];
        }
        return $listCompanyGround;
    }
}
