<?php

namespace backend\modules\sys_mod\models;

use Yii;

/**
 * This is the model class for table "sys_company".
 *
 * @property integer $id
 * @property integer $id_company_consortium
 * @property string $company_data
 *
 * @property SysCompanyConsortium $idCompanyConsortium
 */
class Company extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sys_company';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_company_consortium'], 'integer'],
            [['company_data'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_company_consortium' => 'Id Company Consortium',
            'company_data' => 'Company Data',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCompanyConsortium()
    {
        return $this->hasOne(SysCompanyConsortium::className(), ['id' => 'id_company_consortium']);
    }
}
