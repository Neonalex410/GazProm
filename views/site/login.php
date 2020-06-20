<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$form = ActiveForm::begin(); ?>
<?= $form->field($login_model, 'username') ?>
<?= $form->field($login_model, 'password')->passwordInput() ?>
<?= Html::submitButton('Войти', ['class' => 'btn btn-success']) ?>
<?php ActiveForm::end()?>
