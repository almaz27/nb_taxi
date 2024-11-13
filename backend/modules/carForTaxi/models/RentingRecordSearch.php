<?php

namespace backend\modules\carForTaxi\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\carForTaxi\models\RentingRecord;

/**
 * RentingRecordSearch represents the model behind the search form about `backend\modules\carForTaxi\models\RentingRecord`.
 */
class RentingRecordSearch extends RentingRecord
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'car_id', 'contract_time', 'statusValue'], 'integer'],
            [['created_at', 'run_at', 'returned_at'], 'safe'],
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
        $query = RentingRecord::find();

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
            'user_id' => $this->user_id,
            'car_id' => $this->car_id,
            'contract_time' => $this->contract_time,
            'statusValue' => $this->statusValue,
            'created_at' => $this->created_at,
            'run_at' => $this->run_at,
            'returned_at' => $this->returned_at,
        ]);

        return $dataProvider;
    }
}
