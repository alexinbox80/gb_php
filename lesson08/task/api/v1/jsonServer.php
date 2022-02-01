<?php
    require_once "../../models/function.php";
    require_once "../../config/database.php";

$json = json_decode(file_get_contents('php://input'), true);

if (isset($json['todo'])) {

    $todo = $json['todo'] ? strip_tags($json['todo']) : "";

    switch ($todo) {
        case 'getGoods':
            $result = getGoods($connect);
            break;
        case 'getCart':
            $id = '81245000-a273-0c97-04e8-f99b5b199795';
            $result = getCart($connect, $id);
            break;
        case 'addToCart':
            $cart = $json['cart'];

            $count = 0;

            for ($ind = 0; $ind < count($cart); $ind++) {
                $count += add2Cart($connect, $cart[$ind]);
            }

            $result = ['info' => $count];
            break;
        default:
            $result = ['error' => 'Bad Request'];
            http_response_code(400);
    }
}

echo json_encode($result);
