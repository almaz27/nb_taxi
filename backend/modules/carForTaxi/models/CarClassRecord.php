<?php

namespace backend\modules\carForTaxi\models;

use Yii;
use backend\modules\carForTaxi\models\NbTaxiCarRecord;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "car_class".
 *
 * @property int $id
 * @property string $class_name
 * @property int $class_value
 *
 * @property NbTaxiCar[] $nbTaxiCars
 */
class CarClassRecord extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'car_class';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['class_value'], 'integer'],
            [['class_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'class_name' => 'Class Name',
            'class_value' => 'Class Value',
        ];
    }

    /**
     * Gets query for [[NbTaxiCars]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNbTaxiCars()
    {
        return $this->hasMany(NbTaxiCarRecord::class, ['classValue' => 'class_value']);
    }
    public function getCarClassList()
    {
        $dropOptions = CarClassRecord::find()->asArray()->all();
        return ArrayHelper::map($dropOptions, 'class_value', 'class_name');
    }


}
