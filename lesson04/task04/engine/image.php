<h1>Выбранное изображение</h1>

<?php
    $imgPath = "../public/images/big/";
    $image = $_GET['img'];
?>

<img src="<?= $imgPath . $image; ?>" alt=""><br>

<a href="<?= $_SERVER['HTTP_REFERER']; ?>">Вернуться оборатно</a>