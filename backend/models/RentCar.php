<?php

namespace backend\models;

use app\models\CarRecord;
use backend\modules\account\models\User;
use Yii;

/**
 * This is the model class for table "rent_car".
 *
 * @property int $id
 * @property int $user_id
 * @property int $car_id
 * @property string|null $rent_period
 *
 * @property CarRecord $car
 * @property User $user
 */
class RentCar extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rent_car';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'car_id'], 'required'],
            [['user_id', 'car_id'], 'integer'],
            [['rent_period'], 'safe'],
            [['car_id'], 'exist', 'skipOnError' => true, 'targetClass' => CarRecord::class, 'targetAttribute' => ['car_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
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
            'car_id' => 'Car ID',
            'rent_period' => 'Rent Period',
        ];
    }

    /**
     * Gets query for [[Car]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCar()
    {
        return $this->hasOne(CarRecord::class, ['id' => 'car_id']);
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
}
