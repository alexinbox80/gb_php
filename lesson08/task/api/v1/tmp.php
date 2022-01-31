<?php
//require_once "../../models/function.php";

require_once "../../config/variables.php";
require_once "../../config/database.php";

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

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

function add2Cart($connect, $item)
{
    echo "<hr><br>";
    $sql = "SELECT * FROM `cart` WHERE `userId`= '" . $item['userId'] . "' AND 
                                       `goodId`= '" . $item['goodId'] . "'";

    echo $sql . "<br>\n";

    $res = mysqli_query($connect, $sql);

    echo "mysqli_num_rows(res) " . mysqli_num_rows($res) . " <br>\n";

    if (mysqli_num_rows($res)) {
        //update
        echo "update <br>\n";
        $sql = "UPDATE `cart` SET `userId` = '" . $item['userId'] . "', 
                                  `goodId` = '" . $item['goodId'] . "',
                                  `quantity` = '" . $item['quantity'] . "',
                                  `timeCreate` = '" . $item['timeCreate'] . "'
                            WHERE `userId`= '" . $item['userId'] . "' AND 
                                  `goodId`= '" . $item['goodId'] . "'";


        echo $sql . "<br>\n";

    } else {
        //insert
        echo "insert <br>\n";
        $sql = "INSERT INTO `cart` (`userId`, `goodId`, `quantity`, `timeCreate`) 
        VALUES ( '" . $item['userId'] . "',
                 '" . $item['goodId'] . "', 
                 '" . $item['quantity'] . "',
                 '" . $item['timeCreate'] . "')";

        echo $sql . "<br>\n";

    }

    $res = mysqli_query($connect, $sql);
}

$str = json_decode('{
  "todo": "addToCart",
  "cart": [
  {
    "userId": "81245000-a273-0c97-04e8-f99b5b199795",
    "goodId": "81245312-a273-0c97-04e8-f99b5b199795",
    "quantity": 5,
    "timeCreate": 1643650396642
  },
  {
    "userId": "81245000-a273-0c97-04e8-f99b5b199795",
    "goodId": "81245456-a273-0c97-04e8-f99b5b199795",
    "quantity": 1,
    "timeCreate": 1643650396642
  },
  {
    "userId": "81245000-a273-0c97-04e8-f99b5b199795",
    "goodId": "b53e01e9-baf4-6fe2-09e4-5cd132d59a79",
    "quantity": 2,
    "timeCreate": 1643650396642
  },
  {
    "userId": "81245000-a273-0c97-04e8-f99b5b199795",
    "goodId": "7e606fd5-678c-7669-b972-fe3fa3179867",
    "quantity": 2,
    "timeCreate": 1643650396642
  },
  {
    "userId": "81245000-a273-0c97-04e8-f99b5b199795",
    "goodId": "7d8b04dd-c403-2c1d-7a22-ff1d671341be",
    "quantity": 2,
    "timeCreate": 1643650396642
  }
]
}', true);

var_dump($str);

echo "<br>\n";

$todo = $str['todo'] ? strip_tags($str['todo']) : "";

echo "todo = " . $todo . "<br>\n";

$cart = $str['cart'];

var_dump(count($cart));

echo "<br>\n";

for ($i = 0; $i < count($cart); $i++) {
    //print_r($cart[$i]);
    add2Cart($connect, $cart[$i]);
    echo "$i <br>\n";
}

//add2Cart($connect, $cart[0]);

//$answ =  addGood($connect, $good);

//echo json_encode($answ);
