<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\PermissionHelpers;

/** @var yii\web\View $this */
/** @var backend\models\UserBackendRecord $model */

$this->title = $model->username;
$show_this_nav = PermissionHelpers::requireMinimumRole('super-user');

$this->params['breadcrumbs'][] = ['label' => 'User Backend Records', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-backend-record-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php if(!Yii::$app->user->isGuest && $show_this_nav){
            echo Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']);
        }  ?>
        <?php if(!Yii::$app->user->isGuest && $show_this_nav){
            echo Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]); }?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
                [
                        'attribute' => 'profileLink',
                    'format' => 'raw',
                ],
//            'id',
//            'username',
//            'auth_key',
//            'password_hash',
//            'password_reset_token',
            'email:email',
            'statusName',
            'created_at',
            'updated_at',
//            'verification_token',
            'roleName',

//            'user_type_id',
        ],
    ]) ?>

</div>
