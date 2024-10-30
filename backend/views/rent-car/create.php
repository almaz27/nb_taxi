<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\RentCar $model */

$this->title = 'Create Rent Car';
$this->params['breadcrumbs'][] = ['label' => 'Rent Cars', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rent-car-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
