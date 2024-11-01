<?php

namespace frontend\modules\rentcar\controllers;

use common\models\CarRecord;
use common\models\RentCar;
use Yii;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use yii\web\Controller;

/**
 * Default controller for the `rentcar` module
 */
class RentCarController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {

        $dataProvider = new ActiveDataProvider([
            'query' => CarRecord::find()->where(['NOT IN','id', ArrayHelper::getColumn(RentCar::find()->select('car_id')->asArray()->all(), 'car_id')]) ,
            'pagination' => [
                'pageSize' => 10,

            ]
        ]);
        return $this->render('index',compact('dataProvider'));
    }
    public function actionRent($id){
        $this->response->format = \yii\web\Response::FORMAT_JSON;
        return [
            'success' => true,
            'data' => $this->request->post(),
        ];

        $rentCar = new RentCar();
        $date = new \DateTime('now');

        $rentCar->setAttributes([
            'user_id' => Yii::$app->user->id,
            'car_id' => $id,
            'rent_period' => $date->modify('+1 month')->format('Y-m-d H:i:s'),
        ]);
        $rentCar->save();
        $deadline = $rentCar->rent_period;
        $car = CarRecord::findOne($id);

        return $this->render('myrentcar',compact('car','deadline'));
    }
}
