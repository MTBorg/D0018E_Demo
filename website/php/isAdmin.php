<?php
    function isAdmin(){
        if(isset($_SESSION["user_id"])) {
            return (($_SESSION["user_role"]) == 1);
        } elseif ((isset($_SESSION["errors"]))) {
            session_start();
            return (($_SESSION["user_role"]) == 1);
        }
    }
?>