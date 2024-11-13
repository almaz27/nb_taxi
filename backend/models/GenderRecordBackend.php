<?php

namespace backend\models;

use Yii;
use backend\models\ProfileBackendRecord;
/**
 * This is the model class for table "gender".
 *
 * @property int $id
 * @property string $gender_name
 *
 * @property ProfileBackendRecord[] $profiles
 */
class GenderRecordBackend extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gender';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['gender_name'], 'required'],
            [['gender_name'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'gender_name' => 'Gender',
        ];
    }

    /**
     * Gets query for [[Profiles]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProfiles()
    {
        return $this->hasMany(ProfileBackendRecord::class, ['gender_id' => 'id']);
    }
}
