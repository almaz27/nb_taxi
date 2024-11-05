<?php

namespace frontend\controllers;

use frontend\models\ProfileRecord;
use Yii;

class UpgradeController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $profile = ProfileRecord::findOne(['user_id'=>Yii::$app->user->identity->id]);
        return $this->render('index', compact('profile'));
    }

}
