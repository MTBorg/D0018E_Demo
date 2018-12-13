<?php
    //Connect to the database
    include_once $_SERVER["DOCUMENT_ROOT"].'/php/db/dbConnect.php';
    $dbConn = dbConnect();

    $result = "";

    $categories = mysqli_query($dbConn, 'SELECT name FROM Categories;');

    if($categories){
        //Go through found categories and add them to dropdown menu
        while($cat = mysqli_fetch_object($categories)){
            $result = $result. '<a href="/php/pages/categoryPage.php?cat_name='.$cat->name.'">'.$cat->name.'<span> </span></a>';
        }
    }else{
        return 'Failed to retrieve categories: '.mysqli_error($dbConn);
    }

    return $result;
    mysqli_close($dbConn);
?>