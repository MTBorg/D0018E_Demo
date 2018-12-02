<?php
    function getCategories() {
        include_once 'dbConnect.php';
        $dbconn = dbConnect();

        $queryCat = "SELECT id, cat_name FROM Categories;";
        $cats = mysqli_query($dbconn, $queryCat);

        while ($row = mysqli_fetch_array($cats)) {
            echo '<option value="'.$row['id'].'">'.$row['cat_name'].'</option>';
        }
    }

?>