<?php
// 2. В базе данных создать таблицу, в которой будет храниться информация о картинках
// (адрес на сервере, размер, имя).

include_once "engine/config.php";

?>

<style type="text/css">
    .form__input {
        font-size: 20px;
        font-weight: 400;
        line-height: 14px;
    }

    .form__upload {
        display: flex;
        flex-direction: column;
    }

    .form__button {
        font-size: 20px;
        font-weight: 400;
        line-height: 14px;
        letter-spacing: 0.02em;
        color: #FFF;
        text-transform: uppercase;
        background: #00CDFF;
        border-radius: 1px 1px 1px 2px;
        border: 1px solid #00CDFF;
        width: 100%;
        padding-top: 16px;
        padding-bottom: 16px;
        box-sizing: border-box;
        cursor: pointer;
    }

    .content {
        padding: 0 calc(50% - 621px);
    }

    .gallery {
        padding-left: 0;
        display: flex;
        flex-wrap: wrap;
        list-style-type: none;
    }

    .gallery__item {
        width: 100px;
        margin-bottom: 30px;
        margin-right: 30px;
    }

    .gallery__pic {
        width: 100%;
    }
</style>

<?php
function drawGallery($imgPath, $res)
{

    $list = "<ul class=\"gallery\">\n";

    while ($data = mysqli_fetch_assoc($res)) {

        $path = $imgPath . $data['photo'];
        $list .= "<li class=\"gallery__item\">\n";
        $list .= "<a href=\"engine/image.php?photo_id={$data['id']}\">\n";
        $list .= "<img class=\"gallery__pic\" src=\"{$path}\" alt=\"\">\n";
        $list .= "</a>\n";
        $list .= "</li>\n";

    }

    $list .= "</ul>\n";

    return $list;
}

?>
<div class="content">

    <?php

    $sql = "SELECT * FROM images";

    $res = mysqli_query($connect, $sql);

    echo drawGallery($imgPath . "/small/", $res);

    ?>

    <form class="form__upload" action="engine/server.php" method="post" enctype="multipart/form-data">
        <input id="form__input" class="form__input" type="file" name="pics" accept="image/*">
        <input class="form__button" type="submit" value="Загрузить">
    </form>
</div>
