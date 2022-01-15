<?php
// 3. Добавить функционал отзывов в имеющийся у вас проект.

include_once "engine/config.php";

$userName = "Ваше имя.";
$userReview = "Ваш отзыв о сайте.";
$table = "";

$sql = "SELECT date, author, review FROM reviews ORDER BY date DESC";
$res = mysqli_query($connect, $sql);

function drawReviews($data) {

    $row = "";
    $row .= "<p class=\"review__block\">
                <span class=\"review__item\">"
                    . date("H:i:s d-m-Y", substr($data['date'], 0, 10))
             . "</span>
                <span class=\"review__item\">"
                    . $data['author']
             . "</span>
                <span class=\"review__item\">"
                    . $data['review']
             . "</span>
             </p>";

    return $row;
}

while ($data = mysqli_fetch_assoc($res)) {
    $table .= drawReviews($data);
}

?>
<style type="text/css">
    .header {
        text-align: center;
    }
    .content {
        padding: 0 calc(50% - 321px);
    }
    .form {
        display: flex;
        flex-direction: column;
    }
    .form__textarea {
      height: 100px;
    }
    .review__block {
        display: flex;
        flex-direction: column;
    }
    .review__item:nth-child(2) {
        text-align: center;
        font-weight: bold;
        font-size: 20px;
    }
    .review__item:last-child {
        text-align: end;
    }
    .review__list {
        min-height: 100px;
    }
</style>

<h1 class="header">Добавить отзыв.</h1>
<div class="content">
    <div class="review__list">
        <?= $table;?>
    </div>
    <form action="engine/server.php" method="POST" class="form">
        <input type="text" name="username" placeholder="<?= $userName;?>">
        <textarea name="userreview" class="form__textarea" placeholder="<?= $userReview;?>"></textarea>
        <input type="submit" value="Сохранить отзыв">
    </form>
</div>
