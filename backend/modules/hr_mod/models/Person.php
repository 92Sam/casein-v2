<?php

namespace backend\modules\hr_mod\models;

use Yii;

/**
 * This is the model class for table "hr_person".
 *
 * @property integer $id
 * @property string $person_data
 * @property string $date_reg
 */
class Person extends \yii\db\ActiveRecord
{
    public $first_name;
    public $second_name;
    public $first_surname;
    public $second_surname;
    public $gender;
    public $dni_type_id;
    public $dni;
    public $blood_group_id;
    public $marital_status_id;
    public $date_born;
    public $nationality_id;
    /****************/
    public $email;
    public $email_2;
    public $phone_number_personal;
    public $phone_number_mobile;
    public $phone_number_job;
    /**************/
    public $education_level_id;
    public $profession_id;
    /**************/
    public $nationality_country_id;
    public $country_id;
    public $state_id;
    public $city_id;
    public $address;
    public $zip_code;
    /**************/
    public $bank_id;
    public $account_type_id;
    public $account_number;
    public $routing_number;
    public $iban_number;
    public $swift_number;
    public $currency_id;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hr_person';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['first_name','first_surname','date_born','dni','dni_type_id','marital_status_id'], 'required'],
            [['phone_number_personal','dni'], 'integer'],
            [['person_data'], 'string'],
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
            'person_data' => 'Person Data',
            'date_reg' => 'Date Reg',
        ];
    }

    /**
     * @inheritdoc
     */
    public function genJsonPerson() 
        {
            $array = [];
            $array['profile_data'] = [
                'blood_group_id'=>'',
                'nationality_country_id'=>'',
                'marital_status_id'=>'',
                'dni_type_id'=>'',
                'dni'=>'',
                'gender'=>'',
                'date_born'=>'',
                'first_name'=>'',
                'second_name'=>'',
                'first_surname'=>'',
                'second_surname'=>'',
            ];
            $array['contact_data']['phone'] = [
                    'personal'=>'',
                    'mobile'=>'',
                    'job'=>'',
                    'ext'=>''
            ];
            $array['contact_data']['messenger'] = [
                'skype'=>'',
                'hangout'=>'',
            ];
            $array['contact_data']['email'] = [
                
            ];
            $array['contact_data']['social'] = [
                'facebook'=>'',
                'twitter'=>'',
                'youtube'=>'',
                'instagram'=>'',
                'google_plus'=>'',
                'linkedin'=>'',
                'foursquare'=>'',
                'blavin'=>'',
                'steam'=>'',
            ];
            $array['geograhpic_data']['address'] = [
                'country_id'=>'',
                'state_id'=>'',
                'city_id'=>'',
                'avenue'=>'',
                'street'=>'',
                'apartment'=>'',
                'home'=>'',
                'municipality'=>'',
                'zip'=>'',
                'postal_code'=>'',
            ];
            $array['technical_data'] = [
                'profession_id'=>[],
                'education_level_id'=>'',
            ];
            $array['financial_data']['bank_data'] = [
                [
                    'bank_id'=>'',
                    'account_type_id'=>'',
                    'account_number'=>'',
                    'routing_number'=>'',
                    'iban_number'=>'',
                    'swift_number'=>'',
                ]
            ];
        return $array;
    }

    // public function genJsonPerson2() 
    //     {
    //         $array = [];
    //         $array['Profile'] = [
    //             'identification'=>'',
    //             'gender'=>'',
    //             'birthday'=>'',
    //             'nationality'=>'',
    //             'first_name'=>'',
    //             'second_name'=>'',
    //             'first_surname'=>'',
    //             'second_surname'=>'',
    //         ];
    //         $array['Contact']['Phone'] = [
    //             'personal'=>'',
    //             'mobile'=>'',
    //             'job'=>'',
    //             'ext'=>'',
    //         ];
    //         $array['Contact']['Messenger'] = [
    //             'skype'=>'',
    //             'hangout'=>'',
    //         ];
    //         $array['Contact']['Email'] = [
                
    //         ];
    //         $array['Contact']['Address'] = [
    //             'avenue'=>'',
    //             'street'=>'',
    //             'apartment'=>'',
    //             'home'=>'',
    //             'municipality'=>'',
    //             'zip'=>'',
    //         ];
    //         $array['Contact']['Social'] = [
    //             'facebook'=>'',
    //             'twitter'=>'',
    //             'youtube'=>'',
    //             'instagram'=>'',
    //             'google_plus'=>'',
    //             'linkedin'=>'',
    //             'foursquare'=>'',
    //             'blavin'=>'',
    //         ];
    //     return $array;
    // }
    
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

    
}
