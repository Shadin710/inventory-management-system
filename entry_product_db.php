<?php
    session_start();
    if(empty($_SESSION['username']))
    {
        header("Location:index.php");
    }
    include_once 'connection/db_connection.php'
    if ($_SERVER['REQUEST_METHOD']=='POST')
    {
        $pNAME=$_POST['pName'];
        $category = $_POST['category'];
        $buyPrice = $_POST['buying_price'];
        $sellPrice = $_POST['selling_price'];
        $pDescription = $_POST['description'];
        $uStock= $_POST['underStock'];
        $room_number =$_POST['room_number'];
        $lotto = $_POST['lotto'];
        $dop = $_POST['dop'];
        $dos = $_POST['dos'];
        $expire = $_POST['Expire'];

        $cName = $_POST['cName'];
        $cEmail = $_POST['cEmail'];
        $sName = $_POST['sName'];
        $sAddress = $_POST['sAddress'];
        $sCategory=  $_POST['sCategory'];
        $sPhone = $_POST['sPhone'];
        $sMobile = $_POST['sMobile'];
        $sEmail = $_POST['sEmail'];

        $sql_article = "INSERT INTO articles(Product_Name,category,pDescription,Under_Stock,room,buy_price,sell_price,lotto,dop,dos,expire,supplier_name) VALUES ('$pNAME','$category','$pDescription','$uStock','$room_number','$buyPrice','$sellPrice','$lotto','$dop','$dos','$expire','$sName')";

        if(!mysqli_query($conn,$sql_article))
        {
            die("Failed to insert the data in product table" . mysqli_error($conn));
        }
        else
        {
            $sql_supplier ="INSERT INTO supplier(cName,cEmail,sName,sAddress,sCategory,sEmail,sMobile,sPhone) VALUES ('$cName','$cEmail','$sName','$sAddress','$sCategory','$sEmail','$sMobile','$sPhone')";

            if (!mysqli_query($conn,$sql_supplier)) 
            {
                die("Failed to insert data in supplier table" . mysqli_error($conn));
            }
            else
            {
                header("Location:homepage.php");
            }
        }
    }

?>