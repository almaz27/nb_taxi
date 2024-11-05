<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\PermissionHelpers;



/**
 * @var yii\web\View $this
 * @var frontend\models\ProfileRecord $model
 */

$this->title = $model->user->username."'s Profile";
$this->params['breadcrumbs'][] = ['label' => 'Profile', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="profile-record-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php if(PermissionHelpers::userMustBeOwn('profile',$model->id)) {
            echo Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']);
        }?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'user.username',
            'first_name',
            'last_name',
            'birthday:date',
            'gender.gender_name',
//            'created_at',
//            'updated_at',
        ],
    ]) ?>

</div>
