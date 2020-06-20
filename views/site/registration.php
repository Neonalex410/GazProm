<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$form = ActiveForm::begin(); ?>
<?= $form->field($registration_model, 'username') ?>
<?= $form->field($registration_model, 'password')->passwordInput() ?>
<?= $form->field($registration_model, 're_password')->passwordInput() ?>
<?= Html::submitButton('Создать', ['class' => 'btn btn-success']) ?>
<?php ActiveForm::end(); ?>
