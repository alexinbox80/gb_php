<?php
function getGUID()
{
    if (function_exists('com_create_guid')) {
        $guid = com_create_guid();

    } else {

        mt_srand((double)microtime() * 10000);//optional for php 4.2.0 and up.
        $charid = strtoupper(md5(uniqid(rand(), true)));
        $hyphen = chr(45);// "-"
        $uuid =
            substr($charid, 0, 8) . $hyphen .
            substr($charid, 8, 4) . $hyphen .
            substr($charid, 12, 4) . $hyphen .
            substr($charid, 16, 4) . $hyphen .
            substr($charid, 20, 12);

        $guid = strtolower($uuid);
    }

    return $guid;
}

function isValidMd5($md5 = '')
{
    return preg_match('/^[a-f0-9]{32}$/', $md5);
}

function makePasswdMd5($login, $passwd) {
    $salt = "zyjdfhm";
    return strrev(md5($salt) . $passwd . md5($login));
}

function setSiteSession($name, $arr) {

    $_SESSION[$name] = $arr;

    return true;
}

function setSiteCookie($name, $arr) {

    $cookieUser = base64_encode(serialize($arr));
    $err = setcookie($name, $cookieUser, time() + 3600 * 24 * 365, "/");

    return $err;
}

function getSiteCookie($name) {

    $cookieUser = $_COOKIE[$name];
    return unserialize(base64_decode($cookieUser));

}

?>