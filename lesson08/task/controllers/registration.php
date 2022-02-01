<?php
session_start();

require_once "../models/function.php";
require_once "../config/database.php";

if ($_POST['registration'] == 'login') {

    $firstName = $_POST['firstName'] ? strip_tags($_POST['firstName']) : "";
    $lastName = $_POST['lastName'] ? strip_tags($_POST['lastName']) : "";
    $email = $_POST['email'] ? strip_tags($_POST['email']) : "";
    $sex = $_POST['sex'] ? strip_tags($_POST['sex']) : "";
    $login = $_POST['login'] ? strip_tags($_POST['login']) : "";
    $passwd = $_POST['passwd'] ? strip_tags($_POST['passwd']) : "";

    if (($firstName != '') && ($lastName != '') && ($email != '') && ($login != '') && ($passwd != '')) {

        $passwdMd5 = makePasswdMd5($login, md5($passwd));

        if (!(login($connect, $login, $passwdMd5))) {

            $user['firstName'] = $firstName;
            $user['lastName'] = $lastName;
            $user['email'] = $email;
            $user['sex'] = $sex;
            $user['login'] = $login;
            $user['passwd'] = $passwdMd5;
            $user['userId'] = getGUID();
            $user['role'] = $userRights['user'];

            setSiteSession('user', $user);

            $_SESSION['loginSuccess'] = insertUser($connect, $user);
            $_SESSION['errorMessage'] = "Пользователь зарегистрирован!";

            $jsonAnswer = makeJsonAnswer($_SESSION['loginSuccess'], $_SESSION['errorMessage'], 'index.php', $user);
        } else {
            $_SESSION['loginSuccess'] = false;
            $_SESSION['errorMessage'] = "The specified user exists!";

            $jsonAnswer = makeJsonAnswer($_SESSION['loginSuccess'], $_SESSION['errorMessage'], '', NULL);
        }

    } else {
        $_SESSION['loginSuccess'] = false;
        $_SESSION['errorMessage'] = "Not all form fields are filled!";

        $jsonAnswer = makeJsonAnswer($_SESSION['loginSuccess'], $_SESSION['errorMessage'], '', NULL);
    }
}

//echo json_encode($_SESSION);

echo $jsonAnswer;
