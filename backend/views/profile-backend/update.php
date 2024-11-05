<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\ProfileBackendRecord $model */

$this->title = 'Update Profile Backend Record: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Profile Backend Records', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="profile-backend-record-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
