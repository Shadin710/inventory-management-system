
<?php
        session_start();
        if (empty($_SESSION['username'])) 
        {
            header("Location:index.php");
        }

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <legend>
    <br><br><br>
    <center>Are you sure you want to delete the data?</center>
    <center><a href="delete_today_product.php">Yes</a>
    <a href="entry_product.php">No</a></center>
    </legend>
</body>
</html>