<?php
session_start();
require_once "../config/variables.php";
require_once "../models/function.php";

$user = getSiteSession('user');

if (isset ($user['role']) && ($user['role'] == $userRights['admin'])) {

    $page = "admin";

    $content = pageRender($pages, $page, $title, $siteURL);

    if (isset($user['userId'])) {

        $content = pageLogoutRender($content, 'LOGIN','LOGOUT', $pages, $page);

    }

} else {
    echo "You do not have permission to access!<br>";
}
