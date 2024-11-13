<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\UserBackendRecord $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="user-backend-record-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'role_id')->dropDownList($model->getRoleList(),['prompt'=>'Choose role']) ?>

    <?= $form->field($model, 'user_type_id')->dropDownList($model->getUserTypeList(),['prompt'=>'Choose user type']) ?>
    <?= $form->field($model,'status_id')->dropDownList($model->getStatusList(),['prompt'=>'Choose status'])?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord? 'Create':'Update', ['class' => $model->isNewRecord? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
