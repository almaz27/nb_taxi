<?php
/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $forApproveDataProvider */
/** @var yii\data\ActiveDataProvider $restRentingDataProvider */
use yii\grid\GridView;
use yii\grid\ActionColumn;
use yii\helpers\Html;
?>


<div class="taxi-park">
    <blockquote class="blockquote">
        <p class="mb-0">Taxi car waiting for your agreement to rent</p>
    </blockquote>
    <?=
    GridView::widget([
            'dataProvider' => $forApproveDataProvider,
            'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'user.username:text:Taxi Driver',
                    'carName:text:Car ',
                    'car.plateNumberFullName:text:Plate Number',
                    'contract_time:date',
                    'created_at:date',
                    'statusName',
                    [
                        'class' => ActionColumn::class,
                        'header' => 'Actions',
                        'template' => '{approve} {reject}',
                        'buttons' => [
                                'approve' => function ($url, $model) {
                                    return ($model->statusValue == 5)?  Html::a('<i class="fa fa-check" aria-hidden="true"></i>', $url, [
                                        'title' => 'Approve',
                                        'aria-label' => 'Approve',
                                        'data-pjax' => '0',
                                    ]):''; },
                            'reject' => function ($url, $model) {
                                return ($model->statusValue == 10)?  Html::a('<i class="fa fa-times" aria-hidden="true"></i>', $url, [
                                    'title' => 'Reject',
                                    'aria-label' => 'Reject',
                                    'data-pjax' => '0',
                                ]):'';
                            }
                        ],
                    ],
            ]
    ])
    ?>
</div>
<div class="taxi-park">
    <blockquote class="blockquote">
        <p class="mb-0">Taxi cars which you agreed and at next positions</p>
    </blockquote>
    <?=
    GridView::widget([
        'dataProvider' => $restRentingDataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'user.username:text:Taxi Driver',
            'carName:text:Car ',
            'car.plateNumberFullName:text:Plate Number',
            'contract_time:date',
            'created_at:date',
            'statusName',
            [
                'class' => ActionColumn::class,
                'header' => 'Actions',
                'template' => '{approve} {reject}',
                'buttons' => [
                    'approve' => function ($url, $model) {
                        return ($model->statusValue == 5)?  Html::a('<i class="fa fa-check" aria-hidden="true"></i>', $url, [
                            'title' => 'Approve',
                            'aria-label' => 'Approve',
                            'data-pjax' => '0',
                        ]):''; },
                    'reject' => function ($url, $model) {
                        return ($model->statusValue == 10)?  Html::a('<i class="fa fa-times" aria-hidden="true"></i>', $url, [
                            'title' => 'Reject',
                            'aria-label' => 'Reject',
                            'data-pjax' => '0',
                        ]):'';
                    }
                ],
            ],
        ]
    ])
    ?>
</div>