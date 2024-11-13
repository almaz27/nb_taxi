<?php

namespace backend\modules\carForTaxi\models;

use Yii;
use backend\modules\carForTaxi\models\NbTaxiCarRecord;
/**
 * This is the model class for table "car_status".
 *
 * @property int $id
 * @property string $status_name
 * @property int $status_value
 *
 * @property NbTaxiCar[] $nbTaxiCars
 */
class CarStatusRecord extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'car_status';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status_name', 'status_value'], 'required'],
            [['status_value'], 'integer'],
            [['status_name'], 'string', 'max' => 15],
            [['status_name'], 'unique'],
            [['status_value'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'status_name' => 'Status Name',
            'status_value' => 'Status Value',
        ];
    }

    /**
     * Gets query for [[NbTaxiCars]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNbTaxiCars()
    {
        return $this->hasMany(NbTaxiCarRecord::class, ['statusValue' => 'status_value']);
    }
}
