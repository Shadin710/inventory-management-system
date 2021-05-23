<?php
    session_start();
    if (empty($_SESSION['username'])) 
    {
        header("Location:index.php");
    }
    
    include_once 'connection/db_connection.php';

    $sql_delete = "truncate articles";
    if (!mysqli_query($conn,$sql_delete)) 
    {
        die("Failed to delete the data from article table " .  mysqli_error($conn));
    }
    else
    {
        $sql_delete_room = "truncate room";

        if (!mysqli_query($conn,$sql_delete_room)) 
        {
            die("Failed to query " .  mysqli_error($conn));
        }
        else
        {
            header("Location:homepage.php");
        }
    }
?>