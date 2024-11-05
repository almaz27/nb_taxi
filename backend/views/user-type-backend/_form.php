<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\UserTypeBackendRecord $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="user-type-backend-record-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_type_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_type_value')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
