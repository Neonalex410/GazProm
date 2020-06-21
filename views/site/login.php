<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$form = ActiveForm::begin(); ?>

<div class="log-in">
    <img src="../web/img/log.png" alt="">

    <div class="input-box">
        <?= $form->field($login_model, 'username') ?>
    </div>

    <div class="input-box">
        <?= $form->field($login_model, 'password')->passwordInput() ?>
    </div>

    <div class="remember">
        <input type="checkbox">
        <span>Запомнить меня</span>
    </div>
    <?= Html::submitButton('Войти') ?>
    <hr>
    <span>Забыли пароль?</span>
    <span><?= Html::a('Регистрация', Url::toRoute('registration')) ?></span>
</div>
<?php ActiveForm::end()?>