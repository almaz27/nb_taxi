<?php

namespace backend\modules\carForTaxi\models;

use Yii;
use backend\modules\carForTaxi\models\NbTaxiCarRecord;
use yii\helpers\VarDumper;

/**
 * This is the model class for table "car_plate_number".
 *
 * @property int $id
 * @property string $serial_number
 * @property string $serial_number_secondary
 * @property int $registration_code
 * @property int $registration__region_code
 * @property string|null $country
 *
 * @property NbTaxiCar[] $nbTaxiCars
 */
class CarPlateNumberRecord extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'car_plate_number';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['serial_number', 'serial_number_secondary', 'registration_code', 'registration__region_code'], 'required'],
            [['registration_code', 'registration__region_code'], 'integer'],
            [['serial_number'], 'string', 'max' => 1],
            [['serial_number_secondary'], 'string', 'max' => 2],
            [['country'], 'string', 'max' => 5],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'serial_number' => 'Serial Number',
            'serial_number_secondary' => 'Serial Number Secondary',
            'registration_code' => 'Registration Code',
            'registration__region_code' => 'Registration  Region Code',
            'country' => 'Country',
        ];
    }

    /**
     * Gets query for [[NbTaxiCars]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTaxiCar()
    {
        return $this->hasOne(NbTaxiCarRecord::class, ['plateNumberId' => 'id']);
    }
    public function getTaxiCarFullName(){
        return $this->taxiCar->carTypeName;
    }
    public function getCarClassName(){
        return $this->taxiCar->carClassName;
    }
    public  function getFullPlateNumber()
    {
        return $this->serial_number.' '.$this->registration_code.' '.$this->serial_number_secondary.' '.$this->registration__region_code;
    }
    public function getString()
    {
        return $this->serial_number.' '.$this->registration_code.' '.$this->serial_number_secondary.' '.$this->registration__region_code;
    }
}
