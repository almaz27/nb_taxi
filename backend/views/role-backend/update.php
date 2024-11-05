<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\RoleBackendRecord $model */

$this->title = 'Update Role Backend Record: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Role Backend Records', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="role-backend-record-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
