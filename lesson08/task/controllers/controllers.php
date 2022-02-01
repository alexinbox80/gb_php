<?php
session_start();
require_once "../config/variables.php";
require_once "../models/function.php";

$page = $_GET['page'];
$siteURL = $_SERVER['SCRIPT_NAME'];

$user = getSiteSession('user');

if (isset ($user['role']) && ($user['role'] == $userRights['admin'])) {
    $page = "admin";
}

switch ($page) {
    case 'admin':
        $header = "Location: ../admin/index.php";
        header($header);
        break;
    case 'registration':
        $page = "registration";
        $content = pageRender($pages, $page, $title, $siteURL);

        if (isset($user['userId'])) {

            $content = pageLogoutRender($content, 'LOGIN','LOGOUT', $pages, $page);

        } else  {

            $content = pageLogoutRender($content, 'LOGIN', 'LOGIN', $pages, $page);
        }

        break;
    case 'catalog':
        break;
    case'cart':
        $page = "cart";
        $content = pageRender($pages, $page, $title, $siteURL);

        if (isset($user['userId'])) {

            $content = pageLogoutRender($content, 'LOGIN','LOGOUT', $pages, $page);

        } else  {

            $content = pageLogoutRender($content, 'LOGIN', 'LOGIN', $pages, $page);
        }

        break;
    default:
        $page = "index";
        $content = pageRender($pages, $page, $title, $siteURL);

        $user = getSiteSession('user');

        if (isset($user['userId'])) {

            $content = pageLogoutRender($content, 'LOGIN','LOGOUT', $pages, $page);

        } else  {

            $content = pageLogoutRender($content, 'LOGIN', 'LOGIN', $pages, $page);
        }
}

