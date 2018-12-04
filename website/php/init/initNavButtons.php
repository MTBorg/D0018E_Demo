<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/php/account/isLoggedIn.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/php/account/isAdmin.php';

    echo isLoggedIn(),isAdmin();
?>