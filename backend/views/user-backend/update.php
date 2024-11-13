<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\UserBackendRecord $model */

$this->title = 'Update User Backend Record: ' . $model->username;
$this->params['breadcrumbs'][] = ['label' => 'User Backend Records', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->username, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-backend-record-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
