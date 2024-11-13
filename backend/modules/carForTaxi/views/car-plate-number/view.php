<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\modules\carForTaxi\models\CarPlateNumberRecord $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Car Plate Number Records', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="car-plate-number-record-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?php echo DetailView::widget([
        'model' => $model,
        'attributes' => [
                ['label'=>'Car Plate Number Number', 'attribute'=>'string'],
                ['label'=>'Car Type', 'value'=>function($model){ return $model->getTaxiCarFullName();}],
                ['label'=>'Car Class', 'value'=>function($model){ return $model->getCarClassName();}],

        ]
    ])?>



</div>
