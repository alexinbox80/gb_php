<?php
    $imgPath = "../public/images/";

    $uploadSize = 3 * 1024 * 1024; //3Mb

    $fileName = "{$_FILES['pics']['name']}";

    $path = $imgPath . $fileName;

?>

<a href="<?= $_SERVER['HTTP_REFERER']; ?>">Вернуться оборатно</a><br>

<?php
    if ($_FILES['pics']['type'] == 'image/jpeg' && $_FILES['pics']['size'] <= $uploadSize) {

        if (move_uploaded_file($_FILES['pics']['tmp_name'], $path)) {

            echo "Картинка $fileName успешно загружена в $imgPath <br>";

        }
    } else {

        echo "Это не картинка! Или размер превышает $uploadSize байт!<br>";

    }
?>
