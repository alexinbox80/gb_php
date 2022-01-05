<?php
session_start();
require_once "../config.php";
require_once "function.php";

if ($_POST['registration']) {
    $name = $_POST['name'] ? strip_tags($_POST['name']) : "";
    $email = $_POST['email'] ? strip_tags($_POST['email']) : "";
    $login = $_POST['login'] ? strip_tags($_POST['login']) : "";
    $passwd = $_POST['passwd'] ? strip_tags($_POST['passwd']) : "";
}

$sql = "SELECT id FROM users WHERE login = '$login' OR email = '$email'";

$res = mysqli_query($connect, $sql);
//$row = mysqli_fetch_array($res);

//if is not void, means that this username exists
if (!(mysqli_num_rows($res) > 0)) {
    //InsertData

    if (($name != '') && ($email != '') && ($login != '') && ($passwd != '')) {

        $user['login'] = $login;
        $user['passwd'] = $passwd;
        $user['userId'] = getGUID();
        $user['role'] = 1;

        setSiteSession('user', $user);
        //setSiteCookie('site', $user);

        //$passwd = md5($passwd);
        $passwdMd5 = makePasswdMd5($login, md5($passwd));

        $sql = "INSERT INTO users (user_id, name, login, passwd, role, email, time_create) 
        VALUES ( '" . $user['userId'] . "', '$name', '$login', '$passwdMd5', " . $user['role'] . ", '$email' ," . time() . " )";

        //echo $sql . "<br>";

        $res = mysqli_query($connect, $sql);

        $_SESSION['loginSuccess'] = true;
        $_SESSION['errorMessage'] = 'Пользователь зарегистрирован!';
    } else {
        $_SESSION['loginSuccess'] = false;
        $_SESSION['errorMessage'] = "Не все поля заполнены!";
    }

} else {
    $_SESSION['loginSuccess'] = false;
    $_SESSION['errorMessage'] = "Указанный пользователь существует!";
}

?>

<link href="../public/css/main.css" rel="stylesheet">
<header class="content">
    <h1>Форма для регистрации на сайте.</h1>
</header>
<section class="reg__err content">
    <?php

    if ($_SESSION['loginSuccess'] == false && $_POST['registration']) {

        echo $_SESSION['errorMessage'] . "<br>";

        $_SESSION['errorMessage'] = "";

    };
    ?>
</section>
<section class="content">
    <div class="reg__note">
        <?php

        if ($_SESSION['loginSuccess'] == true && $_SESSION['user']['login']) {
            echo $_SESSION['errorMessage'] . "<br>";

        };
        ?>
    </div>
    <div class="form__content">
        <?php
        if (!($_SESSION['loginSuccess'] == true && $_SESSION['user']['login'])):?>
            <form class="form__registration" action="registration.php" method="post">
                <input class="form__reg-input" type="text" placeholder="Введите имя" name="name" value="<?= $name; ?>">
                <br>
                <input class="form__reg-input" type="text" placeholder="Введите имаил" name="email"
                       value="<?= $email; ?>">
                <br>
                <input class="form__reg-input" type="text" placeholder="Введите логин" name="login"
                       value="<?= $login; ?>">
                <br>
                <input class="form__reg-input" type="text" placeholder="Введите пароль" name="passwd"
                       value="<?= $passwd; ?>">
                <br>
                <div class="reg__but">
                    <input class="form__reg-submit" type="submit" name="registration" value="Зарегистрироваться">
                    <input class="form__reg-submit" type="button" value="Отмена" onclick="location.href='../index.php'">
                </div>
            </form>
        <?php
        else:?>
            <a href="<?= ("../index.php"); ?>">Вернуться на главную</a>
        <?php
        endif;
        ?>
    </div>
</section>
<footer class="content">
</footer>