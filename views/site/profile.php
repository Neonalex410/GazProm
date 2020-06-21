<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>
<div class="profile-block">
    <h1>Личный кабинет</h1>

    <div class="profile">
        <div class="prof-head">
            <div>
                <img src="../web/uploads/<?= $user->image ?>" alt="">
                <h3><?= $user->username ?></h3>
            </div>
            <div>
                <span class="rating"><?= $user->rating ?></span>
                <span><?= $user->getTitleBranch($user->id_branch) ?></span>
                <span><?= $user->name ?></span>
                <span>Веб-разработчик</span>
                <?= Html::a('Изменить', Url::toRoute(['profile-update', 'id'=>Yii::$app->user->getId()]), ['class' => 'btn btn-success']); ?>
            </div>
        </div>
        <h4>Достижения</h4>
        <div class="prof-foot">
            <img src="./img/log.png" alt="">
            <img src="./img/log.png" alt="">
            <img src="./img/log.png" alt="">
            <img src="./img/log.png" alt="">
            <img src="./img/log.png" alt="">
            <img src="./img/log.png" alt="">
            <img src="./img/log.png" alt="">
            <img src="./img/log.png" alt="">
        </div>
    </div>
</div>
