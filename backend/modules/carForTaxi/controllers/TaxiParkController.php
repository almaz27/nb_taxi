<?php

namespace backend\modules\carForTaxi\controllers;

use backend\modules\carForTaxi\models\RentingRecord;
use backend\modules\carForTaxi\models\RentingStatusRecord;
use Yii;
use yii\data\ActiveDataProvider;
use yii\helpers\VarDumper;

class TaxiParkController extends \yii\web\Controller
{
    const APPROVED_BY_TAXI_PARK = 10;
    const SEND_TO_APPROVE_BY_TAXI_PARK =5;

    public function actionIndex()
    {
        $rentingsDataProvider = new ActiveDataProvider([
            'query' => RentingRecord::find(),
        ]);
        return $this->render('index',compact('rentingsDataProvider'));
    }
    public function actionApprove($id){
        $rentingRecord = RentingRecord::findOne($id);
        $rentingRecord->statusValue = self::APPROVED_BY_TAXI_PARK;
        $rentingRecord->update();
        return $this->redirect(['rent']);
    }
    public function actionReject($id){
        $rentingRecord = RentingRecord::findOne($id);
        $rentingRecord->statusValue = self::SEND_TO_APPROVE_BY_TAXI_PARK;
        $rentingRecord->update();
        return $this->redirect(['rent']);
    }
    public function actionRent()
    {
        $forApproveDataProvider = new ActiveDataProvider([
            'query' => RentingRecord::find()->where(['between', 'statusValue', 0, 5]),
        ]);
        $restRentingDataProvider = new ActiveDataProvider([
            'query' => RentingRecord::find()->where(['and',['>=', 'statusValue', 10],['<=', 'statusValue', 30]]),
        ]);
        return $this->render('rent',compact('forApproveDataProvider','restRentingDataProvider'));
    }

}
