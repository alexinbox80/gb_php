<?php

include_once "../config.php";

if (isset($_POST['title'])) {
    $title = (string)htmlspecialchars(strip_tags($_POST['title']));
}

if (isset($_POST['price'])) {
    $price = (int)strip_tags($_POST['price']);
}

if (isset($_POST['img'])) {
    $img = (string)htmlspecialchars(strip_tags($_POST['img']));
}

if (isset($_POST['short_info'])) {
    $short_info = (string)htmlspecialchars(strip_tags($_POST['short_info']));
}

if (isset($_POST['full_info'])) {
    $full_info = (string)htmlspecialchars(strip_tags($_POST['full_info']));
}

$sql = "INSERT INTO goods (title, price, img, short_info, full_info)
       VALUES ('" . $title . "','" . $price . "','" . $img . "','" . $short_info . "','" . $full_info ."')";

$res = mysqli_query($connect, $sql);

//if (!$res) {
//    printf("Сообщение ошибки: %s\n", mysqli_error($connect));
//}

header("Location: index.php");

?>