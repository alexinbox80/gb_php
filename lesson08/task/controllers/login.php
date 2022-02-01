<?php
session_start();

require_once "../models/function.php";
require_once "../config/database.php";

if ($_POST['enter']) {
    $login = $_POST['login'] ? strip_tags($_POST['login']) : "";
    $passwd = $_POST['passwd'] ? strip_tags($_POST['passwd']) : "";
    $remember = $_POST['remember'] ? strip_tags($_POST['remember']) : "";

    if (isValidMd5($passwd)) {

        $passwdMd5 = makePasswdMd5($login, $passwd);

    } else {

        //$passwd = md5($passwd);
        $passwdMd5 = makePasswdMd5($login, md5($passwd));

    }

    if (login($connect, $login, $passwdMd5) > 0) {

        $loginData = getLoginData($connect, $login, $passwdMd5);

        $userId = $loginData['user_id'];
        $role = $loginData['role'];

        $user['login'] = $login;
        $user['passwd'] = md5($passwd);
        $user['userId'] = $userId;
        $user['role'] = $role;

        setSiteSession('user', $user);

        $_SESSION['loginSuccess'] = true;
        $_SESSION['errorMessage'] = '';

        if ($remember == 'on') {
            $user['remember'] = $remember;
            setSiteCookie('site', $user);
        } else {
            unsetSiteCookie('site');
        }

        $jsonAnswer = makeJsonAnswer($_SESSION['loginSuccess'], $_SESSION['errorMessage'], '../public/index.php', $user);

    } else {
        $_SESSION['loginSuccess'] = false;
        $_SESSION['errorMessage'] = "Wrong user login or password!";

        $jsonAnswer = makeJsonAnswer($_SESSION['loginSuccess'], $_SESSION['errorMessage'], '', NULL);
    }

}

//echo json_encode($_POST);

echo $jsonAnswer;

