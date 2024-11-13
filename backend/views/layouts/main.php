<?php

/** @var \yii\web\View $this */
/** @var string $content */

use backend\assets\AppAsset;
use common\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use common\models\PermissionHelpers;
use backend\assets\FontAwesomeAsset;
use yii\helpers\Url;

AppAsset::register($this);
FontAwesomeAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>
<header>
    <?php

    $is_taxi_park = PermissionHelpers::requireRole('taxi-park');
    $is_driver = PermissionHelpers::requireRole('driver');
    $is_investor = PermissionHelpers::requireRole('investor');
    $is_admin = PermissionHelpers::requireRole('admin');
    if(!Yii::$app->user->isGuest) {
        $brandLabel = $is_taxi_park? '<i class="fa fa-taxi"></i> Taxi Park' : ($is_driver? '<i class="fa fa-user"></i> Driver': '<i class="fa fa-dollar"></i> Investor');
        NavBar::begin([
                'brandLabel'=>'NB_TAXI '.$brandLabel,
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => ['navbar-dark', 'bg-dark', 'navbar-expand-md']
                ]
        ]);
    }else{
        NavBar::begin([
                'brandLabel'=>'NB_TAXI <i class="fa fa-android"></i>',
                'brandUrl' => Yii::$app->homeUrl,
            'options' => [
//                    'class' => 'navbar navbar-inverse navbar-fixed-top',
                'class' => ['navbar-dark', 'bg-dark', 'navbar-expand-md']
            ]
        ]);
    }

    $menuItems = [
        ['label' => Yii::t('navbar','Home'), 'url' => ['/site/index']],
    ];
    if (!Yii::$app->user->isGuest ) {
        if(Yii::$app->user->identity->role_id == $is_taxi_park){
            $menuItems[] = ['label' => Yii::t('navbar','Drivers'), 'url' => ['taxi-park/drivers']];
            $menuItems[] = ['label' => Yii::t('navbar','Investors'), 'url' => ['taxi-park/investors']];
            $menuItems[] = ['label' => Yii::t('navbar','Cars'), 'url' => ['taxi-park/cars']];
            $menuItems[] = ['label' => Yii::t('navbar','Rentings'), 'url' => ['taxi-park/renting']];
        }
        if(Yii::$app->user->identity->role_id == $is_admin ){
            $menuItems[] = ['label' => 'Users', 'url' => ['user-backend/index']];
            $menuItems[] = ['label' => 'Profiles', 'url' => ['profile-backend/index']];
            $menuItems[] = ['label' => 'Roles', 'url' => ['/role-backend/index']];
            $menuItems[] = ['label' => 'User Types', 'url' => ['/user-type-backend/index']];
            $menuItems[] = ['label' => 'Statuses', 'url' => ['/status-backend/index']];
        }
        if(Yii::$app->user->identity->role_id == $is_driver){
            $menuItems[] = ['label' => Yii::t('navbar','Renting'), 'url' => ['driver/renting']];
            $menuItems[] = ['label' =>Yii::t('navbar', 'Cars for rent'), 'url' => ['driver/cars-for-rent']];
        }
        if(Yii::$app->user->identity->role_id == $is_investor){
            $menuItems[] = ['label' => Yii::t('navbar','Renting'), 'url' =>'','items' => [
                    ['label' => Yii::t('navbar','My rentings'),
                        'url' => Url::to(['/carForTaxi/investor/index'])],
                    ['label' => Yii::t('navbar','My cars'),
                        'url' => Url::to(['/carForTaxi/investor/my-car'])]
            ]];

        }

    } if(Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else{
        $menuItems[] = ['label' => 'Logout ('.Yii::$app->user->identity->username.')', 'url' => ['/site/logout']];
    }

    echo Nav::widget([
        'options' => ['class' => ['navbar-nav', 'me-auto', 'mb-2', 'mb-md-0', 'navbar-right']],
        'items' => $menuItems,
    ]);


    NavBar::end();
    ?>
</header>

<main role="main" class="flex-shrink-0">
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>


    </div>
</main>

<footer class="footer mt-auto py-3 text-muted">
    <div class="container">
        <p class="float-start">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>
        <p class="float-end"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();
