<?php

use yii\helpers\Html;
use yii\helpers\Url;

echo Html::a('Заполнить данные', Url::toRoute(['profile-update', 'id'=>Yii::$app->user->getId()]), ['class' => 'btn btn-success']);