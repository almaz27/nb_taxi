<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\modules\carForTaxi\models\CarPlateNumberRecord $car_plate_number */
/** @var backend\modules\carForTaxi\models\NbTaxiCarRecord $taxi_car */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="car-plate-number-record-form container">

    <?php $form = ActiveForm::begin([
            'options'=>[
                    'enctype'=>'multipart/form-data',
                    'class' => 'row'
            ]
    ]); ?>
    <div class="car-plate-number-record-create col-3">
        <h3>Insert Car Plate Number</h3>
        <div class="p-3 border bg-light">
            <?= $form->field($car_plate_number, 'serial_number')->textInput(['maxlength' => true]) ?>

            <?= $form->field($car_plate_number, 'serial_number_secondary')->textInput(['maxlength' => true]) ?>

            <?= $form->field($car_plate_number, 'registration_code')->textInput() ?>

            <?= $form->field($car_plate_number, 'registration__region_code')->textInput() ?>

            <?= $form->field($car_plate_number, 'country')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="taxi-car-record-create col-6">

        <h3>Insert Car Characteristics</h3>
        <div class="p-3 border bg-light">
            <?= $form->field($taxi_car, 'carTypeId')->dropDownList($taxi_car->getCarTypeList(),['prompt'=>'Please select car type'])?>
            <!--        --><?php //= $form->field($taxi_car, 'plateNumberId')->textInput() ?>
            <?= $form->field($taxi_car, 'classValue')->dropDownList($taxi_car->getCarClassList(),['prompt'=>'Please select car class'])?>
<!--            --><?php //= $form->field($taxi_car, 'statusValue')->dropDownList($taxi_car->getStatusList(),['prompt'=>'Please select car status '])?>
            <?= $form->field($taxi_car, 'mileage')->textInput() ?>
            <?= $form->field($taxi_car, 'pricePerDay')->textInput() ?>
        </div>


    </div>


    <div class="form-group row-cols-md-3">
        <?= Html::submitButton('Insert Car', ['class' => 'btn btn-success', 'style'=>'margin-top:10px; ']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
