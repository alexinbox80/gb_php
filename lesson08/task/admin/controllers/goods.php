<?php
require_once "../../models/function.php";
require_once "../../config/database.php";

$user = getSiteSession('user');

if (isset($_POST['todo'])) {
    $todo = $_POST['todo'] ? strip_tags($_POST['todo']) : "";

    switch ($todo) {
        case 'getGood':
            $result = getGoods($connect);
            break;
        case 'editGood':
            if (isset($_POST['good_id'])) {
                $good_id = $_POST['good_id'] ? strip_tags($_POST['good_id']) : "";
            }
            $result = getGood($connect, $good_id);
            break;
        case 'delGood':
            if (isset($_POST['good_id'])) {
                $good_id = $_POST['good_id'] ? strip_tags($_POST['good_id']) : "";
            }
            $result = delGood($connect, $good_id);
            break;
        case 'updGood':
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
            $result = updGood($connect, $good);
            break;
        case 'addGood':
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
            $result =  addGood($connect, $good);
            break;
        default:
            $result = "Wrong data operations!";
    }

}

//echo json_encode($_SESSION);

echo json_encode($result);


