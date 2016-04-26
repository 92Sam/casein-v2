<?php

namespace backend\modules\hr_mod\models;

use Yii;

/**
 * This is the model class for table "hr_employee".
 *
 * @property integer $id
 * @property string $employee_data
 * @property string $date_reg
 */
class Employee extends \yii\db\ActiveRecord
{
    /*************/
    public $first_name;
    public $second_name;
    public $first_surname;
    public $second_surname;
    public $gender;
    public $dni_type_id;
    public $dni;
    public $blood_group;
    public $marital_status_id;
    public $date_born;
    public $nationality_id;
    /****************/
    public $email_1;
    public $email_2;
    public $phone_number_personal;
    public $phone_number_mobile;
    public $phone_number_job;
    /**************/
    public $education_level_id;
    public $profession_id;
    /**************/
    public $country_id;
    public $state_id;
    public $city_id;
    public $address;
    public $zip_code;
    /**************/
    public $bank_id;
    public $account_type_id;
    public $number_account;
    public $routing_number;
    public $currency_id;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hr_employee';
    }

    public function genJsonEmployee() 
    {
        $array = [];
        $array['Profile'] = [
            'identification'=>'',
            'gender'=>'',
            'birthday'=>'',
            'nationality'=>'',
            'first_name'=>'',
            'second_name'=>'',
            'first_surname'=>'',
            'second_surname'=>'',
        ];
        $array['Contact']['Phone'] = [
            'personal'=>'',
            'mobile'=>'',
            'job'=>'',
            'ext'=>'',
        ];
        $array['Contact']['Messenger'] = [
            'skype'=>'',
            'hangout'=>'',
        ];
        $array['Contact']['Email'] = [
            
        ];
        $array['Contact']['Address'] = [
            'avenue'=>'',
            'street'=>'',
            'apartment'=>'',
            'home'=>'',
            'municipality'=>'',
            'zip'=>'',
        ];
        $array['Contact']['Social'] = [
            'facebook'=>'',
            'twitter'=>'',
            'youtube'=>'',
            'instagram'=>'',
            'google_plus'=>'',
            'linkedin'=>'',
            'foursquare'=>'',
            'blavin'=>'',
        ];
        return $array;
    }
    
    public function getJsonEmployee($post=NULL) 
    {
        $this->data = $array = $this->genJsonEmployee();
        if(!is_null($post) && count($post) > 0)
        {
            $array_values = [];
            foreach ($post as $key => $value) 
            {
                if($key == 'Profile'){
                    foreach ($value as $key_profile => $value_profile) {
                        if($key_profile == 'first_name' || $key_profile == 'first_surname')
                        {
                            $names = [0=>'',1=>''];
                            $_name_spacing = preg_replace ('/[ ]+/', ' ', $value_profile);
                            if (strpos($_name_spacing, ' ')){foreach (explode(' ', $_name_spacing) as $keyName => $valueName) {$names[$keyName] = ucfirst(strtolower($valueName));}}
                            else {$names[0] = ucfirst(strtolower($value_profile));}
                            if($key_profile == 'first_name')
                            {
                                $array_values[$key]['first_name'] = $names[0];
                                $array_values[$key]['second_name'] = $names[1];
                            }
                            elseif($key_profile == 'first_surname')
                            {
                                $array_values[$key]['first_surname'] = $names[0];
                                $array_values[$key]['second_surname'] = $names[1];
                            }
                        }
                        else{$array_values[$key][$key_profile] = $value_profile;}
                    }
                }else{$array_values[$key] = $value;}
                
            }
            $this->data = $this->setValueInArray($array, $array_values);
        }
        return $this->data;
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'integer'],
            [['employee_data'], 'string'],
            [['date_reg'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'employee_data' => 'Employee Data',
            'date_reg' => 'Date Reg',
        ];
    }
}
