<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
//    $menuItems = [
//        ['label' => 'მთავარი', 'url' => ['/user/index']],
//    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'შესვლა', 'url' => ['/user/login']];
        $menuItems[] = ['label' => 'რეგისტრაცია', 'url' => ['/user/sign-up']];
    } else {
        $menuItems[] = ['label' => 'პირადი კაბინეტი', 'url' => ['/personal-area/profile']];
        $menuItems[] = '<li>'
            . Html::beginForm(['/user/logout'], 'post')
            . Html::submitButton(
                'გამოსვლა (' . Yii::$app->user->identity->name . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <div class="row">
            <div class="col-lg-3">
                <h3><br></h3>
                <div class="personal-area__menu" style="padding: 30px; background-color: #ffc000;">
                    <?php

                    echo Html::a('პროფილი', ['personal-area/profile'], ['class' => 'btn btn-default btn-block']);
                    echo "<br>";
                    echo Html::a('ხელშეკრულება', ['personal-area/contracts'], ['class' => 'btn btn-default btn-block']);
                    echo "<br>";
                    echo Html::a('ფასდაკლებები', ['personal-area/discounts'], ['class' => 'btn btn-default btn-block']);

                    ?>
                </div>
            </div>
            <div class="col-lg-8">
                <?= $content ?>
            </div>
        </div>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
