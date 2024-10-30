<?php

namespace app\models;

use Yii;
use app\models\CarRecord;

/**
 * This is the model class for table "pictures".
 *
 * @property int $id
 * @property int $car_id
 * @property string $image
 * @property string $created_at
 *
 * @property CarRecord $car
 */
class PicturesRecord extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pictures';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['car_id', 'image'], 'required'],
            [['car_id'], 'integer'],
            [['created_at'], 'safe'],
            [['image'], 'file', 'extensions' =>'png, jpeg','skipOnEmpty' => false, 'maxFiles' => 5],
            [['car_id'], 'exist', 'skipOnError' => true, 'targetClass' => CarRecord::class, 'targetAttribute' => ['car_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'car_id' => 'Car ID',
            'image' => 'Image',
            'created_at' => 'Created At',
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
}
