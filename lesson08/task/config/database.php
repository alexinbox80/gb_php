<?php
require_once "variables.php";

$connect = mysqli_connect(SERVER, LOGIN, PASSWD, DB) or die(mysqli_error($connect));
