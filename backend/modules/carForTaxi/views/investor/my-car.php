<?php
/** @var \backend\modules\carForTaxi\models\CarClassRecord $carsOfInvestor*/
use yii\grid\GridView;

echo GridView::widget([
    'dataProvider' => $carsOfInvestor,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        [
            'label'=>'Car Details',
            'format'=>'paragraphs',
            'value'=>function($model){
                $result = '';
                $result .= "Type: ".$model->carType."\n\n";
                $result .= "Plate number: ".$model->carPlateNumber."\n\n";
                return $result;
            }
        ],
        [
            'label'=>'User Details',
            'format'=>'paragraphs',
            'value'=>function($model){
                $result = '';
                $result .= $model->driverUsername."\n\n";
//                $result .= $model->carPlateNumber."\n\n";
                return $result;
            }
        ],
        [
            'label'=>'Price per day/ My profit',
            'format'=>'paragraphs',
            'value'=>function($model){
                $result = '';
                $result .= $model->car->pricePerDay."\n\n";
//                $result .= $model->carPlateNumber."\n\n";
                return $result;
            }
        ]
    ]
]);
