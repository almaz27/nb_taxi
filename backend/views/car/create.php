<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\CarRecord $model */

$this->title = 'Create Car Record';
$this->params['breadcrumbs'][] = ['label' => 'Car Records', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="car-record-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
