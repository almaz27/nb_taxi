<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\ProfileRecord $model */

$this->title = 'Update ' . $model->user->username."'s Profile";
$this->params['breadcrumbs'][] = ['label' => 'Profile', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="profile-record-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
