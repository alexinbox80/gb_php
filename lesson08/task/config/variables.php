<?php

$imgPath = "public/images";

$title = "eShop v4.0";

const SERVER = "localhost";
const DB = "eshop";
const LOGIN = "eshop";
const PASSWD = "eshop";

$pages = array(
    'index' => array(
        'tpl' => '../templates/index.tpl',
        'HEAD' => '../templates/head.tpl',
        'HEADER' => '../templates/header.tpl',
        '_LOGIN' => '../templates/headerLogin.tpl',
        '_LOGOUT' => '../templates/headerLogout.tpl',
        'PROMO' => '../templates/promo.tpl',
        'SALE' => '../templates/sale.tpl',
        'PRODUCTS' => '../templates/products.tpl',
        'FOOTER' => '../templates/footer.tpl'
    ),
    'cart' => array(
        'tpl' => '../templates/cart.tpl',
        'HEAD' => '../templates/head.tpl',
        'HEADER' => '../templates/header.tpl',
        '_LOGIN' => '../templates/headerLogin.tpl',
        '_LOGOUT' => '../templates/headerLogout.tpl',
        'CATALOG' => '../templates/catalog.tpl',
        'FOOTER' => '../templates/footer.tpl'
    ),
    'registration' => array(
        'tpl' => '../templates/registration.tpl',
        'HEAD' => '../templates/head.tpl',
        'HEADER' => '../templates/header.tpl',
        '_LOGIN' => '../templates/headerLogin.tpl',
        '_LOGOUT' => '../templates/headerLogout.tpl',
        'REGISTRATION' => '../templates/registrat.tpl',
        'FOOTER' => '../templates/footer.tpl'
    ),
    'admin' => array(
        'tpl' => 'templates/index.tpl',
        'HEAD' => 'templates/head.tpl',
        'HEADER' => 'templates/header.tpl',
        '_LOGOUT' => 'templates/headerLogout.tpl',
        'TABLE' => 'templates/table.tpl',
        'FOOTER' => 'templates/footer.tpl'
    )
);

const GROUPS_ADMINS = 0;
const GROUPS_USERS = 1;

$userRights = array(
    'admin' => GROUPS_ADMINS,
    'user' => GROUPS_USERS
);
