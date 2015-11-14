<?php

namespace common\components;
 
use Yii;
use yii\base\Component;
use yii\helpers\Html;
use yii\helpers\Json;

class JsonManager extends Component
{

    private $data;
    
    public function getJsonValue() 
    {
        $count = count($this->data);
        $array_json = [];
        if($count > 0) 
        {
            foreach ($this->data as $key => $value) 
            {
                $label = strtolower($key);
                $array_json[$label] = $value;
            }
        }
        return Json::encode($array_json);
    }
    
    public function setJsonValue($post) 
    {
        if(!is_null($post) && count($post) > 0)
        {
            foreach ($post as $key => $value) 
            {
                $this->data[$key] = $value;
            }
        }
    }
    
    public function setValueInArray($array_base, $array_values) 
    {
        if(is_array($array_base) && is_array($array_values)){return array_replace_recursive($array_base,$array_values);}
        else
        {
            if(!is_array($array_base) && !is_array($array_values)){return 'Ambos parametros deben ser array.';}
            else{
                if(!is_array($array_base) || !is_array($array_values))
                {
                    if(!is_array($array_base)){return 'El primer parametro no es un array.';}
                    elseif(!is_array($array_values)){return 'El segundo parametro no es un array.';}
                }
            }
        }
    }
    
    public function setLowerKeyArray($array) 
    {
        return array_change_key_case($array, CASE_LOWER);
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

    public function genJsonFieldTipification($post) 
    {
        $arrayTipification = [];
        $arrayTipification[0] = [
            'field_name'=>'',
            'field_type'=>'',
            'field_values'=>'',
        ];

        if(!is_null($post) && count($post) > 0)
        {
            foreach ($post as $key => $value) 
            {
                $arrayTipification[$key]['field_name'] = $value['field_name'];
                $arrayTipification[$key]['field_type'] = $value['field_type'];
                $arrayTipification[$key]['field_values'] = $value['field_values'];
            }
        }
        return Json::encode($arrayTipification);
    }
    
    public function genJsonFieldContactPerson($post) 
    {
        $this->data = [
            'contact_person'=>'',
            'contact_method'=>'',
            'contact_device'=>'',
        ];

        $this->setJsonValue($post);
        return $this->getJsonValue();
    }

    public function genJsonCompanyModule($post) 
    {
        $arrayModule = [];
        $arrayModule = [
            'crm'=>[
                'active'=>'',
            ],
            'its'=>[
                'active'=>'',
            ],
            'hr'=>[
                'active'=>'',
            ],
        ];
        
        if(!is_null($post) && count($post) > 0)
        {
            foreach ($post as $key => $value) 
            {
                $arrayModule[$key]['active'] = $value['active'];
            }
        }
        return Json::encode($arrayModule);
    }
    
    public function genJsonFunctionality($post) 
    {
        $arrayModule = $arraySubmodule = [];
        $arrayModule = [
            'crm'=>[
                'active'=>'',
                'crm_customer'=>[
                    'active'=>''
                ],
                'crm_product'=>[
                    'active'=>''
                ],
                'crm_oportunity'=>[
                    'active'=>''
                ],
                'crm_phone_calls'=>[
                    'active'=>''
                ],
                'crm_meeting'=>[
                    'active'=>''
                ],
            ],
            'its'=>[
                'active'=>'',
                'its_ticket'=>[
                    'active'=>''
                ],
                'its_data_entry'=>[
                    'active'=>''
                ],
            ],
            'hr'=>[
                'active'=>'',
                []
            ],
        ];
        
        if(!is_null($post) && count($post) > 0)
        {
            foreach ($post as $module => $values) 
            {
                $arrayModule[$module]['active'] = $values['active'];
                foreach ($values as $function => $value) 
                {
                    if($function != 'active')
                    {
                        $arrayModule[$module][$function]['active'] = $value['active'];
                    }
                }
            }
        }
        return Json::encode($arrayModule);
    }
    
    public function generateJsonAccess()
    {
        $modules = \common\modules\sys_account_manager\models\Module::find()->all();
        $array = [];
        $array_modules =[];
        $array_json = [];
        foreach ($modules as $module) {
            $array_module['id'] = $module->id;
            $array_module['name'] = $module->name;
            $array_module['active'] = $module->active;
            $array_module['access'] = false;
            $packages = $module->getPackages()->all();
            $array_packages = [];
            foreach ($packages as $package){
                $array_package['id'] = $package->id;
                $array_package['name'] = $package->name;
                $array_package['access'] = false;
                
                $tasks = $package->getTasks()->all();
                $array_tasks = [];
                foreach ($tasks as $task) {
                    $array_task['id'] = $task->id;
                    $array_task['name'] = $task->name;
                    $array_task['access'] = false;
                    $array_tasks[] = $array_task;
                }
                $array_package['tasks'] = $array_tasks;
                $array_packages[] = $array_package;
                
            }
            $array_module['packages'] = $array_packages;
            
            $array_json[] = $array_module;  
        }
        $array['modules'] = $array_json;
        
        return json_encode($array);
        
    }
}
