
<?php

    session_start();
    include_once 'connection/db_connection.php';
    $username = $_POST['username'];
    $pass = $_POST['pass'];

    if ($_SERVER['REQUEST_METHOD']=='POST')
    {

    
        $sql = "SELECT * FROM admin_info WHERE pass = '$pass' and username = '$username'";
        $result = mysqli_query($conn,$sql) or die("Failed to query the database" . mysqli_connect_error());

        $row = mysqli_fetch_assoc($result);
        $id = $row['id'];
        if($row['email']==$email && $row['pass'] == $pass)
        {
            $_SESSION['owner_id'] = $id;
            $_SESSION['username']=$username;
            //$_SESSION['main_pass'] = $pass;

            // sucess alert will be here
            header('Location:homepage.php');   

        }
        else
        {
            //failed alert will be here
            header('Location:index.php');
        }
    }
?>