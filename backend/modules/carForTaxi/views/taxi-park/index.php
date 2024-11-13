<?php
/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $rentingsDataProvider */
use yii\grid\GridView;
use yii\grid\ActionColumn;
use yii\helpers\Html;
use common\models\RentCarActionColumn;
?>
<blockquote class="blockquote">
    <p class="mb-0"></p>
</blockquote>

<div class="taxi-park">
    <?=
    GridView::widget([
            'dataProvider' => $rentingsDataProvider,
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