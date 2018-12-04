<?php
    include_once 'isLoggedIn.php';
    include_once 'isAdmin.php';

    echo isLoggedIn(),isAdmin();
?>