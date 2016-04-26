<?php

namespace backend\modules\hr_mod\controllers;

use Yii;
use common\modules\sys_timezone\models\Country;
use common\modules\sys_timezone\models\Currency;
use backend\modules\hr_mod\models\Employee;

class EmployeeController extends \yii\web\Controller
{
    public function actionIndex()
    {
    	$personData = new Employee;
    	$currency = new Currency;
    	$country = new Country;

        return $this->render('index',
			[
	            'personData' => $personData,
	            'currencyList' => $currency->getCurrencyList(),
	            'countryList' => $country->getCountryList()
            ]
    	);
    }

    public function calculateAgeByDate($date_born){
		list($age,$month,$day) = explode("-",$date_born);
		$age_difference  = date("Y") - $age;
		$month_difference = date("m") - $month;
		$day_difference   = date("d") - $day;
		if ($age_difference < 0 || $month_difference < 0)
			$age_difference--;
		
		return $age_difference;
		// Modo de uso
		//echo calculateAgeByDate('1979-10-15'); // Imprimirá: 36
	}

    // public function actionCreate()
    // {
    //     $model = new Bank();
    //     var_dump(Yii::$app->request->post()); exit();
    //     if ($model->load(Yii::$app->request->post()) && $model->save()) {
    //         return $this->redirect(['view', 'id' => $model->id]);
    //     } else {
    //         return $this->render('create', [
    //             'model' => $model,
    //         ]);
    //     }
    // }

}
