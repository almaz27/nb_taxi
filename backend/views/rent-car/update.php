<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var \common\models\RentCar $model */

$this->title = 'Update Rent Car: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Rent Cars', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="rent-car-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
