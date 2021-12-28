<?php

include_once "config.php";

echo $_POST['username'] . "<br>";
echo $_POST['userreview'] . "<br>";

$userName = strip_tags($_POST['username']);
$userReview = strip_tags($_POST['userreview']);

$sql = "INSERT INTO reviews (author, review, date) VALUES ('" . $userName . "', '" . $userReview . "', " . (time() + 3 * 3600) . ")";
$res = mysqli_query($connect, $sql);

header("Location: ../index.php");
?>

