<div class="main">
    <div class="content">

        <h1>Все предложения</h1>

        <div class="type">
            <h2>Общий</h2>
            <h2>Филиал </h2>
        </div>

        <div class="hr"></div>

        <div class="filters">
            <div class="filter">
                <div>Всё</div>
                <div>Лучшее</div>
            </div>
            <div class="filter">
                <div>Неделя</div>
                <div>Месяц</div>
                <div>Год</div>
            </div>
        </div>

        <?php

        use yii\helpers\Html;
        use yii\helpers\Url;

        foreach ($sentence as $el){
                ?>
                <div class="post">
                    <div class="post-header">
                        <img src="" alt="">
                        <h3><?= $el->getName($el->id_user) ?></h3>
                    </div>
                    <h2><?= Html::a($el->title, Url::toRoute(['watch-sentence', 'id' => $el->id])) ?></h2>
                    <div class="hashtag">#жарко #кофе</div>
                    <p><?= $el->text ?></p>
                    <div class="post-footer">
                        <img src="../web/img/fire.png" alt="">
                        <span><?= $el->agree ?></span>
                        <span>Опубликовано <?= $el->date ?></span>
                    </div>
                </div>
                <?php
            }
        ?>
    </div>

    <div class="best">
        <h2>Лучшие пользователи</h2>
        <?php
        $count = 0;
            foreach ($user as $el){
                $count++;
                ?>
                <div>
                    <h5><?= '№' . $count . ' - ' . $el->username ?></h5>
                </div>
                <?php
            }
        ?>
    </div>

</div>

<script src="./js/main.js"></script>