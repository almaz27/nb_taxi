<?php

use backend\models\CarRecord;

/** @var \common\models\RentCar $dataProvider */
/** @var \common\models\RentCar $rentCar */
/** @var backend\models\CarRecord $car */
?>

<div>
    <?php echo \yii\widgets\DetailView::widget([
            'model' => $car,
            'attributes' => [
                    'name',
                    'plateNumber',
                    'class',
                    'deadline:datetime',
                ]
    ])?>
</div>
