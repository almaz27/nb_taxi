<?php

namespace backend\modules\carForTaxi\models;

use Yii;
use common\models\User;
use yii\helpers\VarDumper;

/**
 * This is the model class for table "renting".
 *
 * @property int $id
 * @property int $user_id
 * @property int $car_id
 * @property int|null $contract_time
 * @property int|null $statusValue
 * @property string $created_at
 * @property string|null $run_at
 * @property string|null $returned_at
 *
 * @property NbTaxiCarRecord $car
 * @property RentingStatusRecord $statusValue0
 * @property User $user
 */
class RentingRecord extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'renting';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'car_id'], 'required'],
            [['user_id', 'car_id', 'contract_time', 'statusValue'], 'integer'],
            [['created_at', 'run_at', 'returned_at'], 'safe'],
            [['car_id'], 'exist', 'skipOnError' => true, 'targetClass' => NbTaxiCarRecord::class, 'targetAttribute' => ['car_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
            [['statusValue'], 'exist', 'skipOnError' => true, 'targetClass' => RentingStatusRecord::class, 'targetAttribute' => ['statusValue' => 'renting_status_value']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'carName' => 'Car ID',
            'contract_time' => 'Contract Time',
            'statusName' => 'Status',
            'created_at' => 'Created At',
            'run_at' => 'Run At',
            'returned_at' => 'Returned At',
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
    public function getCarName(){
        return $this->car->getCarTypeName();
    }
    public function getCarPlateNumber(){
        return $this->car->getPlateNumber();
    }

    /**
     * Gets query for [[StatusValue0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRentingStatusValue()
    {
        return $this->hasOne(RentingStatusRecord::class, ['renting_status_value' => 'statusValue']);
    }
    public function getStatusName()
    {
        return $this->rentingStatusValue->renting_status_name;
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
    public function getUserName(){
        return $this->user->username;
    }

}
