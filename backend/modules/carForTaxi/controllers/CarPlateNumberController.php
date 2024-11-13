<?php

namespace backend\modules\carForTaxi\controllers;

use backend\modules\carForTaxi\models\CarClassRecord;
use backend\modules\carForTaxi\models\CarPlateNumberRecord;
use backend\modules\carForTaxi\models\NbTaxiCarRecord;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CarPlateNumberController implements the CRUD actions for CarPlateNumberRecord model.
 */
class CarPlateNumberController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
//                'access' => [
//                    'class' => AccessControl::class,
//                    'rules' => [
//                        [
//                            'actions' => ['view', 'index'],
//                            'allow' => true,
//                            'roles' => ['@'],
//                        ],
//                        [
//                            'actions' => ['create', 'update', 'delete'],
//                            'allow' => true,
//                            'roles' => ['@']
//                        ]
//                    ],
//                ],
                'verbs' => [
                    'class' => VerbFilter::class,
                    'actions' => [
                        'delete' => ['post'],
                    ],
                ],

            ]
        );
    }

    /**
     * Lists all CarPlateNumberRecord models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => CarPlateNumberRecord::find(),
            /*
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ]
            ],
            */
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CarPlateNumberRecord model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new CarPlateNumberRecord model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $car_plate_number = new CarPlateNumberRecord();
        $taxi_car = new NbTaxiCarRecord();
        if ($this->request->isPost) {
            if ($this->load($car_plate_number, $taxi_car, $this->request->post())) {
                $car_plate_number->save();
                $taxi_car->setAttributes([
                    'plateNumberId'=> $car_plate_number->getPrimaryKey(),
                    'statusValue'=>10
                ]);
                $taxi_car->save();
                return $this->redirect(['view', 'id' => $car_plate_number->id]);
            }
        } else {
            $car_plate_number->loadDefaultValues();
        }

        return $this->render('create', compact('car_plate_number', 'taxi_car'));
    }

    /**
     * Updates an existing CarPlateNumberRecord model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing CarPlateNumberRecord model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the CarPlateNumberRecord model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return CarPlateNumberRecord the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CarPlateNumberRecord::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    private function load(CarPlateNumberRecord $carPlateNumberRecord, NbTaxiCarRecord $carClassRecord, array $post)
    {
        return $carClassRecord->load($post)
            and $carPlateNumberRecord->load($post)
            and $carPlateNumberRecord->validate()
            and $carPlateNumberRecord->validate();
    }
}
