<?php

namespace backend\modules\hr_mod\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\hr_mod\models\Employee;

/**
 * EmployeeSearch represents the model behind the search form about `backend\modules\hr_mod\models\Employee`.
 */
class EmployeeSearch extends Employee
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['employee_data', 'date_reg'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Employee::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'date_reg' => $this->date_reg,
        ]);

        $query->andFilterWhere(['like', 'employee_data', $this->employee_data]);

        return $dataProvider;
    }
}
