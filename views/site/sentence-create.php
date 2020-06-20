<?php


use yii\helpers\Html;
use yii\widgets\ActiveForm;

$form = ActiveForm::begin(); ?>
<?= $form->field($sentence_model, 'title') ?>
<?= $form->field($sentence_model, 'text')->textarea(['rows' => '5']) ?>
<?= Html::submitButton('Создать', ['class' => 'btn btn-success']) ?>
<?php ActiveForm::end() ?>
