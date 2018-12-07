<?php
    require_once 'dbConnect.php';
    require_once 'dbCreate.php';
    require_once 'dbInit.php';
    require_once 'dbAddEntries.php';

    # Create the database maindb
    dbCreate();
    
    # Create all the tables in the database
    dbInit();
    
    # Add default entries to the tables Products, Categories, OrderStatuses
    dbAddEntries();
?>
