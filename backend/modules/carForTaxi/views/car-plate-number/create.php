<?php

use yii\helpers\Html;
use common\models\PermissionHelpers;

/** @var yii\web\View $this */
/** @var backend\modules\carForTaxi\models\CarPlateNumberRecord $car_plate_number */
/** @var backend\modules\carForTaxi\models\NbTaxiCarRecord $taxi_car*/

$this->title = 'Create Car Plate Number Record';
$this->params['breadcrumbs'][] = ['label' => 'Car Plate Number Records', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<h1><?= Html::encode($this->title) ?></h1>

<?php if(PermissionHelpers::requireRole('investor')){
    echo $this->render('_form', [
        'car_plate_number'=> $car_plate_number,
        'taxi_car'=>$taxi_car
    ]);
}
else{
    echo Html::tag('p','You don\'t have permission to insert car',['class'=>'text-danger']);
    
    echo Html::a('Back', Yii::$app->request->referrer, ['class' => 'btn btn-primary']);
}


?>




