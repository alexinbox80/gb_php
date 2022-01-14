<?php

$imgPath = "public/images";

const SERVER = "localhost";
const DB = "image";
const LOGIN = "image";
const PASSWD = "image";

$connect = mysqli_connect(SERVER, LOGIN, PASSWD, DB) or die(mysqli_error($connect));

?>


