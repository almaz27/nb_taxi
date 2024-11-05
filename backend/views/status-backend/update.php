<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\StatusBackendRecord $model */

$this->title = 'Update Status Backend Record: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Status Backend Records', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="status-backend-record-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
