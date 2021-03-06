<?php

namespace common\modules\sys_timezone\controllers;

use Yii;
use common\modules\sys_timezone\models\Country;
use common\modules\sys_timezone\models\State;
use common\modules\sys_timezone\models\City;
use yii\helpers\Json;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;

class StateController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionStateslist($idCountry)
    {	
    	if($idCountry != NULL){
	        $sql = "SELECT id, name FROM sys_state WHERE country_id = $idCountry ORDER BY name ASC";
	        $model = State::findBySql($sql);
	        $countStates = $model->count();
	        if($countStates > 0){$model = $model->all();}else{$model = NULL;}
        }else{
        	$model = NULL;
        }
        return $this->renderAjax('listbycountry', [
            'model' => $model,
        ]);
    }

    public function actionStateslistbycountryid($countryId)
    {   
        if($countryId != NULL){
            $sql = "SELECT id, name FROM sys_state WHERE country_id = $countryId ORDER BY name ASC";
            $model = State::findBySql($sql);
            $countStates = $model->count();
            
            if($countStates > 0){
                $model = $model->all();
                $data = [];

                foreach ($model as $key => $value) {
                    $data[$key] = [
                        'id' => $value['id'],
                        'name' => $value['name']
                    ];
                    //var_dump($value['id']);
                }
                
            }else{$model = NULL;}
        }else{
            $model = NULL;
        }
        return json_encode($data);
    }

}
