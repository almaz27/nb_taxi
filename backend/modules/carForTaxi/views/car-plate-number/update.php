<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\modules\carForTaxi\models\CarPlateNumberRecord $model */

$this->title = 'Update Car Plate Number Record: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Car Plate Number Records', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="car-plate-number-record-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
