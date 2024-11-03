<?php

namespace backend\models;

use Yii;
use common\models\User;

/**
 * This is the model class for table "user_type".
 *
 * @property int $id
 * @property string $user_type_name
 * @property int $user_type_value
 *
 * @property User[] $users
 */
class UserTypeRecord extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_type_name', 'user_type_value'], 'required'],
            [['user_type_value'], 'integer'],
            [['user_type_name'], 'string', 'max' => 45],
            [['user_type_value'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_type_name' => 'User Type Name',
            'user_type_value' => 'User Type Value',
        ];
    }

    /**
     * Gets query for [[Users]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::class, ['user_type_id' => 'user_type_value']);
    }
}
