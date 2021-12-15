<?php
// 4. Используя имеющийся HTML-шаблон, сделать так, чтобы главная страница генерировалась через PHP.
// Создать блок переменных в начале страницы. Сделать так, чтобы h1, title и текущий год генерировались в блоке
// контента из созданных переменных.

$title = "Massa quis vestibulum";

$headerH2 = "Nunc commodo euismod massa quis vestibulum";

$mainParagraph_1 = "Nunc eget nunc libero. Nunc commodo euismod massa quis vestibulum. Proin mi nibh, dignissim a
                        pellentesque at, ultricies sit amet sapien. Lorem ipsum dolor sit amet, consectetur adipiscing
                        elit. Quisque vel lorem eu libero laoreet facilisis. Aenean placerat, ligula quis placerat
                        iaculis, mi magna luctus nibh, adipiscing pretium erat neque vitae augue. Quisque consectetur
                        odio ut sem semper commodo. Maecenas iaculis leo a ligula euismod condimentum. Cum sociis
                        natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut enim risus,
                        rhoncus sit amet ultricies vel, aliquet ut dolor. Duis iaculis urna vel massa ultricies
                        suscipit. Phasellus diam sapien, fermentum a eleifend non, luctus non augue. Quisque scelerisque
                        purus quis eros sollicitudin gravida. Aliquam erat volutpat. Donec a sem consequat tortor
                        posuere dignissim sit amet at ipsum.";

$headerH3_1 = "Ut enim risus rhoncus";
$headerH3_2 = "Maecenas iaculis leo";
$headerH3_3 = "Quisque consectetur odio";

$colParagraph_1 = "Quisque consectetur odio ut sem semper commodo. Maecenas iaculis leo a ligula euismod condimentum.
                    Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut enim risus,
                    rhoncus sit amet ultricies vel, aliquet ut dolor. Duis iaculis urna vel massa ultricies suscipit.
                    Phasellus diam sapien, fermentum a eleifend non, luctus non augue. Quisque scelerisque purus quis
                    eros sollicitudin gravida. Aliquam erat volutpat. Donec a sem consequat tortor posuere dignissim sit
                    amet at.";
$colParagraph_2 = "Quisque consectetur odio ut sem semper commodo. Maecenas iaculis leo a ligula euismod condimentum.
                    Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut enim risus,
                    rhoncus sit amet ultricies vel, aliquet ut dolor. Duis iaculis urna vel massa ultricies suscipit.
                    Phasellus diam sapien, fermentum a eleifend non, luctus non augue. Quisque scelerisque purus quis
                    eros sollicitudin gravida. Aliquam erat volutpat. Donec a sem consequat tortor posuere dignissim sit
                    amet at.";
$colParagraph_3 = "Quisque consectetur odio ut sem semper commodo. Maecenas iaculis leo a ligula euismod condimentum.
                    Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut enim risus,
                    rhoncus sit amet ultricies vel, aliquet ut dolor. Duis iaculis urna vel massa ultricies suscipit.
                    Phasellus diam sapien, fermentum a eleifend non, luctus non augue. Quisque scelerisque purus quis
                    eros sollicitudin gravida. Aliquam erat volutpat. Donec a sem consequat tortor posuere dignissim sit
                    amet at.";

$currentYear = date("Y");
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8">
    <meta name="author" content="Luka Cvrk (www.solucija.com)">
    <link rel="stylesheet" href="css/main.css" type="text/css">
    <title><?= $title; ?></title>
</head>
<body>
    <div id="content">
        <h1></h1>

            <ul id="menu">
                <li><a href="#">home</a></li>
                <li><a href="#">archive</a></li>
                <li><a href="#">contact</a></li>
            </ul>

            <div class="post">
                <div class="details">
                    <h2><a href="#"><?= $headerH2; ?></a></h2>
                    <p class="info">posted 3 hours ago in <a href="#">general</a></p>

                </div>
                <div class="body">
                    <p><?= $mainParagraph_1; ?></p>
                </div>
                <div class="x"></div>
            </div>

            <div class="col">
                <h3><a href="#"><?= $headerH3_1; ?></a></h3>
                <p><?= $colParagraph_1; ?></p>
                <p>&not; <a href="#">read more</a></p>
            </div>
            <div class="col">
                <h3><a href="#"><?= $headerH3_2; ?></a></h3>
                <p><?= $colParagraph_2; ?></p>
                <p>&not; <a href="#">read more</a></p>
            </div>
            <div class="col last">
                <h3><a href="#"><?= $headerH3_3; ?></a></h3>
                <p><?= $colParagraph_3; ?></p>
                <p>&not; <a href="#">read more</a></p>
            </div>

            <div id="footer">
                <p>Copyright &copy; <?= $currentYear; ?><em>&nbsp;minimalistica</em> &middot; Design: Luka Cvrk, <a
                        href="http://www.solucija.com/" title="Free CSS Templates">Solucija</a></p>
            </div>
    </div>
</body>
</html>