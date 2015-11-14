<?php

namespace common\modules\sys_timezone\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\modules\sys_timezone\models\Country;

/**
 * CountrySearch represents the model behind the search form about `common\modules\sys_timezone\models\Country`.
 */
class CountrySearch extends Country
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'indep_year', 'population', 'capital'], 'integer'],
            [['code', 'name', 'continent', 'region', 'local_name', 'goverment_form', 'head_state', 'iso_code'], 'safe'],
            [['surface_area', 'life_expectancy', 'gnp', 'gnpold'], 'number'],
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
        $query = Country::find();

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
            'surface_area' => $this->surface_area,
            'indep_year' => $this->indep_year,
            'population' => $this->population,
            'life_expectancy' => $this->life_expectancy,
            'gnp' => $this->gnp,
            'gnpold' => $this->gnpold,
            'capital' => $this->capital,
        ]);

        $query->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'continent', $this->continent])
            ->andFilterWhere(['like', 'region', $this->region])
            ->andFilterWhere(['like', 'local_name', $this->local_name])
            ->andFilterWhere(['like', 'goverment_form', $this->goverment_form])
            ->andFilterWhere(['like', 'head_state', $this->head_state])
            ->andFilterWhere(['like', 'iso_code', $this->iso_code]);

        return $dataProvider;
    }
}
