<?php

namespace backend\modules\carForTaxi\models;

use Yii;

/**
 * This is the model class for table "renting_status".
 *
 * @property int $id
 * @property int $renting_status_value
 * @property string $renting_status_name
 *
 * @property Renting[] $rentings
 */
class RentingStatusRecord extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'renting_status';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['renting_status_value'], 'integer'],
            [['renting_status_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'renting_status_value' => 'Renting Status Value',
            'renting_status_name' => 'Renting Status Name',
        ];
    }

    /**
     * Gets query for [[Rentings]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRentings()
    {
        return $this->hasMany(Renting::class, ['statusValue' => 'renting_status_value']);
    }

}
