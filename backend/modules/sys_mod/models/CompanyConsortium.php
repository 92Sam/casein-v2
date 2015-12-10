<?php

namespace backend\modules\sys_mod\models;

use Yii;

/**
 * This is the model class for table "sys_company_consortium".
 *
 * @property integer $id
 * @property string $data_company_consortium
 *
 * @property SysCompany[] $sysCompanies
 */
class CompanyConsortium extends \yii\db\ActiveRecord
{
    public $country_id;
    public $state_id;
    public $city_id;
    public $time_zone_id;
    public $name;
    public $dni_type_id;
    public $dni;
    public $currency_id;
    public $address;
    public $phone;
    public $website;
    public $company_ground_id;
    public $postal_code;
    public $bank_id;
    public $email;
    public $account_number;
    public $contact_name;
    public $contact_phone;
    public $contact_email;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sys_company_consortium';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        // return [
        //     [['id'], 'required'],
        //     [['id'], 'integer'],
        //     [['data_company_consortium'], 'string']
        // ];

        return [
            [['name', 'dni', 'dni_type_id', 'postal_code', 'country_id', 'state_id'], 'required'],
            [['country_id', 'state_id', 'city_id', 'time_zone_id', 'dni_type_id', 'company_ground_id'], 'integer'],
            // [['name'], 'string', 'max' => 5],
            [['address'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'currency_id' => 'Moneda',
            'data_company_consortium' => 'Data Company Consortium',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSysCompanies()
    {
        return $this->hasMany(SysCompany::className(), ['id_company_consortium' => 'id']);
    }
}
