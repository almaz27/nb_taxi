<?php

namespace frontend\models;

use app\models\GenderRecord;
use Yii;
use common\models\User;
use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;

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
 * @property GenderRecord $gender
 * @property User $user
 */
class ProfileRecord extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'profile';
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
            ]
        ];

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
//            [['gender_id'], 'exist', 'skipOnError' => true, 'targetClass' => GenderRecord::class, 'targetAttribute' => ['gender_id' => 'id']],
            [['gender_id'],'in', 'range'=>array_keys($this->getGenderList())],
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
            'gender_id' => 'Gender ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'genderName' => Yii::t('app', 'Gender'),
            'userLink' => Yii::t('app', 'User'),
            'profileIdLink' => Yii::t('app', 'Profile'),
        ];
    }

    /**
     * Gets query for [[Gender]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGender()
    {
        return $this->hasOne(GenderRecord::class, ['id' => 'gender_id']);
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
    /**
     * @get Username
     */
    public function getUsername()
    {
        return $this->user->username;
    }
    /**
     * @getUserId
     */
    public function getUserId()
    {
        return $this->user? $this->user->id : 'none';
    }
    /**
     * @getUserLink
     */

    public function getUserLink()
    {
        $url = Url::to(['/user/view', 'id' => $this->UserId]);
        $options = [];
        return Html::a($this->getUsername(), $url, $options);
    }
    /**
     * @getProfileLink
     */
    public function getProfileLink(){
        $url = Url::to(['/profile/view', 'id' => $this->id]);
        $options = [];
        return Html::a($this->id, $url, $options);
    }
    /**
     * get list of genders for dropdown
     */
    public static function getGenderList(){
        $dropdown = GenderRecord::find()->asArray()->all();
        return ArrayHelper::map($dropdown, 'id', 'gender_name');
    }
    /**
     * uses magic getGender on return statement
     *
     */
    public function getGenderName(){
        return $this->gender->gender_name;
    }




}
