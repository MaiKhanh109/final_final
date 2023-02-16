<?php
include '../../models/connect.php';

session_start();

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    $user_id = '';

    $authenticatedPages = [
        'checkout',
        'cart',
        'wishlist',
        // extra here
    ];
    $currentPageName = explode('.', substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], "/") + 1))[0];

    if (in_array($currentPageName, $authenticatedPages)) {
        header('location:user_login.php');
    }
};
?>