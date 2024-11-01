
<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\JsExpression;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
/** @var backend\models\CarRecord $model */
?>

<?php

$pictureImages = ArrayHelper::map($model->pictures, 'id', function ($picture) { return
    Html::img(Url::to('@backend/web/images/cars/'.$picture->image),['style'=>"height: 3.125rem; cursor: pointer; width: 6.25rem; border-radius: 0.75rem;"]); });

?>

<div class="col card" style="opacity: 1; will-change: auto;">
    <div class="card-header">
        <div class="row">
            <div class="col">
                <div style="font-weight: 500;"><?= $model->getName()?></div>
                <div class="row" style="font-weight: 400; font-size: 0.875rem;">
                    <div><?= $model->year?></div>
                </div>
                <div style="font-weight: 400; font-size: 0.875rem; margin-top: 0.625rem;">
                    <div class="row"> <?= $model->pricePerDay ?>₽/день, <?= $model->workday?></div>
                </div>
            </div>
        </div>
        <div style="position: absolute; right: 0.5rem; z-index: 2; top: -0.5rem;">
            <img src="https://api.stax.ru/v1/files/marketplace/cars/exeed_lx.png" alt="" style="width: 11rem; transform: scaleX(-1);">
        </div>
    </div>
    <div class="card-content" style="text-align: right;">
        <div class="row" style="width: 100%; justify-content: end; position: relative;">
            <div class="car-amount-badge ">1 в наличии</div>
        </div>
        <div class="row" style="overflow-y: scroll; scrollbar-width: none; margin-top: 0.5rem; gap: 0.5rem;">
            <div class="col" style="align-items: center;">

                <?php if(!empty($model->pictures)){
//\yii\helpers\VarDumper::dump(Yii::getAlias('@backend'));
//die;
                echo Html::tag('p','HEEEY');
               echo Html::img('@backend/web/images/cars/'.$model->pictures[0]->getAttribute('image'), ['style'=>"height: 3.125rem; cursor: pointer; width: 6.25rem; border-radius: 0.75rem;"]);
                }?>
                <div class="photocontrol-number one-car-photocontrol-number"><?= $model->plateNumber?></div>
            </div>
        </div>
        <div class="row" style="justify-content: center; opacity: 0.5; font-size: 0.875rem; margin-top: 0.25rem;"><?= $model->plateNumber?>, пробег: <?= number_format($model->mileage,0,',',' ')?> км </div>
        <div style="margin-top: 0.25rem;">
            <div class="button" style="background-color: green; color: white; justify-content: center; text-align: center;" id="<?=$model->id?>">Арендовать
            </div>
        </div>
    </div>
</div>




