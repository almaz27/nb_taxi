<?php

namespace backend\modules\carForTaxi\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\VarDumper;

/**
 * This is the model class for table "nb_taxi_car".
 *
 * @property int $id
 * @property int $statusValue
 * @property int $classValue
 * @property int $carTypeId
 * @property int $pricePerDay
 * @property int $plateNumberId
 * @property int $mileage
 *
 * @property CarType $carType
 * @property CarClass $classValue0
 * @property CarPlateNumber $plateNumber
 * @property CarRentBisness $pricePerDay0
 * @property CarStatus $statusValue0
 */
class NbTaxiCarRecord extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'nb_taxi_car';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['statusValue', 'carTypeId', 'plateNumberId', 'mileage'], 'required'],
            [['statusValue', 'classValue', 'carTypeId', 'pricePerDay', 'plateNumberId', 'mileage'], 'integer'],
            [['classValue'], 'exist', 'skipOnError' => true, 'targetClass' => CarClassRecord::class, 'targetAttribute' => ['classValue' => 'class_value']],
            [['plateNumberId'], 'exist', 'skipOnError' => true, 'targetClass' => CarPlateNumberRecord::class, 'targetAttribute' => ['plateNumberId' => 'id']],
            [['pricePerDay'], 'exist', 'skipOnError' => true, 'targetClass' => CarRentBisnessRecord::class, 'targetAttribute' => ['pricePerDay' => 'pricePerDay']],
            [['statusValue'], 'exist', 'skipOnError' => true, 'targetClass' => CarStatusRecord::class, 'targetAttribute' => ['statusValue' => 'status_value']],
            [['carTypeId'], 'exist', 'skipOnError' => true, 'targetClass' => CarTypeRecord::class, 'targetAttribute' => ['carTypeId' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'statusValue' => 'Status Value',
            'classValue' => 'Class Value',
            'carTypeId' => 'Car Type',
            'pricePerDay' => 'Price Per Day',
            'plateNumber.fullPlateNumber' => 'Plate Number',
            'mileage' => 'Mileage',
            'carTypeName' => 'Car Type Name',
        ];
    }

    /**
     * Gets query for [[CarType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCarType()
    {
        return $this->hasOne(CarTypeRecord::class, ['id' => 'carTypeId']);
    }
    public function getCarTypeName(){
        return $this->carType != null ? $this->carType->fullname : null;
    }
    public function getCarTypeList()
    {
        $dropOptions = CarTypeRecord::find()->all();
        return ArrayHelper::map($dropOptions, 'id', 'fullname');
    }


    /**
     * Gets query for [[ClassValue0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCarClass()
    {
        return $this->hasOne(CarClassRecord::class, ['class_value' => 'classValue']);
    }
    public  function getCarClassName()
    {
        return $this->carClass != null ? $this->carClass->class_name : null;
    }
    public function getCarClassList(){
        $dropOptions = CarClassRecord::find()->asArray()->all();
        return ArrayHelper::map($dropOptions, 'class_value', 'class_name');
    }

    /**
     * Gets query for [[PlateNumber]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlateNumber()
    {
        return $this->hasOne(CarPlateNumberRecord::class, ['id' => 'plateNumberId']);
    }
    public function getPlateNumberFullName(){
        return $this->plateNumber != null ? $this->plateNumber->fullPlateNumber : null;
    }

    /**
     * Gets query for [[PricePerDay0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPricePerDay()
    {
        return $this->hasOne(CarRentBisnessRecord::class, ['pricePerDay' => 'pricePerDay']);
    }
    public function getPricePerDayList(){
        $dropOptions = CarRentBisnessRecord::find()->asArray()->all();
        return ArrayHelper::map($dropOptions, 'id', 'pricePerDay');
    }

    /**
     * Gets query for [[StatusValue0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStatusValue()
    {
        return $this->hasOne(CarStatusRecord::class, ['status_value' => 'statusValue']);
    }
    public function getStatusList(){
        $dropOptions = CarStatusRecord::find()->asArray()->all();
        return ArrayHelper::map($dropOptions, 'status_value', 'status_name');
    }
}
