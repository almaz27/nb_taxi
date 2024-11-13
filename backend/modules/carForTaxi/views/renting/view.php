<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\carForTaxi\models\RentingRecord */
?>
<div class="renting-record-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
            'userName',
            'carName',
            'contract_time:datetime',
            'statusName',
            'created_at',
            'run_at',
            'returned_at',
        ],
    ]) ?>

</div>
