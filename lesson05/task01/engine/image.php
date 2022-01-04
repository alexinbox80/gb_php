<?php
include_once "config.php";
?>
<h1>Выбранное изображение</h1>

<?php
$imgPath = "../" . $imgPath . "/big/";
$photo_id = $_GET['photo_id'];

$sql = "SELECT photo FROM images WHERE id = " . $photo_id;
$res = mysqli_query($connect, $sql);

$row = mysqli_fetch_array($res);
?>

<img src="<?= $imgPath . $row['photo']; ?>" alt=""><br>

<a href="<?= $_SERVER['HTTP_REFERER']; ?>">Вернуться оборатно</a>
