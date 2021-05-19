<?php

    session_start();

    include_once 'connection/db_connection.php';

    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['pass'];

        $create_admin_sql = "INSERT INTO admin_info(email,username,pass) VALUES ('$email','$username','$password')";

        if(!mysqli_query($conn,$create_admin_sql))
        {
            
            die("Failed to register admin" . mysqli_error($conn));
        }
        else
        {
            //sucessfully registered alert will be here
            header("Location:index.php");
        }
    }

?>