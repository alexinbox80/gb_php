<?php
include_once "config.php";
?>
<h1>Выбранное изображение</h1>

<?php
$imgPath = "../" . $imgPath . "/big/";
$photo_id = (int)$_GET['photo_id'];

$sql = "SELECT photo, count FROM images WHERE id = $photo_id";

$res = mysqli_query($connect, $sql);

if ($res) {
    $row = mysqli_fetch_array($res);
    $update = "UPDATE images SET count = count + 1 WHERE id = $photo_id";
    $res = mysqli_query($connect, $update);
}

?>

<img src="<?= $imgPath . $row['photo']; ?>" alt=""><br>

<span>Количество просмотров: <?= $row['count'];?></span><br>
<a href="<?= $_SERVER['HTTP_REFERER']; ?>">Вернуться оборатно</a>

