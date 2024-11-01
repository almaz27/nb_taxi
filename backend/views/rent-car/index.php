<?php

use yii\grid\GridView;
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\RentCarSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Rent Cars';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rent-car-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Rent Car', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'id',
                [
                        'attribute' => 'car_id',
                        'value' => function ($model, $key, $index, $column) {
                            return \app\models\CarRecord::findOne($model->car_id)->getName();},
                        'format' => 'text',
                        'label' => 'Car Name',
                ],
                [
                        'attribute' => 'user_id',
                        'value' => function ($model, $key, $index, $column) {
                             return \backend\modules\account\models\User::findOne($model->user_id)->username;},
                        'format' => 'text',
                        'label' => 'User Name',
                ],
                'rent_period:date',
                ['class' => 'yii\grid\ActionColumn'],
        ]

    ]) ?>


</div>
