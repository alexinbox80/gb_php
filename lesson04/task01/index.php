<?php
// 1. Создать галерею фотографий. Она должна состоять всего из одной странички, на которой пользователь видит
// все картинки в уменьшенном виде и форму для загрузки нового изображения. При клике на фотографию она должна
// открыться в браузере в новой вкладке. Размер картинок можно ограничивать с помощью свойства width. При загрузке
// изображения необходимо делать проверку на тип и размер файла.

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
        width: calc(100% / 3 - 20px);
        margin-bottom: 30px;
    }
    .gallery__item:not(:nth-child(3n+3)){
        margin-right: 30px;
    }
    .gallery__pic {
        width: 100%;
    }
</style>

<?php
$imgPath = "public/images/";
$images = scandir($imgPath);

?>
<div class="content">
    <ul class="gallery">
<?php
for ($i = 2; $i < count($images); $i++) {?>
        <li class="gallery__item">
            <a href="engine/image.php?img=<?= $images[$i];?>">
                <img class="gallery__pic" src="<?= $imgPath . $images[$i];?>" alt="">
            </a>
        </li>
<?php
}
?>
    </ul>

    <form class="form__upload" action="engine/server.php" method="post" enctype="multipart/form-data">
        <input id="form__input" class="form__input" type="file" name="pics" accept="image/*">
        <input class="form__button" type="submit" value="Загрузить">
    </form>
</div>