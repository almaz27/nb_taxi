<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\carForTaxi\models\RentingRecord */
?>
<div class="renting-record-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'user_id',
            'car_id',
            'contract_time:datetime',
            'statusValue',
            'created_at',
            'run_at',
            'returned_at',
        ],
    ]) ?>

</div>
