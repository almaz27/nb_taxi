<?php

namespace backend\modules\carForTaxi\models;

use Yii;
use backend\modules\carForTaxi\models\NbTaxiCarRecord;
/**
 * This is the model class for table "car_type".
 *
 * @property int $id
 * @property string $make
 * @property string $model
 * @property int $year
 *
 * @property NbTaxiCar[] $nbTaxiCars
 */
class CarTypeRecord extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'car_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['make', 'model', 'year'], 'required'],
            [['year'], 'integer'],
            [['make', 'model'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'make' => 'Make',
            'model' => 'Model',
            'year' => 'Year',
            'fullName'=>'Full Name',
        ];
    }

    /**
     * Gets query for [[NbTaxiCars]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNbTaxiCars()
    {
        return $this->hasMany(NbTaxiCarRecord::class, ['carTypeId' => 'id']);
    }
    public function getFullName(){
        return $this->make.' '.$this->model.' '.$this->year.' y';
    }
}
