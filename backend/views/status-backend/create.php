<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\StatusBackendRecord $model */

$this->title = 'Create Status Backend Record';
$this->params['breadcrumbs'][] = ['label' => 'Status Backend Records', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="status-backend-record-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
