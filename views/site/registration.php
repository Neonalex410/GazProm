<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$form = ActiveForm::begin(); ?>

<div class="log-up">
    <img src="../web/img/log.png" alt="">

    <div class="input-box">
        <?= $form->field($registration_model, 'username') ?>
    </div>

    <div class="input-box">
        <?= $form->field($registration_model, 'password')->passwordInput() ?>
    </div>

    <div class="input-box">
        <?= $form->field($registration_model, 're_password')->passwordInput() ?>
    </div>

    <?= Html::submitButton('Зарегистрироваться', ['class' => 'btn btn-success']) ?>
</div>
<?php ActiveForm::end(); ?>
