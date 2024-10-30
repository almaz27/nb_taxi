<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\CarRecord $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Car Records', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="car-record-view">

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

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
            'year',
            'make',
            'model',
            'pricePerDay',
            'workday',
            'mileage',
            'plateNumber',
            'class',
        ],
    ]) ?>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Image</th>
        </tr>
        </thead>
        <tbody>

        <?php foreach($model->pictures as $picture){?>
            <tr>
                <td>
                    <?php echo $picture->id?>
                </td>
                <td><img src="<?=\yii\helpers\Url::to("/images/cars/".$picture->image) ?>" alt=""  width="42" height="42" style="vertical-align:bottom">
                </td>
            </tr>

        <?php }?>
        </tbody>
    </table>

</div>
