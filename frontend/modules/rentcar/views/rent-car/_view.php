
<?php

use evgeniyrru\yii2slick\Slick;
use kartik\file\FileInput;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\JsExpression;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
/** @var backend\models\CarRecord $model */
?>

Something html here
<?php

$pictureImages = ArrayHelper::map($model->pictures, 'id', function ($picture) { return
    Html::img(Url::to('@web/images/cars/'.$picture->image),['alt' => 'Car', 'class'=>"responsive", 'style'=>'max-width: 400px; height: auto;']); });

?>


<div class="card" style="width: 25rem; padding: 15px">

    <?= Html::img(Url::to('@web/images/cars/1730205596127.jpeg'),['alt' => 'Car', 'class'=>"card-img-top", 'style'=>'width:15rem']);?>
    <div class="card-body">
        <h5 class="card-title"><?= $model->getName()?></h5>
        <?php if(!empty($pictureImages)){
        echo Slick::widget([

            // HTML tag for container. Div is default.
            'itemContainer' => 'div',

            // HTML attributes for widget container
            'containerOptions' => ['class' => 'card-body'],

            // Items for carousel. Empty array not allowed, exception will be throw, if empty
            'items' => $pictureImages,

            // HTML attribute for every carousel item
            'itemOptions' => ['class' => 'cat-image'],

            // settings for js plugin
            // @see http://kenwheeler.github.io/slick/#settings
            'clientOptions' => [
                'autoplay' => true,
                'dots'     => true,
                // note, that for params passing function you should use JsExpression object
                'onAfterChange' => new JsExpression('function() {console.log("The cat has shown")}'),
            ],

        ]);} ?>

        <a href="<?= Url::to(['rent','id'=>$model->id]) ?>" class="btn btn-primary">Rent this car</a>
    </div>
</div>


