<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\StatusBackendRecord $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="status-backend-record-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'status_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status_value')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
