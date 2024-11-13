<?php
/** @var yii\web\View $this */
/** @var \backend\modules\carForTaxi\models\RentingRecord $forApproveDataProvider */
/** @var \backend\modules\carForTaxi\models\RentingRecord $restRentingDataProvider */

use yii\grid\GridView;
use yii\helpers\Html;
?>
<div class="investor">
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
            ['class' => 'yii\grid\ActionColumn',
                'template' => '{approve} {reject}',
                'buttons' => [
                    'approve' => function ($url, $model) {
                        return ($model->statusValue == 10 or $model->statusValue == 15)?
                            Html::a('<i class="fa fa-check" aria-hidden="true"></i>', $url, ['title' => Yii::t('yii', 'Approve')]):'';
                    },
                    'reject' => function ($url, $model) {
                        return ($model->statusValue == 20)?
                            Html::a('<i class="fa fa-times" aria-hidden="true"></i>', $url, ['title' => Yii::t('yii', 'Approve')]):'';
                    }
                ],

            ],
        ]
    ])
    ?>
</div>

<div class="investor">
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
            ['class' => 'yii\grid\ActionColumn',
                'template' => '{reject}',
                'buttons' => [
//                'approve' => function ($url, $model) {
//                    return ($model->statusValue == 15)?
//                        Html::a('<i class="fa fa-check" aria-hidden="true"></i>', $url, ['title' => Yii::t('yii', 'Approve')]):'';
//                },
                    'reject' => function ($url, $model) {
                        return ($model->statusValue == 20)?
                            Html::a('<i class="fa fa-times" aria-hidden="true"></i>', $url, ['title' => Yii::t('yii', 'Approve')]):'';
                    }
                ],

            ],
        ]
    ])
    ?>
</div>

