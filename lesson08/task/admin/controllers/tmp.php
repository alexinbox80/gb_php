<?php
require_once "../../config/variables.php";
require_once "../../config/database.php";


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
if (isset($_POST['good_id'])) {
    $good['id'] = $_POST['good_id'] ? strip_tags($_POST['good_id']) : "";
    $good['title'] = $_POST['good']['title'] ? strip_tags($_POST['good']['title']) : "";
    $good['description'] = $_POST['good']['description'] ? strip_tags($_POST['good']['description']) : "";
    $good['image'] = $_POST['good']['image'] ? strip_tags($_POST['good']['image']) : "";
    $good['color'] = $_POST['good']['color'] ? strip_tags($_POST['good']['color']) : "";
    $good['size'] = $_POST['good']['size'] ? strip_tags($_POST['good']['size']) : "";
    $good['price'] = $_POST['good']['price'] ? strip_tags($_POST['good']['price']) : "";
    $good['discount'] = $_POST['good']['discount'] ? strip_tags($_POST['good']['discount']) : "";
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

    //$res = mysqli_query($connect, $sql);

//    $sql = "SELECT * FROM goods";
//
//    $res = mysqli_query($connect, $sql);
//    $goods = mysqli_fetch_all($res,MYSQLI_ASSOC);

    return $sql;
}
//$result = updGood($connect, $good);

//echo json_encode($_POST['good']);

$answ =  updGood($connect, $good);

echo json_encode($answ);
