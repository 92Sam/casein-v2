<?php
namespace backend\modules\hr_mod\controllers;

use Yii;
use yii\db\Command;
use common\modules\sys_timezone\models\Country;
use common\modules\sys_timezone\models\Currency;
use backend\modules\hr_mod\models\Person;
use backend\modules\hr_mod\models\Professions;
use backend\modules\med_mod\models\BloodGroup;



class PersonController extends \yii\web\Controller
{
    public function actionIndex()
    {
    	try {

	    	$personData = new Person;
	    	$currency = new Currency;
	    	$country = new Country;
        $profession = new Professions;
	    	$bloodGroup = new BloodGroup;

       		if($personData->load(Yii::$app->request->post())){
              $post = Yii::$app->request->post();  

              $jsonValue = $personData->genJsonPerson();
              $jsonValue['profile_data']['first_name'] = $post['Person']['first_name'];
              $jsonValue['profile_data']['second_name'] = $post['Person']['second_name'];
              $jsonValue['profile_data']['first_surname'] = $post['Person']['first_surname'];
              $jsonValue['profile_data']['second_surname'] = $post['Person']['second_surname'];
              $jsonValue['profile_data']['date_born'] = $post['Person']['date_born'];
              $jsonValue['profile_data']['gender'] = $post['Person']['gender'];
              $jsonValue['profile_data']['marital_status_id'] = $post['Person']['marital_status_id'];
              $jsonValue['profile_data']['nationality_country_id'] = $post['Person']['nationality_country_id'];
              $jsonValue['profile_data']['blood_group_id'] = $post['Person']['blood_group_id'];
              $jsonValue['profile_data']['dni_type_id'] = $post['Person']['dni_type_id'];
              $jsonValue['profile_data']['dni'] = $post['Person']['dni'];
              /***********************************/
              $jsonValue['geograhpic_data']['address']['country_id'] = $post['Person']['country_id'];
              $jsonValue['geograhpic_data']['address']['state_id'] = $post['Person']['state_id'];
              $jsonValue['geograhpic_data']['address']['city_id'] = $post['Person']['city_id'];
              $jsonValue['geograhpic_data']['address']['address'] = $post['Person']['address'];
              /***********************************/
              $jsonValue['technical_data']['education_level_id'] = $post['Person']['education_level_id'];
              /***********************************/
              $jsonValue['contact_data']['phone']['mobile'] = $post['Person']['phone_number_personal'];
              /************* Arreglos dentro de otros *********/
              array_push($jsonValue['technical_data']['profession_id'], $post['Person']['profession_id']);
              array_push($jsonValue['contact_data']['email'], $post['Person']['email'],$post['Person']['email_2']);

              /* BVariables de Entorno Modelo*/ 
              $personData->person_data = json_encode($jsonValue);
              $personData->date_reg = date('Y-m-d h:m:s');


            if ($personData->validate()) {

              if($personData->save(false)){
              	echo $personData->id;
              }else{
              	echo date('Y-m-d');
              }
            } else {
                // validation failed: $errors is an array containing error messages
                $errors = $personData->errors;
            }
            
          }

        } catch (CException $ex) {
          var_dump($ex);
          Yii::app()->end();
        }

        return $this->render('index',
			       [
	            'personData' => $personData,
	            'currencyList' => $currency->getCurrencyList(),
	            'countryList' => $country->getCountryList(),
              'professionList' => $profession->getProfessionList(),
	            'bloodGroup' => $bloodGroup->getBloodGroupList()
            ]
    	   );
    }

    public function actionIndex2()
    {
        $personData = new Person;
        return $this->render('index2',
            [
                'personData' => $personData
            ]
        );
    }

    public function actionAmcharts()
    {
        $personData = new Person;
        $connection = Yii::$app->getDb();
        $sql = "SELECT  json_array_elements(sickness_data)->>'type_cie_id' as type_cie_id,
        json_array_elements(sickness_data)->>'sickness_id' as sickness_id,
        to_char(date_evaluation, 'YYYY-MM') as evaluation_date,
        COUNT(*) as count_sickness_id
        FROM amcharts_medic_evaluation
        WHERE date_evaluation BETWEEN '2015-01-01' AND '2016-12-31'
        GROUP BY type_cie_id, sickness_id, evaluation_date
        ORDER BY evaluation_date ASC";
        $data = $connection->createCommand($sql)->queryAll();

        return $this->render('amcharts',
            [
                'personData' => $personData,
                'queryDataAmchart' => json_encode($data)
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

    public function actionCreate()
    {
      echo "string";
        //$model = new Bank();
        //var_dump(Yii::$app->request->post()); exit();
        // if ($model->load(Yii::$app->request->post()) && $model->save()) {
        //     return $this->redirect(['view', 'id' => $model->id]);
        // } else {
        //     return $this->render('create', [
        //         'model' => $model,
        //     ]);
        // }
    }

    public function actionPersonajax()
    {
      //$data2 = '{"draw": 1,"recordsTotal": 2,"recordsFiltered": 2,"data": [["Airi","Satou","Accountant","Tokyo","28th Nov 08","$162,700"],["Angelica","Ramos","Chief Executive Officer (CEO)","London","9th Oct 09","$1,200,000"]]}';
      $personData = new Person;
      $dataPerson = $personData->find()->All();
      $dataPersonCount = count($dataPerson);

      $arrayDataTableJson = [];
      foreach ($dataPerson as $key => $value) {
        $jsonPersonData = json_decode($value->person_data);
        $arrayDataTableJson[$key] = [
                                        $jsonPersonData->profile_data->first_name . " " . $jsonPersonData->profile_data->second_name,
                                        $jsonPersonData->profile_data->first_surname . " " . $jsonPersonData->profile_data->second_surname,
                                        $jsonPersonData->profile_data->gender,
                                        $jsonPersonData->profile_data->dni
                                    ];
      }
      
      $arrayDataTable = [
              "draw" => 2,
              "recordsTotal" => $dataPersonCount,
              "recordsFiltered" => $dataPersonCount, 
              "data" => $arrayDataTableJson
      ];

      return json_encode($arrayDataTable);
    }

}
