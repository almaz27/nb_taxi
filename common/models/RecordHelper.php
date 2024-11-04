<?php

namespace common\models;

class RecordHelper
{

    public static function userHas($model_name){
        $connection = \Yii::$app->db;
        $userid = \Yii::$app->user->identity->id;
        $sql = "SELECT id FROM $model_name WHERE user_id = :user_id";
        $command = $connection->createCommand($sql);
        $command->bindParam(':user_id',$userid);
        $result = $command->queryOne();
        if($result ==null){
            return false;
        }else{
            return $result['id'];
        }

    }
}