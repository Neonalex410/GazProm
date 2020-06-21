<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

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
    <div class="header">
        <a href="<?= Url::toRoute(['index']) ?>">
            <img src="../web/img/logo.png" alt="">
        </a>
        <?php
            if (!Yii::$app->user->isGuest){
                ?>
                <div>
                    <?= Html::a('Создать предложение', Url::toRoute(['sentence-create', 'id' => Yii::$app->user->getId()]), ['class' => 'button']); ?>
                    <?= Html::a('Профиль', Url::toRoute(['profile']), ['class' => 'button']); ?>
                    <?php
                    echo Html::beginForm(['/site/logout'], 'post', ['class' => 'button']);
                    echo Html::submitButton('ВЫХОД');
                    echo Html::endForm() ?>
                </div>
                <?php
            }
        ?>
    </div>
    <?= $content ?>

    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>
<?php
