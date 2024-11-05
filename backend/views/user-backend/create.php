<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\UserBackendRecord $model */

$this->title = 'Create User Backend Record';
$this->params['breadcrumbs'][] = ['label' => 'User Backend Records', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-backend-record-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
