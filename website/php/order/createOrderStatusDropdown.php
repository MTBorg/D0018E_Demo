<?php
    $query = 'SELECT name FROM OrderStatuses;';
    $statuses = mysqli_query($dbConn, $query);

    if($statuses){
        while($row = mysqli_fetch_object($statuses)){
            echo '<option>'.$row->name.'</option>';
        }
    }
?>