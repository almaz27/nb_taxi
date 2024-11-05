<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\UserTypeBackendRecord $model */

$this->title = 'Create User Type Backend Record';
$this->params['breadcrumbs'][] = ['label' => 'User Type Backend Records', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-type-backend-record-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
