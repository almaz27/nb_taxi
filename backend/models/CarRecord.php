<?php

namespace backend\models;

use backend\models\PicturesRecord;
use Yii;

/**
 * This is the model class for table "car".
 *
 * @property int $id
 * @property int $year
 * @property string $make
 * @property string $model
 * @property int $pricePerDay
 * @property int $workday
 * @property int $mileage
 * @property string $plateNumber
 * @property string|null $class
 */
class CarRecord extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'car';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['year', 'pricePerDay', 'workday', 'mileage'], 'integer'],
            [['class'], 'string'],
            [['make', 'model', 'plateNumber'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'year' => 'Year',
            'make' => 'Make',
            'model' => 'Model',
            'pricePerDay' => 'Price Per Day',
            'workday' => 'Workday',
            'mileage' => 'Mileage',
            'plateNumber' => 'Plate Number',
            'class' => 'Class',
            'name'=>$this->getName()
        ];
    }
    public function getName(): string
    {
        return $this->make.' '.$this->model;
    }
    public function getPictures()
    {
            return $this->hasMany(PicturesRecord::class, ['car_id'=>'id']);
    }
}
