<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\helpers\Url;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header id="header">
<div class="row">
            <div class="col-lg-4">

            </div>
    <?php
    
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        //'brandLabel' =>Html::img('logo2.svg'),
        //'brandUrl' => Yii::$app->homeUrl,
        'options' => ['class' => 'navbar-expand-md navbar-dark bg-dark fixed-top']
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        'items' => [
            //['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'Поиск', 'url' => ['/shop']],
            ['label' => 'Женщинам', 'url' => ['/shop/man?id=1']],
            ['label' => 'Мужчинам', 'url' => ['/shop/man?id=2']],
            ['label' => 'Детям', 'url' => ['/shop/man?id=3']],
            ['label' => 'Корзина', 'url' => ['/bascet'],'visible' => !Yii::$app->user->isGuest],
            ['label' => 'Заказы', 'url' => ['/order'],'visible' => !Yii::$app->user->isGuest],
            //['label' => 'About', 'url' => ['/site/about']],
            //['label' => 'Contact', 'url' => ['/site/contact']],
            ['label' => 'Регистрация', 'url' => ['/site/register'],'visible' => Yii::$app->user->isGuest],
            Yii::$app->user->isGuest
                ? ['label' => 'Войти', 'url' => ['/site/login']]
                : '<li class="nav-item">'
                    . Html::beginForm(['/site/logout'])
                    . Html::submitButton(
                        'Выйти ',
                        ['class' => 'nav-link btn btn-link logout']
                    )
                    . Html::endForm()
                    . '</li>'
        ]
    ]);
    NavBar::end();
    ?>
    </div>
</header>

<main id="main" class="flex-shrink-0" role="main">
    <div class="container">
        <?php if (!empty($this->params['breadcrumbs'])): ?>
            <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
        <?php endif ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer id="footer" class="mt-auto py-3 bg-light">
    <div class="container">
        <div class="row text-muted">
            <div class="col-md-2 text-center text-md-start">Связь с нами</div>
            <div class="col-md-2 text-center text-md-start">Помощь</div>
            <div class="col-md-2 text-center text-md-start">О компании</div>
            <div class="col-md-6 text-center text-md-start"></div>
            <div class="col-md-2 text-center text-md-start"><p><a href="mailto:Sezon@mail.ru">Sezon@mail.ru</a></p></div>
            <div class="col-md-2 text-center text-md-start">
                <div>
                    <span class=”phone-small”>
                    <a href=”tel:+79999999999>+7 (999)</span> 999-99-99</a>
                </div>
            </div>
            <div class="col-md-2 text-center text-md-start"><p><a href="<?= Url::toRoute(['site/about']) ?>">О нас</a></p></div>
            <div class="col-md-2 text-center text-md-start"><p><a href="<?= Url::toRoute(['site/oferta']) ?>">Публичная оферта</a></p></div>
            <div class="col-md-2 text-center text-md-start"><p><a href="<?= Url::toRoute(['site/place']) ?>">Мы находимся тут</a></p></div>
            <div class="col-md-2 text-center text-md-end"><?= Yii::powered() ?></div>
        </div>
    </div>
</footer>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
