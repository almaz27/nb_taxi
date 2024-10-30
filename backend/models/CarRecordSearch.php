<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CarRecord;

/**
 * CarRecordSearch represents the model behind the search form of `app\models\CarRecord`.
 */
class CarRecordSearch extends CarRecord
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'year', 'pricePerDay', 'workday', 'mileage'], 'integer'],
            [['make', 'model', 'plateNumber', 'class'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = CarRecord::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'year' => $this->year,
            'pricePerDay' => $this->pricePerDay,
            'workday' => $this->workday,
            'mileage' => $this->mileage,
        ]);

        $query->andFilterWhere(['like', 'make', $this->make])
            ->andFilterWhere(['like', 'model', $this->model])
            ->andFilterWhere(['like', 'plateNumber', $this->plateNumber])
            ->andFilterWhere(['like', 'class', $this->class]);

        return $dataProvider;
    }
}
