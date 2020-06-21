<?php
?>
<div class="w_post">
    <div class="header_post">
        <img src="./img/log.png" alt="">
        <span><?= $sentence->getName($sentence->id_user) ?></span>
    </div>
    <h1><?= $sentence->title ?></h1>
    <div class="hashtag">#dsfsdf #fdsf #fdsfsdf</div>
    <p><?= $sentence->text ?></p>
    <div class="footer_post">
        <img src="./img/fire.png" alt="">
        <span><?= $sentence->agree ?></span>
        <p>Опубликовано <?= $sentence->date ?></p>
    </div>
    <div class="commenting">
        <textarea placeholder="Введите ваше сообщение"></textarea>
        <button>Отправить</button>
    </div>
    <div class="comment">
        <div>
            <img src="./img/log.png" alt="">
            <h3>Анатолий Овечкин</h3>
        </div>
        <p>Lorem, ipsum  dolor sit amet consectetur adipisicing elit. Eum aliquid, ipsum nam</p>
    </div>
    <div class="comment">
        <div>
            <img src="./img/log.png" alt="">
            <h3>Анатолий Овечкин</h3>
        </div>
        <p>Lorem, ipsum  dolor sit amet consectetur adipisicing elit. Eum aliquid, ipsum nam</p>
    </div>
    <div class="comment">
        <div>
            <img src="./img/log.png" alt="">
            <h3>Анатолий Овечкин</h3>
        </div>
        <p>Lorem, ipsum  dolor sit amet consectetur adipisicing elit. Eum aliquid, ipsum nam</p>
    </div>
</div>
