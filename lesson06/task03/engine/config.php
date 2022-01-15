<?php

const SERVER = "localhost";
const DB = "image";
const LOGIN = "image";
const PASSWD = "image";

$connect = mysqli_connect(SERVER, LOGIN, PASSWD, DB);

if (!$connect) {
    echo "Ошибка подключения к БД!<br>";
}

?>


