<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;

/** @var yii\web\View $this */
/** @var app\models\PicturesRecord $upload */
/** @var app\models\CarRecord $cars */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="car-record-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($upload, 'car_id')->dropDownList($cars) ?>
    <?= $form->field($upload, 'image')->widget(FileInput::class, ['options' => ['accept' => 'image/*', 'multiple' => true],]);?>


    <div class="form-group">
        <?= Html::submitButton('Upload', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
