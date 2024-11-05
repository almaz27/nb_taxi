<?php

namespace frontend\controllers;

use common\models\PermissionHelpers;
use common\models\RecordHelper;
use frontend\models\ProfileRecord;
use frontend\models\ProfileRecordSearch;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProfileController implements the CRUD actions for ProfileRecord model.
 */
class ProfileController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return
            [
                'access' => [
                    'class' => AccessControl::class,
                    'only' => ['index', 'view','create', 'update', 'delete'],
                    'rules' => [
                        [
                            'actions' =>['index', 'view','create', 'update', 'delete'],
                            'allow' => true,
                            'roles' => ['@'],
                            'matchCallback' => function ($rule ,$action) {
                                return PermissionHelpers::requireStatus('active');
                            }
                        ]
                    ]
                ],
                'verbs' => [
                    'class' => VerbFilter::class,
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ];

    }

    /**
     * Lists all ProfileRecord models.
     *
     * @return \yii\web\Response
     */
    public function actionIndex()
    {
        if($already_exists = RecordHelper::userHas('profile')){
            return $this->render('view',['model'=>$this->findModel($already_exists)]);
        } else{
            return $this->redirect(['create']);
        }
    }

    /**
     * Displays a single ProfileRecord model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView()
    {
        if($already_exists = RecordHelper::userHas('profile')){

            return $this->render('view',['model'=>$this->findModel($already_exists)]);
        }
        else{

            return $this->redirect(['create']);
        }
    }

    /**
     * Creates a new ProfileRecord model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new ProfileRecord();

        $model->user_id = Yii::$app->user->identity->id;

        if($already_exists = RecordHelper::userHas('profile')){

            return $this->render('view',['model'=>$this->findModel($already_exists)]);
        }elseif ($model->load(Yii::$app->request->post()) && $model->save()) {

            return $this->redirect(['view']);
        }else{

            return $this->render('create', ['model' => $model]);
        }
    }

    /**
     * Updates an existing ProfileRecord model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate()
    {
        PermissionHelpers::requireUpgradeTo('Paid');
        if($model = ProfileRecord::find()->where(['user_id' => Yii::$app->user->identity->id])->one()){
            if($model->load(Yii::$app->request->post()) && $model->save()){
                return $this->redirect(['view']);
            }
            else{
                return $this->render('update', ['model' => $model]);
            }
        }
        else{
            throw new NotFoundHttpException('No Such Profile');
        }
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ProfileRecord model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete()
    {
        $model = ProfileRecord::find()->where(['user_id' => Yii::$app->user->id])->one();
        $this->findModel($model->id)->delete();

        return $this->redirect(['site/index']);
    }

    /**
     * Finds the ProfileRecord model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return ProfileRecord the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ProfileRecord::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
