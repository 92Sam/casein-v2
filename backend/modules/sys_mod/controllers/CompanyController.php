<?php

namespace backend\modules\sys_mod\controllers;

use Yii;

use common\modules\sys_timezone\models\Country;
use common\modules\sys_timezone\models\Currency;
use backend\modules\sys_mod\models\CompanyConsortium;
use backend\modules\sys_mod\models\CompanyGround;

class CompanyController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionConsortium()
    {
    	$companyConsortium = new CompanyConsortium;
    	$currency = new Currency;
    	$country = new Country;
    	$countryList = $country->getCountryList();
        $currencyList = $currency->getCurrencyList();
    	$companyGroundList = CompanyGround::getCompanyGroundList();
    	//var_dump($countryList); exit();

        return $this->render('consortium', 
        	[
            'companyConsortium' => $companyConsortium,
            'currencyList' => $currencyList,
            'country' => $country,
            'countryList' => $countryList,
            'companyGroundList' => $companyGroundList
            ]
        );
    }

}
