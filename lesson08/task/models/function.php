<?php

//require_once "../config/database.php";

function pageRender($pages, $name, $pageTitle, $siteUrl)
{

    $template = $pages[$name]['tpl'];
    $template = file_get_contents($template);

    foreach ($pages[$name] as $key => $value) {
        if ($key != "tpl") {
            $tpl = file_get_contents($value);
            $pattern = "{" . $key . "}";
            $template = str_replace($pattern, $tpl, $template);
        }
    }

    $template = str_replace('{TITLE}', $pageTitle, $template);
    $template = str_replace('{SITE_URL}', $siteUrl, $template);

    return $template;
}

function pageLogoutRender($content, $marker, $key, $pages, $name) {

    $tpl = $pages[$name]['_' . $key];

    $tpl = file_get_contents($tpl);

    $pattern = "{" . $marker . "}";
    $template = str_replace($pattern, $tpl, $content);

    return $template;
}

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

function makePasswdMd5($login, $passwd)
{
    $salt = "zyjdfhm";
    return strrev(md5($salt) . $passwd . md5($login));
}

function setSiteSession($name, $arr)
{

    $_SESSION[$name] = $arr;

    return true;
}

function getSiteSession($name)
{

    return $_SESSION[$name];
}

function setSiteCookie($name, $arr)
{

    $cookieUser = base64_encode(serialize($arr));
    $err = setcookie($name, $cookieUser, time() + 3600 * 24 * 365, "/");

    return $err;
}

function unsetSiteCookie($cookieName)
{
    $cookies = explode(';', $_SERVER['HTTP_COOKIE']);

    foreach($cookies as $cookie) {
        $parts = explode('=', $cookie);
        $name = trim($parts[0]);

        if ( $cookieName == $name) {
            setcookie($name, '', time() - 1000);
            setcookie($name, '', time() - 1000, '/');
        }
    }
}

function getSiteCookie($name)
{

    $cookieUser = $_COOKIE[$name];
    return unserialize(base64_decode($cookieUser));

}

function makeJsonAnswer($loginSuccess, $errorMessage, $urlPath, $user) {
    $jsonAnswer = array(
        'loginSuccess' => $loginSuccess,
        'errorMessage' => $errorMessage,
        'urlPath' => $urlPath,
        'userId' => $user['userId']
    );

    return json_encode($jsonAnswer);
}

function login($connect, $login, $passwdMd5)
{
    $sql = "SELECT id, user_id, role FROM users WHERE login = '$login' AND passwd = '$passwdMd5'";

    $res = mysqli_query($connect, $sql);

    return mysqli_num_rows($res);

    //return mysqli_fetch_array($res);
}

function getLoginData($connect, $login, $passwdMd5)
{
    $sql = "SELECT id, user_id, role FROM users WHERE login = '$login' AND passwd = '$passwdMd5'";
    $res = mysqli_query($connect, $sql);

    return mysqli_fetch_array($res);
}

function insertUser($connect, $user)
{

    $sql = "INSERT INTO users (user_id, lastName, firstName, email, sex, login, passwd, role, time_create) 
        VALUES ( '" . $user['userId'] . "',
                 '" . $user['lastName'] . "', 
                 '" . $user['firstName'] . "',
                 '" . $user['email'] . "',
                 '" . $user['sex'] . "',
                 '" . $user['login'] . "',
                 '" . $user['passwd'] . "',
                 '" . $user['role'] . "',
                 " . time() . " )";

    $res = mysqli_query($connect, $sql);

    return $res;
}

function getGoods($connect)
{
    $sql = "SELECT * FROM goods";

    $res = mysqli_query($connect, $sql);
    $goods = mysqli_fetch_all($res,MYSQLI_ASSOC);

    return $goods;
}

function getGood($connect, $id)
{
    $sql = "SELECT * FROM goods WHERE good_id='$id'";

    $res = mysqli_query($connect, $sql);
    $good = mysqli_fetch_all($res,MYSQLI_ASSOC);

    return $good;
}

function updGood($connect, $good)
{
    $sql = "UPDATE `goods` SET `title` = '" . $good['title'] . "', 
                               `description` = '" . $good['description'] . "',
                               `image` = '" . $good['image'] . "',
                               `color` = '" . $good['color'] . "', 
                               `size`  = '" . $good['size'] . "',
                               `price` = '" . $good['price'] . "',
                               `discount`  = '" . $good['discount'] . "' WHERE `good_id` = '" . $good['id'] . "'";

    $res = mysqli_query($connect, $sql);

    $sql = "SELECT * FROM goods";

    $res = mysqli_query($connect, $sql);
    $goods = mysqli_fetch_all($res,MYSQLI_ASSOC);

    return $goods;
}

function delGood($connect, $id)
{

    $sql = "DELETE FROM goods WHERE good_id='$id'";
    $res = mysqli_query($connect, $sql);


    $sql = "SELECT * FROM goods";

    $res = mysqli_query($connect, $sql);
    $goods = mysqli_fetch_all($res,MYSQLI_ASSOC);

    return $goods;
}

function addGood($connect, $good)
{
    $sql = "INSERT INTO `goods` (`good_id`, `title`, `description`, `image`, `color`, `size`, `price`, `discount`)
            VALUES ('" . $good['id'] . "', '" . $good['title'] . "', '" . $good['description'] . "', '" . $good['image'] . "', '" .
        $good['color'] . "', '" . $good['size'] . "', '" . $good['price'] . "', '" . $good['discount'] . "');";

    $res = mysqli_query($connect, $sql);

    $sql = "SELECT * FROM goods";

    $res = mysqli_query($connect, $sql);
    $goods = mysqli_fetch_all($res,MYSQLI_ASSOC);

    return $goods;
}

function getCart($connect, $id)
{
    $sql = "SELECT userId, cart.goodId, goods.title, goods.description, 
                   goods.image, goods.color, goods.size, goods.price, goods.discount, cart.quantity AS quantity
            FROM cart
            INNER JOIN goods
            ON cart.goodId = goods.goodId
            WHERE userId = '" . $id . "'";

    $res = mysqli_query($connect, $sql);

    $good = mysqli_fetch_all($res,MYSQLI_ASSOC);

    return $good;
}

function add2Cart($connect, $item)
{
    $sql = "SELECT * FROM `cart` WHERE `userId`= '" . $item['userId'] . "' AND 
                                       `goodId`= '" . $item['goodId'] . "'";

    $res = mysqli_query($connect, $sql);

    if (mysqli_num_rows($res)) {
        //update
        $sql = "UPDATE `cart` SET `userId` = '" . $item['userId'] . "', 
                                  `goodId` = '" . $item['goodId'] . "',
                                  `quantity` = '" . $item['quantity'] . "',
                                  `timeCreate` = '" . $item['timeCreate'] . "'
                            WHERE `userId`= '" . $item['userId'] . "' AND 
                                  `goodId`= '" . $item['goodId'] . "'";
    } else {
        //insert
        $sql = "INSERT INTO `cart` (`userId`, `goodId`, `quantity`, `timeCreate`) 
        VALUES ( '" . $item['userId'] . "',
                 '" . $item['goodId'] . "', 
                 '" . $item['quantity'] . "',
                 '" . $item['timeCreate'] . "')";
    }
    $res = mysqli_query($connect, $sql);

    $sql = "SELECT * FROM `cart` WHERE `userId`= '" . $item['userId'] . "' AND 
                                       `goodId`= '" . $item['goodId'] . "'";

    $res = mysqli_query($connect, $sql);
    return (mysqli_num_rows($res));
}


