<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\modules\carForTaxi\models\NbTaxiCarRecord $model */
/** @var ActiveForm $form */
?>
<div class="create-car">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'statusValue') ?>
        <?= $form->field($model, 'carTypeId') ?>
        <?= $form->field($model, 'plateNumberId') ?>
        <?= $form->field($model, 'mileage') ?>
        <?= $form->field($model, 'classValue') ?>
        <?= $form->field($model, 'pricePerDay') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary','style'=>'margin-top:10px;']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- create-car -->
