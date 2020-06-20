<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$form = ActiveForm::begin(); ?>
<?= $form->field($profile_model, 'name') ?>
<?= $form->field($profile_model, 'image')->fileInput() ?>
<?= $form->field($profile_model, 'id_branch')->dropDownList($array_branch) ?>
<?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
<?php ActiveForm::end() ?>
