<?php
session_start();
include_once "../config.php";
require_once "function.php";

$siteCook = getSiteCookie('site');

$img_small = "../public/images/small/";

function drawTable($res, $img_small, $siteCook)
{
    ?>
    <link href="../public/css/main.css" rel="stylesheet">
    <header class="header">
        <div class="content__cart">
            <?php
            if ($_SESSION['loginSuccess'] == true && $_SESSION['user']['login']):?>
                <div class="login__done">
                    <div class="login_note">
                        <p>У Вас роль: <?= $_SESSION['user']['role'] == 0 ?
                                '<a href="../admin/">Администратор</a>' :
                                'Пользователь'; ?>
                        </p>
                    </div>
                    <div class="header__basket">
                        <?php
                        if (!empty($_SESSION['cartCount'])):?>
                            <div class="cart__count">
                                <?= $_SESSION['cartCount']; ?>
                            </div>
                        <?php
                        endif;
                        ?>
                        <a href="cart.php?action=list">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="29" viewBox="0 0 32 29"
                                 fill="none">
                                <path d="M26.2009 29C25.5532 28.9738 24.9415 28.6948 24.4972 28.2227C24.0529 27.7506 23.8114 27.1232 23.8245 26.475C23.8376 25.8269 24.1043 25.2097 24.5673 24.7559C25.0303 24.3022 25.6527 24.048 26.301 24.048C26.9493 24.048 27.5717 24.3022 28.0347 24.7559C28.4977 25.2097 28.7644 25.8269 28.7775 26.475C28.7906 27.1232 28.549 27.7506 28.1047 28.2227C27.6604 28.6948 27.0488 28.9738 26.401 29H26.2009ZM6.75293 26.32C6.75293 25.79 6.91011 25.2718 7.20459 24.8311C7.49907 24.3904 7.91764 24.0469 8.40735 23.844C8.89705 23.6412 9.43594 23.5881 9.95581 23.6915C10.4757 23.7949 10.9532 24.0502 11.328 24.425C11.7028 24.7998 11.9581 25.2773 12.0615 25.7972C12.1649 26.317 12.1118 26.8559 11.9089 27.3456C11.7061 27.8353 11.3626 28.2539 10.9219 28.5483C10.4812 28.8428 9.96304 29 9.43298 29C9.08087 29.0003 8.73212 28.9311 8.40674 28.7966C8.08136 28.662 7.78569 28.4646 7.53662 28.2158C7.28755 27.9669 7.09001 27.6713 6.9552 27.3461C6.82039 27.0208 6.75098 26.6721 6.75098 26.32H6.75293ZM10.553 20.686C10.2935 20.6868 10.0409 20.6024 9.83411 20.4457C9.62727 20.2891 9.47758 20.0689 9.40796 19.819L4.57495 2.36401H1.18201C0.868521 2.36401 0.567859 2.23947 0.346191 2.01781C0.124523 1.79614 0 1.49549 0 1.18201C0 0.868519 0.124523 0.567873 0.346191 0.346205C0.567859 0.124537 0.868521 5.81268e-06 1.18201 5.81268e-06H5.46301C5.7225 -0.00080736 5.97504 0.0837201 6.18176 0.240568C6.38848 0.397416 6.53784 0.617884 6.60693 0.868006L11.4399 18.323H24.6179L29.001 8.27501H14.401C14.2428 8.27961 14.0854 8.25242 13.9379 8.19507C13.7904 8.13771 13.6559 8.05134 13.5424 7.94108C13.4288 7.83082 13.3386 7.69891 13.277 7.55315C13.2154 7.40739 13.1836 7.25075 13.1836 7.0925C13.1836 6.93426 13.2154 6.77762 13.277 6.63186C13.3386 6.4861 13.4288 6.35419 13.5424 6.24393C13.6559 6.13367 13.7904 6.0473 13.9379 5.98994C14.0854 5.93259 14.2428 5.90541 14.401 5.91001H30.814C31.0097 5.90996 31.2022 5.95866 31.3744 6.05172C31.5465 6.14478 31.6928 6.27926 31.7999 6.44301C31.9078 6.60729 31.9734 6.79569 31.9908 6.99145C32.0083 7.18721 31.9771 7.38424 31.9 7.565L26.495 19.977C26.4026 20.1876 26.251 20.3668 26.0585 20.4927C25.866 20.6186 25.641 20.6858 25.411 20.686H10.553Z"
                                      fill="black"/>
                            </svg>
                        </a>
                    </div>
                    <form action="login.php" method="post">
                        <label for="form__exit">Здравствуйте: <?= $_SESSION['user']['login']; ?></label>
                        <input id="form__exit" type="submit" value="Выйти" name="exit">
                    </form>
                </div>
            <?php
            else:
                if ($_SESSION['loginSuccess'] == 'err'):?>
                    <div id="login__err" class="login__err">
                        <?= $_SESSION['errorMessage']; ?>
                    </div>
                    <?php
                    $_SESSION = array();

                endif;
                ?>
                <div class="login__form">
                    <div class="header__registration">
                        <a href="registration.php">Регистрация</a>
                    </div>
                    <form action="login.php" method="post">
                        <label for="form__login">Логин</label>
                        <input id="form__login" name="login" type="text" value="<?= $siteCook['login']; ?>">
                        <label for="form__passwd">Пароль</label>
                        <input id="form__passwd" name="passwd" type="password" value="<?= $siteCook['passwd']; ?>">
                        <input type="submit" value="Войти" name="enter">
                    </form>
                </div>
            <?php
            endif;
            ?>
        </div>
    </header>
    <a class="content__cart crumbs__cart" href="<?= ("../index.php"); ?>">Вернуться на главную</a>
    <div class="content__cart">
        <button class="delete" onclick="del2cart('<?= $_SESSION['user']['userId']; ?>');">delete cart</button>
        <div class="cart__header">
            <div class="cart__id">
                ID
            </div>
            <div class="cart__pics">
                picture
            </div>
            <div class="cart__title">
                title
            </div>
            <div class="cart__name">
                user&nbsp;name
            </div>
            <div class="cart__email">
                user&nbsp;email
            </div>
            <div class="cart__time_add">
                add&nbsp;time
            </div>
            <div class="cart__price">
                price
            </div>
            <div class="cart__bcount">
                count
            </div>
            <div class="cart__tprice">
                full&nbsp;price
            </div>
            <div class="cart__button">
                delete&nbsp;item
            </div>
        </div>

        <?php
        $totalPrice = 0;
        while ($data = mysqli_fetch_assoc($res)):?>
            <?php //print_r($data);
            $totalPrice += $data['tprice'];
            ?>
            <div class="cart__row">
                <div class="cart__id">
                    <?= $data['id']; ?>
                </div>
                <div class="cart__pics">
                    <img class="cart__img" src="<?= ($img_small . $data['img']); ?>" alt="">
                </div>
                <div class="cart__title">
                    <?= $data['title']; ?>
                </div>
                <div class="cart__name">
                    <?= $data['name']; ?>
                </div>
                <div class="cart__email">
                    <?= $data['email']; ?>
                </div>
                <div class="cart__time_add">
                    <?= date("d.m.Y H:i:s", $data['time_add']); ?>
                </div>
                <div class="cart__price">
                    <?= $data['price']; ?>
                </div>
                <div class="cart__bcount">
                    <?= $data['count']; ?>
                </div>
                <div class="cart__tprice">
                    <?= $data['tprice']; ?>
                </div>
                <div class="cart__button">
                    <button class="delete" onclick="del2good(<?= $data['id']; ?>)">delete</button>
                </div>
            </div>
        <?php
        endwhile;
        ?>
        <div class="cart__tprice">
            <p class="cart__tp">Total basket price: <?= $totalPrice; ?> units</p>
        </div>
        <button class="delete" onclick="del2cart('<?= $_SESSION['user']['userId']; ?>');">delete cart</button>
        <button class="send" onclick="" disabled>Оформить заказ</button>
    </div>
    <a class="content__cart" href="<?= ("../index.php"); ?>">Вернуться на главную</a>
    <?php
}

switch ($_GET['action']) {
    case 'add':

        $cart['user_id'] = $_SESSION['user']['userId'];
        $cart['good_id'] = $_GET['good_id'] ? (int)strip_tags($_GET['good_id']) : "";
        $cart['count'] = 1;
        $cart['time_add'] = time();

        $sql = "SELECT id FROM cart WHERE good_id = '" . $cart['good_id'] . "'AND user_id = '" . $cart['user_id'] . "'";

        $res = mysqli_query($connect, $sql);

        if (!(mysqli_num_rows($res) > 0)) {
            // insert

            $sql = "INSERT INTO cart (user_id, good_id, count, time_add) 
                    VALUES ( '" . $cart['user_id'] . "', " . $cart['good_id'] . ", " . $cart['count'] . ", " . $cart['time_add'] . " )";

            $res = mysqli_query($connect, $sql);

        } else {
            // update
            $sql = "UPDATE cart SET count = count + 1, time_add = " . time() . " WHERE good_id = " . $cart['good_id'] .
                " AND user_id = '" . $cart['user_id'] . "'";

            $res = mysqli_query($connect, $sql);
        }

        $sql = "SELECT sum(count) FROM cart WHERE user_id = '" . $cart['user_id'] . "'";

        $res = mysqli_query($connect, $sql);
        $cartCount = mysqli_fetch_row($res);

        $_SESSION['cartCount'] = $cartCount[0];

        header("Location: " . $_SERVER['HTTP_REFERER']);

        break;
    case 'list':

        $sql = "SELECT cart.id, cart.count, cart.time_add, goods.title, goods.price, (cart.count * goods.price) AS tprice, goods.img, users.name, users.email 
                FROM cart
                INNER JOIN goods ON cart.good_id = goods.id
                INNER JOIN users ON cart.user_id = users.user_id 
                WHERE cart.user_id = '" . $_SESSION['user']['userId'] . "'
                ORDER BY tprice";

        $res = mysqli_query($connect, $sql);


        //if (!empty($_SESSION['user']['userId'])) {
        if (mysqli_num_rows($res) > 0) {
            drawTable($res, $img_small, $siteCook);
        } else {
            header("Location: ../index.php");
        }

        break;
    case 'delcart':
        $user_id = $_GET['user_id'] ? strip_tags($_GET['user_id']) : "";

        $sql = "DELETE FROM cart WHERE user_id = '" . $user_id . "'";

        $res = mysqli_query($connect, $sql);

        $sql = "SELECT sum(count) FROM cart WHERE user_id = '" . $user_id . "'";

        $res = mysqli_query($connect, $sql);
        $cartCount = mysqli_fetch_row($res);

        $_SESSION['cartCount'] = $cartCount[0];

        header("Location: ../index.php");

        break;
    case 'delgood':
        $good_id = $_GET['good_id'] ? (int)strip_tags($_GET['good_id']) : "";

        $sql = "DELETE FROM cart WHERE id = $good_id";

        $res = mysqli_query($connect, $sql);

        $sql = "SELECT cart.id, cart.count, cart.time_add, goods.title, goods.price, (cart.count * goods.price) AS tprice, goods.img, users.name, users.email 
                FROM cart
                INNER JOIN goods ON cart.good_id = goods.id
                INNER JOIN users ON cart.user_id = users.user_id 
                WHERE cart.user_id = '" . $_SESSION['user']['userId'] . "'
                ORDER BY tprice";
        $res = mysqli_query($connect, $sql);

        $sqlCount = "SELECT sum(count) FROM cart WHERE user_id = '" . $_SESSION['user']['userId'] . "'";

        $resCount = mysqli_query($connect, $sqlCount);
        $cartCount = mysqli_fetch_row($resCount);

        $_SESSION['cartCount'] = $cartCount[0];

        drawTable($res, $img_small, $siteCook);

        break;
    default:
        echo "wrong action<br>";
}

?>

<script src="../public/js/main.js"></script>
