<?php
    function getCategories() {
        include_once $_SERVER['DOCUMENT_ROOT'].'/php/db/dbConnect.php';
        $dbconn = dbConnect();

        $queryCat = "SELECT name FROM Categories;";
        $cats = mysqli_query($dbconn, $queryCat);

        while ($row = mysqli_fetch_array($cats)) {
            echo '<option value='.$row['name'].'>'.$row['name'].'</option>';
        }

        mysqli_close($dbconn);
    }
?>