<?php
include_once "../config.php";

$id = (int)$_GET['img_id'];

if (!$id) {
    $id = 1;
}

$img_big = "../public/images/big/";

$sql = "SELECT * FROM goods WHERE id=$id";
$res = mysqli_query($connect, $sql);

$data = mysqli_fetch_array($res);

?>
<style type="text/css">
    .content {
        padding: 0 calc(50% - 400px);
    }

    .header {
        margin-top: 10px;
        text-align: center;
        margin-bottom: 20px;
    }

    .content__item {
        display: flex;
        justify-content: space-around;
        margin-bottom: 20px;
    }

    .content__right {
        padding-left: 36px;
    }

    .button {
        display: block;
        margin: 0 auto;
        margin-bottom: 20px;
    }
</style>

<div class="content">
    <h2 class="header"><?= $data['title'];?></h2>
    <div class="content__item">
        <div class="content__left">
            <img src="<?= ($img_big . $data['img']);?>" alt="<?= $data['title'];?>">
        </div>
        <div class="content__right">
            <p class="content__info">
                <?= $data['full_info'];?>
            </p>
            <p class="content__price">
                price: <?= $data['price'];?>
            </p>
        </div>
    </div>
    <button class="button">
        Добавть товар в корзину
    </button>
</div>

<a href="<?= $_SERVER['HTTP_REFERER'];?>">Вернуться оборатно</a>
