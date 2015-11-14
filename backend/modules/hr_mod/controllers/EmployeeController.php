<?php

namespace backend\modules\hr_mod\controllers;

class EmployeeController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
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

}
