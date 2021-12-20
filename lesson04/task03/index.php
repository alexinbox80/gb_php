<?php
// 3. *[ для тех, кто изучал JS-1 ] При клике по миниатюре нужно показывать полноразмерное изображение
// в модальном окне
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
        cursor: pointer;
    }

    /* The Modal (background) */
    .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        padding-top: 100px; /* Location of the box */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
    }

    /* Modal Content (Image) */
    .modal-content {
        margin: auto;
        display: block;
        width: 80%;
        max-width: 700px;
    }

    /* Caption of Modal Image (Image Text) - Same Width as the Image */
    #caption {
        margin: auto;
        display: block;
        width: 80%;
        max-width: 700px;
        text-align: center;
        color: #ccc;
        padding: 10px 0;
        height: 150px;
    }

    /* The Close Button */
    .close {
        position: absolute;
        top: 15px;
        right: 35px;
        color: #f1f1f1;
        font-size: 40px;
        font-weight: bold;
        transition: 0.3s;
    }

    .close:hover,
    .close:focus {
        color: #bbb;
        text-decoration: none;
        cursor: pointer;
    }

</style>

<?php
function drawGallery($imgPath){
    $images = scandir($imgPath);

    $list = "<ul class=\"gallery\">\n";

    for ($i = 2; $i < count($images); $i++) {
        $path = $imgPath . $images[$i];
        $list .= "<li class=\"gallery__item\">\n";
        $list .= "<img class=\"gallery__pic\" src=\"{$path}\" alt=\"\" onclick=\"drawImg('public/images/', '" . $images[$i] . "')\">\n";
        $list .= "</li>\n";
    }

    $list .= "</ul>\n";

    return $list;
}

$imgPath = "public/images/";

?>
<div class="content">

    <?= drawGallery($imgPath);?>

    <form class="form__upload" action="engine/server.php" method="post" enctype="multipart/form-data">
        <input id="form__input" class="form__input" type="file" name="pics" accept="image/*">
        <input class="form__button" type="submit" value="Загрузить">
    </form>

</div>

<!-- The Modal -->
<div id="myModal" class="modal">

    <!-- The Close Button -->
    <span class="close">&times;</span>

    <!-- Modal Content (The Image) -->
    <img class="modal-content" id="img01">

    <!-- Modal Caption (Image Text) -->
    <div id="caption"></div>
</div>


<script>
    // Get the modal
    const modal = document.getElementById("myModal");

    // Get the image and insert it inside the modal - use its "alt" text as a caption
    function drawImg(imgPath, fileName) {
        modal.style.display = "block";
        modalImg.src = imgPath + fileName;
        captionText.innerHTML = fileName;
    }

    const modalImg = document.getElementById("img01");
    const captionText = document.getElementById("caption");

    // Get the <span> element that closes the modal
    const span = document.getElementsByClassName("close")[0];

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }
</script>
