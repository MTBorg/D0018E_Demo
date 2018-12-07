<?php
    //TODO: This should echo and not return 

    //Connect to the database
    include_once $_SERVER["DOCUMENT_ROOT"].'/php/db/dbConnect.php';
    $dbConn = dbConnect();

    $result = "";

    $categories = mysqli_query($dbConn, 'SELECT cat_name FROM Categories;');
    if($categories){
        while($cat = mysqli_fetch_object($categories)){
            $result = $result. '<a href="#">'.$cat->cat_name.'</a>';
        }
    }else{
        return 'Failed to retrieve categories: '.mysqli_error($dbConn);
    }

    return $result;
    mysqli_close($dbConn);
?>