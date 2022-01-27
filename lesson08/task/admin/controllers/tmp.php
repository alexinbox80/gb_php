<?php
//require_once "../../models/function.php";

require_once "../../config/variables.php";
require_once "../../config/database.php";

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

//function updGood($connect, $good)
//{
//    $sql = "UPDATE `goods` SET `title` = '" . $good['title'] . "',
//                               `description` = '" . $good['description'] . "',
//                               `image` = '" . $good['image'] . "',
//                               `color` = '" . $good['color'] . "',
//                               `size`  = '" . $good['size'] . "',
//                               `price` = '" . $good['price'] . "',
//                               `discount`  = '" . $good['discount'] . "' WHERE `good_id` = '" . $good['good_id'] . "'";
//
//    echo $sql . "<br>";
//
//    $res = mysqli_query($connect, $sql);
//
//    echo "res <br>";
//    print_r($res);
//    echo "res <br>";
//
//    $sql = "SELECT * FROM goods";
//    $res = mysqli_query($connect, $sql);
//    $goods = mysqli_fetch_all($res,MYSQLI_ASSOC);
//
//    return $goods;
//}

$good = [];

if (isset($_POST['todo'])) {
    $good['id'] = getGUID();
    $good['title'] = $_POST['good']['title'] ? strip_tags($_POST['good']['title']) : "";
    $good['description'] = $_POST['good']['description'] ? strip_tags($_POST['good']['description']) : "";
    $good['image'] = $_POST['good']['image'] ? strip_tags($_POST['good']['image']) : "";
    $good['color'] = $_POST['good']['color'] ? strip_tags($_POST['good']['color']) : "";
    $good['size'] = $_POST['good']['size'] ? strip_tags($_POST['good']['size']) : "";
    $good['price'] = $_POST['good']['price'] ? strip_tags($_POST['good']['price']) : "";
    $good['discount'] = $_POST['good']['discount'] ? strip_tags($_POST['good']['discount']) : "";
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


//echo json_encode($_POST);

$answ =  addGood($connect, $good);

echo json_encode($answ);
