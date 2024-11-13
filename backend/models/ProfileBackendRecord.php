<?php

namespace backend\models;

use backend\models\GenderRecordBackend;
use Yii;
use common\models\User;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\VarDumper;


/**
 * This is the model class for table "profile".
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $birthday
 * @property int $gender_id
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property GenderRecordBackend $gender
 * @property User $user
 */
class ProfileBackendRecord extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'profile';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'gender_id'], 'required'],
            [['user_id', 'gender_id'], 'integer'],
            [['first_name', 'last_name'], 'string'],
            [['birthday', 'created_at', 'updated_at'], 'safe'],
            [['gender_id'], 'exist', 'skipOnError' => true, 'targetClass' => GenderRecordBackend::class, 'targetAttribute' => ['gender_id' => 'id']],
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
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'birthday' => 'Birthday',
            'gender.gender_name' => 'Gender',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'userLink'=>Yii::t('app', 'User'),
        ];
    }
public function behaviors()
{
    return [

        'timestamp' => [
            'class' => 'yii\behaviors\TimestampBehavior',
            'attributes' => [
                ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
            ],
            'value' => new Expression('NOW()')
        ],

    ];

}

public function beforeValidate()
{

if($this->birthday !== null){
    $new_date_format = date('Y-m-d',strtotime($this->birthday));
    $this->birthday = $new_date_format;
}

    return parent::beforeValidate();
}
    /**
     * Gets query for [[Gender]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGender()
    {
        return $this->hasOne(GenderRecordBackend::class, ['id' => 'gender_id']);
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
    public function getUserName()
    {
        return $this->user->username;
    }
    public function getUserId()
    {
        return $this->user->id;
    }
    public function getUserLink()
    {
        $url = Url::to(['user-backend/view', 'id' => $this->UserId]);
        $options = [];
        return Html::a($this->getUserName(), $url, $options);
    }

    public static function getGenderList(){
        $dropOptions = GenderRecordBackend::find()->asArray()->all();
        return ArrayHelper::map($dropOptions,'id','gender_name');
    }
}
