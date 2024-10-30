<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\CarRecord $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="car-record-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'year')->textInput() ?>

    <?= $form->field($model, 'make')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'model')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pricePerDay')->textInput() ?>

    <?= $form->field($model, 'workday')->textInput() ?>

    <?= $form->field($model, 'mileage')->textInput() ?>

    <?= $form->field($model, 'plateNumber')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'class')->dropDownList([ 'econom' => 'Econom', 'comfort' => 'Comfort', 'comfort +' => 'Comfort +', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
