<?php

namespace backend\modules\carForTaxi\controllers;

use backend\modules\carForTaxi\models\CarClassRecord;
use backend\modules\carForTaxi\models\OwningRecord;
use backend\modules\carForTaxi\models\RentingRecord;
use Yii;
use yii\data\ActiveDataProvider;

class InvestorController extends \yii\web\Controller
{
    const SEND_TO_APPROVE_BY_INVESTOR = 15;
    const APPROVED_BY_INVESTOR = 20;
    public function actionIndex()
    {
        $forApproveDataProvider = new ActiveDataProvider([
            'query'=> RentingRecord::find()->where(['between','statusValue',10,15]),
        ]);
        $restRentingDataProvider = new ActiveDataProvider([
            'query'=> RentingRecord::find()->where(['and',['>', 'statusValue', 15],['<', 'statusValue', 30]]),
        ]);

        return $this->render('index',compact('forApproveDataProvider','restRentingDataProvider'));
    }
    public function actionApprove($id){
        $renting = RentingRecord::findOne($id);
        $renting->setAttribute('statusValue',self::APPROVED_BY_INVESTOR);
        $renting->update();
        return $this->redirect(['index']);
    }
    public function actionReject($id){
        $renting = RentingRecord::findOne($id);
        $renting->setAttribute('statusValue',self::SEND_TO_APPROVE_BY_INVESTOR);
        $renting->update();
        return $this->redirect(['index']);
    }
    public function actionMyCar(){
        $carsOfInvestor = new ActiveDataProvider([
            'query'=> OwningRecord::find()->where(['owner_id'=>Yii::$app->user->identity->id]),
        ]);

        return $this->render('my-car',compact('carsOfInvestor'));

    }

}
