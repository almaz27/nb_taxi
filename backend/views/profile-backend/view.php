<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\PermissionHelpers;

/** @var yii\web\View $this */
/** @var backend\models\ProfileBackendRecord $model */

$this->title = $model->user->username;
$show_this_nav = PermissionHelpers::requireMinimumRole('super-user');
$this->params['breadcrumbs'][] = ['label' => 'Profiles ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="profile-backend-record-view">

    <h1>Profile : <?= Html::encode($this->title) ?></h1>
<p>
    <?php
    if(!Yii::$app->user->isGuest && $show_this_nav){
        echo Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']);
    }
    if(!Yii::$app->user->isGuest && $show_this_nav){
        echo Html::a('Delete', ['delete', 'id' => $model->id], ['class' => 'btn btn-danger', 'data' => ['confirm' => 'Are you sure you want to delete this item?', 'method' => 'post',]]);
    }
    ?>
</p>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
                [
                        'attribute'=>'userLink',
                        'format'=>'raw',
                ],
            'first_name',
            'last_name',
            'birthday',
            'gender.gender_name',
            'created_at',
            'updated_at',
            'id'
        ],
    ]) ?>

</div>
