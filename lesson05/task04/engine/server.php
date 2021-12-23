<?php

include_once "config.php";

/*
  $w_o и h_o - ширина и высота выходного изображения
  */
function resize($image, $imageNew, $w_o = false, $h_o = false) {
    if (($w_o < 0) || ($h_o < 0)) {
        echo "Отрицательный размер изображения!";
        return false;
    }

    list($w_i, $h_i, $type) = getimagesize($image); // Получаем размеры и тип изображения (число)

    $types = array("", "gif", "jpeg", "png"); // Массив с типами изображений

    $ext = $types[$type]; // Зная "числовой" тип изображения, узнаём название типа

    if ($ext) {
        $func = 'imagecreatefrom'.$ext; // Получаем название функции, соответствующую типу, для создания изображения
        $img_i = $func($image); // Создаём дескриптор для работы с исходным изображением
    } else {
        echo 'Некорректное изображение'; // Выводим ошибку, если формат изображения недопустимый
        return false;
    }

    /* Если указать только 1 параметр, то второй подстроится пропорционально */
    if (!$h_o) $h_o = $w_o / ($w_i / $h_i);
    if (!$w_o) $w_o = $h_o / ($h_i / $w_i);

    $img_o = imagecreatetruecolor($w_o, $h_o); // Создаём дескриптор для выходного изображения
    imagecopyresampled($img_o, $img_i, 0, 0, 0, 0, $w_o, $h_o, $w_i, $h_i); // Переносим изображение из исходного в выходное, масштабируя его

    $func = 'image'.$ext; // Получаем функция для сохранения результата

    return $func($img_o, $imageNew); // Сохраняем изображение, возвращая результат этой операции
}

$imgPathSmall = "../" . $imgPath . "/small/";
$imgPathBig = "../" . $imgPath . "/big/";


//$imgPathBig = "../public/images/big/";

$uploadSize = 3 * 1024 * 1024; //3Mb

$fileName = "{$_FILES['pics']['name']}";

$path = $imgPathBig . $fileName;

?>

    <a href="<?= $_SERVER['HTTP_REFERER']; ?>">Вернуться оборатно</a><br>

<?php
if ($_FILES['pics']['type'] == 'image/jpeg' && $_FILES['pics']['size'] <= $uploadSize) {

    if (move_uploaded_file($_FILES['pics']['tmp_name'], $path)) {

        $sql = "INSERT INTO images (photo, size, count) VALUES ('" . $fileName . "'," . $_FILES['pics']['size'] . ", 0 )";

        $res = mysqli_query($connect, $sql);

        echo "Картинка $fileName успешно загружена в $imgPath <br>";

        /* Вызываем функцию с целью уменьшить изображение до ширины в 100 пикселей, а
        высоту уменьшив пропорционально, чтобы не искажать изображение */
        resize($path, $imgPathSmall . $fileName,100); // Вызываем функцию

    }
} else {

    echo "Это не картинка! Или размер превышает $uploadSize байт!<br>";

}
?>
