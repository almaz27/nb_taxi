<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\CarRecord $model */

$this->title = 'Update Car Record: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Car Records', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="car-record-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
