<?php

    use yii\helpers\Html;
    use yii\helpers\Url;

echo Html::a('Новый филиал', Url::toRoute(['branch-create']), ['class' => 'btn btn-success']);
?>
<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Адрес</th>
        <th scope="col">Изменить</th>
        <th scope="col">Удалить</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($branch as $el){
            ?>
            <tr>
                <th scope="row"><?= $el->id ?></th>
                <td><?= $el->address ?></td>
                <td><?= Html::a('Изменить', Url::toRoute(['branch-update','id' => $el->id])) ?></td>
                <td><?= Html::a('Удалить', Url::toRoute(['branch-delete','id' => $el->id])) ?></td>
            </tr>
            <?php
        }
    ?>
    </tbody>
</table>
