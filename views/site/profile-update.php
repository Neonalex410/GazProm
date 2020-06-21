<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$form = ActiveForm::begin(); ?>
<?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
<div class="change">
    <?= $form->field($profile_model, 'id_branch')->dropDownList($array_branch) ?>
    <?= $form->field($profile_model, 'name') ?>
    <?= $form->field($profile_model, 'image')->fileInput() ?>
    <button>Сохранить</button>
</div>
<?php ActiveForm::end() ?>
