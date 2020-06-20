<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$form = ActiveForm::begin(); ?>
<?= $form->field($branch_model, 'address') ?>
<?= Html::submitButton('Создать', ['class' => 'btn btn-success']) ?>
<?php ActiveForm::end(); ?>
