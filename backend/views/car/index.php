<?php

use app\models\CarRecord;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\widgets\ListView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\CarRecordSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Car Records';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="car-record-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Car Record', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Upload Multiple', ['multiple'], ['class' => 'btn btn-primary']) ?>

    </p>

    <?php Pjax::begin(); ?>
<!--    --><?php //echo $this->render('_search', ['model' => $searchModel]); ?>


    <?= \yii\grid\GridView::widget([
            'dataProvider' => $dataProvider,
'filterModel' => $searchModel,
            'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
    //            'id',
                'year',
                'make',
                'model',
                ['class' => 'yii\grid\ActionColumn'],
            ],
    ])?>

    <?php Pjax::end(); ?>

</div>
