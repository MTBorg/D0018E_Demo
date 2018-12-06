<?php
include_once "dbConnect.php";
$dbconn = dbConnect();

$search = $_POST["search"];

$query = "SELECT * FROM Products WHERE name LIKE '%$search%';";

$searchResult = mysqli_query($dbconn, $query);

if($searchResult) {
    while($row = mysqli_fetch_array($searchResult)) {
        echo '<div id="'.$row['id'].'" class="item">';
        echo '<img src="'.$row['img_url'].'">';
        echo '<p id="namePos">'.$row['name'].'</p>';
        echo '<p id="pricePos">'.$row['price'].'$</p>';
        echo '<p id="stockPos"> <b>stock</b>: '.$row['stock'].'</p>';
    }
}

/*
while($row = mysqli_fetch_array($searchResult)) {
    echo $row['name'];
}
*/

?>