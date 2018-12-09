<?php
    //TODO: This should echo and not return 

    //Connect to the database
    include_once $_SERVER["DOCUMENT_ROOT"].'/php/db/dbConnect.php';
    $dbConn = dbConnect();

    $result = "";

    $categories = mysqli_query($dbConn, 'SELECT * FROM Categories;');
    if($categories){
        while($cat = mysqli_fetch_object($categories)){
            $result = $result. '<a href="/php/pages/categoryPage.php?cat_id='.$cat->id.'">'.$cat->cat_name.'<span> </span></a>';
        }
    }else{
        return 'Failed to retrieve categories: '.mysqli_error($dbConn);
    }

    return $result;
    mysqli_close($dbConn);
?>