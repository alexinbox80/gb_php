<?php
// 5. *Написать CRUD-блок для управления выбранным модулем через единую функцию
// (doFeedbackAction()).

include_once "config.php";

$img_small = "public/images/small/";

$sql = "SELECT * FROM goods";
$res = mysqli_query($connect, $sql);

?>

<style type="text/css">
    .content {
        padding: 0 calc(50% - 321px);
    }

    .header {
        margin-top: 10px;
        text-align: center;
        margin-bottom: 20px;
    }

    .header a {
        text-decoration: none;
        color: black;
    }

    .header a:active {
        color: black;
    }

    .header a:visited {
        color: black;
    }

    .content__item {
        display: flex;
        justify-content: space-around;
        margin-bottom: 20px;
    }

    .button {
        display: block;
        margin: 0 auto;
        margin-bottom: 20px;
    }
</style>
<div class="content">
    <?php

    while ($data = mysqli_fetch_assoc($res)):?>
        <h2 class="header">
            <a href="engine/goods.php?img_id=<?= $data['id'];?>">
                <?= $data['title'];?>
            </a>
        </h2>
        <div class="content__item">
            <div class="content__left">
                <a href="engine/goods.php?img_id=<?= $data['id'];?>">
                    <img src="<?= ($img_small . $data['img']);?>" alt="<?= $data['title'];?>">
                </a>
            </div>
            <div class="content__right">
                <p class="content__info">
                    <?= $data['short_info'];?>
                </p>
                <p class="content__price">
                    price: <?= $data['price'];?>
                </p>
            </div>
        </div>
        <button class="button">
            Добавть товар в корзину
        </button>
        <hr>
    <?php
    endwhile;
    ?>
</div>
