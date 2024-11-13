<?php

namespace backend\modules\carForTaxi\models;

use Yii;
use backend\modules\carForTaxi\models\NbTaxiCarRecord;
/**
 * This is the model class for table "car_rent_bisness".
 *
 * @property int $id
 * @property int $pricePerDay
 * @property int $workDays
 *
 * @property NbTaxiCar[] $nbTaxiCars
 */
class CarRentBisnessRecord extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'car_rent_bisness';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pricePerDay'], 'required'],
            [['pricePerDay', 'workDays'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pricePerDay' => 'Price Per Day',
            'workDays' => 'Work Days',
        ];
    }

    /**
     * Gets query for [[NbTaxiCars]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNbTaxiCars()
    {
        return $this->hasMany(NbTaxiCarRecord::class, ['pricePerDay' => 'pricePerDay']);
    }
}
