<?php

namespace backend\models;

use Cassandra\Type\UserType;
use Yii;
use backend\models\StatusBackendRecord;
use yii\debug\models\search\Profile;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string|null $password_reset_token
 * @property string $email
 * @property int|null $status_id
 * @property string $created_at
 * @property string $updated_at
 * @property string|null $verification_token
 * @property int|null $role_id
 * @property int|null $user_type_id
 *
 * @property Profile[] $profiles
 * @property RentCar[] $rentCars
 * @property Role $role
 * @property Status $status
 * @property UserType $userType
 */
class UserBackendRecord extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'auth_key', 'password_hash', 'email'], 'required'],
            [['status_id', 'role_id', 'user_type_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['username', 'password_hash', 'password_reset_token', 'email', 'verification_token'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
            [['role_id'], 'exist', 'skipOnError' => true, 'targetClass' => Role::class, 'targetAttribute' => ['role_id' => 'role_value']],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => Status::class, 'targetAttribute' => ['status_id' => 'status_value']],
            [['user_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => UserType::class, 'targetAttribute' => ['user_type_id' => 'user_type_value']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'statusName' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'verification_token' => 'Verification Token',
            'roleName' => 'Role',
            'user_type_id' => 'User Type ID',
            'profile.username' => 'Profile',
        ];
    }

    /**
     * Gets query for [[Profiles]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProfiles()
    {
        return $this->hasMany(Profile::class, ['user_id' => 'id']);
    }

    /**
     * Gets query for [[RentCars]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRentCars()
    {
        return $this->hasMany(RentCar::class, ['user_id' => 'id']);
    }

    /**
     * Gets query for [[Role]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRole()
    {
        return $this->hasOne(RoleBackendRecord::class, ['role_value' => 'role_id']);
    }
    public function getRoleName()
{
    return $this->role->role_name;
}
public function getRoleList(){
        $dropOptions = RoleBackendRecord::find()->asArray()->all();
        return ArrayHelper::map($dropOptions, 'role_value', 'role_name');
}
    /**
     * Gets query for [[Status]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(StatusBackendRecord::class, ['status_value' => 'status_id']);
    }
    public function getStatusName()
    {
        return $this->status->status_name;
    }
    public function getStatusList()
    {
        $dropOptions = StatusBackendRecord::find()->asArray()->all();
        return ArrayHelper::map($dropOptions, 'status_value', 'status_name');
    }

    /**
     * Gets query for [[UserType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserType()
    {
        return $this->hasOne(UserTypeBackendRecord::class, ['user_type_value' => 'user_type_id']);
    }
    public function getUserTypeList(){
        $dropOptions = UserTypeBackendRecord::find()->asArray()->all();
        return ArrayHelper::map($dropOptions, 'user_type_value', 'user_type_name');
    }

    public function getProfile(){
        return $this->hasOne(ProfileBackendRecord::class, ['user_id' => 'id']);
    }
    public function getProfileUsername()
    {
        return $this->profile->username;
    }
    public function getProfileLink(){
        $url = Url::to(['profile-backend/view', 'id' => $this->profile->id]);
        $options = [];

        return Html::a($this->getProfileUsername(), $url, $options);

    }

    public function getUserLink(){
        $url = Url::to(['user-backend/view', 'id' => $this->id]);
        $options = [];
        return Html::a($this->username, $url, $options);
    }

}
