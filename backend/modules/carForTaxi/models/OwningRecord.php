<?php

namespace backend\modules\carForTaxi\models;

use Yii;
use common\models\User;
use yii\helpers\VarDumper;

/**
 * This is the model class for table "owning".
 *
 * @property int $id
 * @property int $owner_id
 * @property int $car_id
 *
 * @property NbTaxiCarRecord $car
 * @property User $owner
 */
class OwningRecord extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'owning';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['owner_id', 'car_id'], 'required'],
            [['owner_id', 'car_id'], 'integer'],
            [['car_id'], 'exist', 'skipOnError' => true, 'targetClass' => NbTaxiCarRecord::class, 'targetAttribute' => ['car_id' => 'id']],
            [['owner_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['owner_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'owner_id' => 'Owner ID',
            'car_id' => 'Car ID',
            'car_type' => 'Car Details',
            'car_plate_number' => 'Car Plate Number',
        ];
    }

    /**
     * Gets query for [[Car]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCar()
    {
        return $this->hasOne(NbTaxiCarRecord::class, ['id' => 'car_id']);
    }
    public function getCarType()
    {
        return $this->car->carTypeName;
    }
    public function getCarPlateNumber(){
        return $this->car->plateNumber->fullPlateNumber;
    }

    public function getRentingDriver(){
        return RentingRecord::findOne(['car_id' => $this->car_id]);
    }
    public function getDriverUsername()
    {
        $result = $this->rentingDriver;
        return $result ? $result->username : 'NO RENTING';


    }

    /**
     * Gets query for [[Owner]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOwner()
    {
        return $this->hasOne(User::class, ['id' => 'owner_id']);
    }
}
