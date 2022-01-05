<?php
session_start();
?>
<link href="../public/css/main.css" rel="stylesheet">
<header class="header">
    <div class="content__admin">

        <?php
        if ($_SESSION['loginSuccess'] == true && $_SESSION['user']['login']):?>
            <div class="login__done">
                <div class="login_note">
                    <p>У Вас роль: <?= $_SESSION['user']['role'] == 0 ? "Администратор" : "Пользователь"; ?>
                    </p>
                </div>

                <a href="<?= ("../index.php"); ?>">Вернуться на главную</a>
            </div>
        <?php
        endif;
        ?>
    </div>
</header>

<?php

if (isset($_SESSION['user']) && $_SESSION['user']['role'] == 0) {

    include_once "../config.php";

    $img_small = "../public/images/small/";
    $img_big = "../public/images/big/";

    $sql = "SELECT * FROM goods";
    $res = mysqli_query($connect, $sql);

    if (isset($_GET['action'])) {
        switch ($_GET['action']) {
            case "add":
                $action = $_GET['action'];
                break;
            case "edit":
                $action = $_GET['action'];
                if (isset($_GET['good_id'])) {
                    $good_id = (int)$_GET['good_id'];
                }
                break;
            case "del":
                $action = $_GET['action'];
                if (isset($_GET['good_id'])) {
                    $good_id = (int)$_GET['good_id'];
                }
                break;
            default:
                echo "Wrong action!<br>";
        }
    }

    function drawTable($res)
    {
        ?>
        <div class="content__admin">
            <button class="add" onclick="add();">add goods</button>
            <div class="table">
                <div class="id">
                    id
                </div>
                <div class="title">
                    title
                </div>
                <div class="price">
                    price
                </div>
                <div class="pics">
                    image
                </div>
                <div class="short_info">
                    short_info
                </div>
                <div class="full_info">
                    full_info
                </div>
                <div class="button">
                    button
                </div>
            </div>

            <?php
            while ($data = mysqli_fetch_assoc($res)):?>

                <div class="admin__table">
                    <div class="id">
                        <?= $data['id']; ?>
                    </div>
                    <div class="title">
                        <?= $data['title']; ?>
                    </div>
                    <div class="price">
                        <?= $data['price']; ?>
                    </div>
                    <div class="pics">
                        <?= $data['img']; ?>
                    </div>
                    <div class="short_info">
                        <?= $data['short_info']; ?>
                    </div>
                    <div class="full_info">
                        <?= $data['full_info']; ?>
                    </div>
                    <div class="admin__button">
                        <button class="admin__edit" onclick="edit(<?= $data['id']; ?>)">edit</button>
                        <button class="admin__delete" onclick="del(<?= $data['id']; ?>)">delete</button>
                    </div>
                </div>

            <?php
            endwhile;
            ?>
            <button class="add" onclick="add();">add goods</button>
        </div>
        <?php
    }

    function editTable($res, $todo)
    {
        if ($todo == "save") {
            while ($data = mysqli_fetch_assoc($res)):?>

                <form class="form__table content__admin" action="<?= $todo; ?>.php" method="POST">
                    <div class="id"><?= $data['id']; ?></div>

                    <input type="hidden" name="good_id" value="<?= $data['id']; ?>">
                    <input class="title" type="text" name="title" value="<?= $data['title']; ?>">
                    <input class="price" type="text" name="price" value="<?= $data['price']; ?>">

                    <input class="img" type="text" name="img" value="<?= $data['img']; ?>">
                    <textarea class="short_info" name="short_info"><?= $data['short_info']; ?></textarea>
                    <textarea class="full_info" name="full_info"><?= $data['full_info']; ?></textarea>

                    <button class="save">save</button>
                </form>

            <?php
            endwhile;
        } elseif ($todo == "new") {
            ?>
            <form class="form__table content__admin" action="<?= $todo; ?>.php" method="POST">

                <input class="title" type="text" name="title" placeholder="Input title">
                <input class="price" type="text" name="price" placeholder="Input price">

                <input class="img" type="text" name="img" placeholder="Input filename">
                <textarea class="short_info" name="short_info" placeholder="Input short info"></textarea>
                <textarea class="full_info" name="full_info" placeholder="Input full info"></textarea>

                <button class="save">add</button>
            </form>

            <?php
        }

    }

    switch ($action) {
        case "add":
            editTable($res = '', "new");
            break;
        case "edit":
            $sql = "SELECT * FROM goods WHERE id=$good_id";
            $res = mysqli_query($connect, $sql);
            editTable($res, "save");
            break;
        case "del":
            $sql = "DELETE FROM goods WHERE id=$good_id";
            $res = mysqli_query($connect, $sql);

            $sql = "SELECT * FROM goods";
            $res = mysqli_query($connect, $sql);

            drawTable($res);
            break;
        default:
            drawTable($res);
    }


} else {

    ?>
    <div class="content__admin">
        <h2>У Вас нет прав на добавление товаров в магазин!</h2>
    </div>
    <?php
}
?>
<div class="content__admin">
    <a href="../index.php">Вернуться оборатно</a>
</div>


<script src="../public/js/main.js"></script>
