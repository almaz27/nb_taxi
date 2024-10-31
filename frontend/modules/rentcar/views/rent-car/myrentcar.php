<?php

use backend\models\CarRecord;
use yii\widgets\ListView;
/** @var backend\models\RentCar $dataProvider */
/** @var backend\models\RentCar $rentCar */
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
