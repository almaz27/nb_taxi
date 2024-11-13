<?php

use backend\models\UserBackendRecord;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\widgets\ListView;
use yii\grid\GridView;



/** @var yii\web\View $this */
/** @var backend\models\UserBackendRecordSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'User Backend Records';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-backend-record-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create User Backend Record', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
            'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                ['attribute' => 'userLink', 'format' => 'raw'],
            ['attribute' => 'profileLink', 'format' => 'raw'],
            'email:email',
            'userTypeName',
            'statusName',
            'created_at:date',
            ['class' => 'yii\grid\ActionColumn'],
        ]
    ]);?>


</div>
