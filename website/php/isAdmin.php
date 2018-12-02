<?php
    function isAdmin(){
        if(isset($_SESSION["user_id"])) {
            return (($_SESSION["user_role"]) == 1);
        }
    }
?>