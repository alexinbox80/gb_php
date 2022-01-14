<?php
session_start();
require_once "../config.php";
require_once "function.php";

if ($_POST['enter']) {
    $login = $_POST['login'] ? strip_tags($_POST['login']) : "";
    $passwd = $_POST['passwd'] ? strip_tags($_POST['passwd']) : "";

    if (isValidMd5($passwd)) {

        $passwdMd5 = makePasswdMd5($login, $passwd);

    } else {

        //$passwd = md5($passwd);
        $passwdMd5 = makePasswdMd5($login, md5($passwd));

    }

    //echo "plain " . $passwd."<br>";
    //echo "md5 " . $passwdMd5."<br>";

    $sql = "SELECT id, user_id, role FROM users WHERE login = '$login' AND passwd = '$passwdMd5'";

    //echo $sql . "<br>";

    $res = mysqli_query($connect, $sql);

    if (mysqli_num_rows($res) > 0) {

        // $userId = getGUID();
        $row = mysqli_fetch_array($res);
        $userId = $row['user_id'];
        $role = $row['role'];

        $user['login'] = $login;
        $user['passwd'] = $passwd;
        $user['userId'] = $userId;
        $user['role'] = $role;

        setSiteSession('user', $user);

        $_SESSION['loginSuccess'] = true;
        $_SESSION['errorMessage'] = '';

        setSiteCookie('site', $user);

        //$header = "Location: ../index.php";

        $sql = "SELECT sum(count) FROM cart WHERE user_id = '" . $user['userId'] . "'";

        $res = mysqli_query($connect, $sql);
        $cartCount = mysqli_fetch_row($res);

        $_SESSION['cartCount'] = $cartCount[0];

        $header = "Location: " . $_SERVER['HTTP_REFERER'];
    } else {
        $_SESSION['loginSuccess'] = "err";
        $_SESSION['errorMessage'] = "Введен неверный логин или пароль!";

        //$header = "Location: ../index.php";
        $header = "Location: " . $_SERVER['HTTP_REFERER'];
    }
}

if ($_POST['exit']) {
    $_SESSION = array();
    //$header = "Location: ../index.php";
    $header = "Location: " . $_SERVER['HTTP_REFERER'];
}

header($header);

?>

