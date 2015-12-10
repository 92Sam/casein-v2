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
        try{

        	$companyConsortium = new CompanyConsortium;
        	$currency = new Currency;
        	$country = new Country;
            $companyGround = new CompanyGround;
        	$countryList = $country->getCountryList();
            $currencyList = $currency->getCurrencyList();
        	$companyGroundList = $companyGround->getCompanyGroundList();
        	//var_dump($countryList); exit();

        
           // if(Yii::$app->request->post())
           if($companyConsortium->load(Yii::$app->request->post()))
            {
              $post = Yii::$app->request->post();  
              // $transaction = Yii::$app->db->beginTransaction();
              //var_dump($post); exit();
              var_dump($post['CompanyConsortium']['name']);

            }else{
                echo "error";
            }

        } catch (CException $ex) {
          var_dump($ex);
          Yii::app()->end();
        }


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

    // public function actionCreate()
    // {
        // $model = new Bank();
        //var_dump(Yii::$app->request->post()); exit();
        // if ($model->load(Yii::$app->request->post()) && $model->save()) {
        //     return $this->redirect(['view', 'id' => $model->id]);
        // } else {
        //     return $this->render('create', [
        //         'model' => $model,
        //     ]);
        // }
    // }

     public function actionData()
    {
        return $this->render('index');
    }

}
