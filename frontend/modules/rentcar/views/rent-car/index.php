<?php

use yii\widgets\ListView;

/** @var \common\models\RentCar $dataProvider */
?>

<div class="grid" style="padding: 0px 20px;"><div>

        <?= ListView::widget(
            [
                'dataProvider' => $dataProvider,
                'itemView' => function ($model, $key, $index, $widget) {
                    return $this->render('_view',compact('model'));
                },
                'layout' => "{items}\n{pager}",
                'pager' => [
                    'nextPageLabel' => 'Next',],
                'itemOptions' => ['class' => 'col-md-4 offset-sm-1' ],
                'emptyText' => '',
                'options' => ['class' => 'row'],
            ],
        )?>
    </div>
</div>

