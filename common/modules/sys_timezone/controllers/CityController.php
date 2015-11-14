<?php

namespace common\modules\sys_timezone\controllers;

use common\modules\sys_timezone\models\City;

class CityController extends \yii\web\Controller
{
    public function actionListbystate($idState)
    {

        $sql = "SELECT id, name FROM sys_city WHERE state_id = $idState ORDER BY name ASC";
        $model = City::findBySql($sql);
        $countCities = $model->count();
        if($countCities > 0){$model = $model->all();}else{$model = NULL;}
        
        return $this->renderAjax('listbystate', [
            'model' => $model,
        ]);
    
        return $this->render('listbystate');
    }

}
