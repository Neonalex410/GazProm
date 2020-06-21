<?php


use yii\helpers\Html;
use yii\widgets\ActiveForm;

$form = ActiveForm::begin(); ?>

<div class="sentence">
    <?= $form->field($sentence_model, 'title') ?>
    <?= $form->field($sentence_model, 'text')->textarea(['rows' => '5']) ?>
    <?= Html::submitButton('Создать', ['class' => 'btn btn-success']) ?>
</div>
<?php ActiveForm::end() ?>

