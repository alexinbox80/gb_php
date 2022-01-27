$(document).ready(function () {

    let answer = {};

    let getGoodHandler = "../admin/controllers/goods.php";

    getGoodsHandler('note__getgood', 'getGood', getGoodHandler);

    $(document).on("click", "#editGood", function () {
        let id = $(this).attr("data-goodid");
        let answ = answer.filter(goods => goods.good_id === id);

        clearPage('cart__cards');

        const cartList = document.querySelector('.cart__cards');

        if (cartList) {
            render(cartList, 'beforeend', answ[0], 'getHtmlForm');
        }
    });

    $(document).on("click", "#deleteGood", function () {
        let id = $(this).attr("data-goodid");

        let todo = {"good_id": id, "todo": "delGood"};

        //let an = answer.filter(goods => goods.good_id !== id);

        editGoodsHandler('note__getgood', todo, getGoodHandler, id);
    });

    $(document).on("click", "#addGood", function () {

        clearPage('cart__cards');

        const cartList = document.querySelector('.cart__cards');

        if (cartList) {
            render(cartList, 'beforeend', '', 'goodHtmlForm');
        }
    });

    $(document).on("click", "#saveGood", function () {

        let id = $(this).attr("data-goodid");
        let editForm = $("#itemUpdate").serializeArray();
        let indexed_array = {};

        $.map(editForm, function (n, i) {
            indexed_array[n['name']] = n['value'];
        });

        let todo = {"good_id": id, "todo": "updGood", "good": indexed_array};

        editGoodsHandler('note__getgood', todo, getGoodHandler);
        //editGoodsHandler('note__getgood', todo, "../admin/controllers/tmp.php");
    });

    $(document).on("click", "#insertGood", function () {
        let editForm = $("#itemInsert").serializeArray();
        let indexed_array = {};

        let empty = false;
        $.map(editForm, function (n, i) {
            indexed_array[n['name']] = n['value'];

            if (n['value'] === '') {
                empty = true;
            }
        });

        if (empty) {
            $("#insert__note").html('<div class="err">Empty fields</div>');
        } else {
            let todo = {"todo": "addGood", "good": indexed_array};

            //console.log('todo = ' + JSON.stringify(todo));

            editGoodsHandler('note__getgood', todo, getGoodHandler);
            //editGoodsHandler('note__getgood', todo, "../admin/controllers/tmp.php");
        }

        //$("#" + result_form).html('<div class="err">' + answer['errorMessage'] + '</div>');

        //editGoodsHandler('note__getgood', todo, "../admin/controllers/tmp.php");
    });

    function clearPage(tag) {

        document.getElementById(tag).innerHTML = "";

    }

    function goodHtmlForm() {
        return `<div class="insprod__item">
                        <div id="insert__note"></div>
                        <form id="itemInsert" class="form__table content__admin" method="POST">
                            <div class="insprod__content">
                                <p class="insprod__text">
                                    <input class="title" type="text" name="title" value="" placeholder="good title">
                                </p>
                                <p class="insprod__textarea">
                                    <textarea class="insprod__description" name="description" placeholder="good description"></textarea>
                                </p>
                                <p class="insprod__text">
                                    <input class="image" type="text" name="image" value="" placeholder="good image file">
                                </p>
                                <p class="insprod__text">
                                    <input class="color" type="text" name="color" value="" placeholder="good color">
                                </p>
                                <p class="insprod__text">
                                    <input class="size" type="text" name="size" value="" placeholder="good size">
                                </p>
                                <p class="insprod__text">
                                    <input class="price" type="text" name="price" value="" placeholder="good price">
                                </p>
                                <p class="insprod__text">
                                    <input class="discount" type="text" name="discount" value="" placeholder="good price discont">
                                </p>
                            </div>
                            <div class="insprod__button">
                                <button id="insertGood" type="button" class="products__button-save">insert</button>
                            </div>
                        </form>
                    </div>`;
    }

    function getHtmlForm(answer) {
        return `<div class="products__item">
                        <form id="itemUpdate" class="form__table content__admin" method="POST">
                            <div class="products__img">
                                <img class="products__img" src="../admin/views/img/${answer.image}" alt="product img">
                            </div>
                            <div class="products__content">
                                <p class="products__text">
                                    <input class="title" type="text" name="title" value="${answer.title}">
                                </p>
                                <p class="products__textarea">
                                    <textarea class="description" name="description">${answer.description}</textarea>
                                </p>
                                <p class="products__text">
                                    <input class="image" type="text" name="image" value="${answer.image}">
                                </p>
                                <p class="products__text">
                                    <input class="color" type="text" name="color" value="${answer.color}">
                                </p>
                                <p class="products__text">
                                    <input class="size" type="text" name="size" value="${answer.size}">
                                </p>
                                <p class="products__text">
                                    <input class="price" type="text" name="price" value="${answer.price}">
                                </p>
                                <p class="products__text">
                                    <input class="discount" type="text" name="discount" value="${answer.discount}">
                                </p>
                            </div>
                            <div class="products__button" id="card-${answer.good_id}">
                                <button id="saveGood" type="button" class="products__button-save" data-goodId="${answer.good_id}">save</button>
                            </div>
                        </form>
                    </div>`;
    }

    function getHtml(answer) {
        return `<div class="products__item">
            <div class="products__img">
                <img class="products__img" src="../admin/views/img/${answer.image}" alt="product img">
            </div>
            <div class="products__content">
                <p class="products__text">${answer.title}</p>
                <p class="products__text">${answer.description}</p>
                <p class="products__text">${answer.size}</p>
                <p class="products__text">$${answer.price}</p>
                <p class="products__text">$${answer.discount}</p>
            </div>
            <div class="products__button" id="card-${answer.good_id}">
                <button id="editGood" class="products__button-edit" data-goodId="${answer.good_id}">edit</button>
                <button id="deleteGood" class="products__button-edit" data-goodId="${answer.good_id}">delete</button>
            </div>
        </div>`;
    }

    function render(container, target = 'beforeend', value, str) {

        switch (str) {
            case 'getHtml':
                container.insertAdjacentHTML(target, getHtml(value));
                break;
            case 'goodHtmlForm':
                container.insertAdjacentHTML(target, goodHtmlForm());
                break;
            default:
                container.insertAdjacentHTML(target, getHtmlForm(value));
        }

        // if (str === 'getHtml') {
        //     container.insertAdjacentHTML(target, getHtml(value));
        // } else {
        //     container.insertAdjacentHTML(target, getHtmlForm(value));
        // }

    }

    let formerr = "Send form error!";

    function editGoodsHandler(result_form, todo, url) {

        $.ajax({
            url: url, //url страницы
            type: "POST", //метод отправки
            dataType: "html", //формат данных
            //data: $("#" + ajax_form).serialize(),  // Сеарилизуем объект
            //data: {"todo": todo, "good_id": id},
            data: todo,

            success: function (response) { //Данные отправлены успешно

                answer = JSON.parse(response);

                //console.log('return answer = ' + JSON.stringify(answer));

                const cartList = document.querySelector('.cart__cards');

                clearPage('cart__cards');

                Object.entries(answer).forEach(([key, value]) => {

                    if (cartList) {
                        render(cartList, 'beforeend', value, 'getHtml');
                    }
                });


                $(function () {
                    setTimeout(function () {
                        $(".ok").fadeOut(1500);
                    }, 1500);
                    setTimeout(function () {
                        $(".err").fadeOut(1500);
                    }, 1500);
                });

            },

            error: function (response) { // Данные не отправлены
                $("#" + result_form).html('<div class="err">' + formerr + '</div>');
            }
        });
    }

    function getGoodsHandler(result_form, todo, url) {

        $.ajax({
            url: url, //url страницы
            type: "POST", //метод отправки
            dataType: "html", //формат данных
            //data: $("#" + ajax_form).serialize(),  // Сеарилизуем объект
            data: {"todo": todo},

            success: function (response) { //Данные отправлены успешно

                answer = JSON.parse(response);

                //console.log('answer = ' + JSON.stringify(answer));

                // if (answer.hasOwnProperty('userId')) {
                //     user.userId = answer.userId;
                // }
                //
                // if (answer['loginSuccess']) {
                //     location.href = answer['urlPath'];
                // }
                //
                // if (!answer['loginSuccess']) {
                //     $("#" + result_form).html('<div class="err">' + answer['errorMessage'] + '</div>');
                // }

                const cartList = document.querySelector('.cart__cards');

                Object.entries(answer).forEach(([key, value]) => {

                    if (cartList) {
                        render(cartList, 'beforeend', value, 'getHtml');
                    }
                });

                $(function () {
                    setTimeout(function () {
                        $(".ok").fadeOut(1500);
                    }, 1500);
                    setTimeout(function () {
                        $(".err").fadeOut(1500);
                    }, 1500);
                });

            },

            error: function (response) { // Данные не отправлены
                $("#" + result_form).html('<div class="err">' + formerr + '</div>');
            }
        });
    }

});
