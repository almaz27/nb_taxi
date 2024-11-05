<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\RoleBackendRecord $model */

$this->title = 'Create Role Backend Record';
$this->params['breadcrumbs'][] = ['label' => 'Role Backend Records', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="role-backend-record-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
