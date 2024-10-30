<?php

namespace frontend\controllers;
use backend\models\Blog;
use yii\web\Controller;

/**
 * Blog controller
 */
class BlogController extends Controller
{


    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $blogs = Blog::find()->all();
        return $this->render('index',compact('blogs'));
    }
    public function actionView($id){
        $blog = Blog::find()->where(['slug'=>$id])->one();
        return $this->render('view',compact('blog'));
    }


}
