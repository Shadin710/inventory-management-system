<?php
    session_start();
    if(empty($_SESSION['username']))
    {
        header("Location:index.php");
    }
    include_once 'connection/db_connection.php';
    if ($_SERVER['REQUEST_METHOD']=='POST')
    {
        $pNAME=$_POST['pName'];
        $category = $_POST['category'];
        $buyPrice = $_POST['buying_price'];
        $pDescription = $_POST['description'];
        $uStock= $_POST['underStock'];
        $lotto = $_POST['lotto'];
        $dop = $_POST['dop'];
        $expire = $_POST['Expire'];

        $cName = $_POST['cName'];
        $cEmail = $_POST['cEmail'];
        $sName = $_POST['sName'];
        $sAddress = $_POST['sAddress'];
        $sCategory=  $_POST['sCategory'];
        $sPhone = $_POST['sPhone'];
        $sMobile = $_POST['sMobile'];
        $sEmail = $_POST['sEmail'];
        $ratings = $_POST['ratings'];
        $city_name = $_POST['city'];
        $sql_stock = "INSERT INTO stock(Product_Name,category,pDescription,Under_Stock,buy_price,lotto,dop,expire,supplier_name) VALUES ('$pNAME','$category','$pDescription','$uStock','$buyPrice','$lotto','$dop','$expire','$sName')";
        
        if(!mysqli_query($conn,$sql_stock))
        {
            die("Failed to insert the data in stock table" . mysqli_error($conn));
        }
        else
        {
            $sql_supplier ="INSERT INTO supplier(cName,cEmail,sName,sAddress,sCategory,sEmail,sMobile,sPhone,ratings) VALUES ('$cName','$cEmail','$sName','$sAddress','$sCategory','$sEmail','$sMobile','$sPhone','$ratings')";

            if (!mysqli_query($conn,$sql_supplier)) 
            {
                die("Failed to insert data in supplier table" . mysqli_error($conn));
            }
            else
            {
                $sql_city = "INSERT INTO city(city_name,Product_Name,city_lotto,category) VALUES ('$city_name','$pNAME','$lotto','$category')";
                if (!mysqli_query($conn,$sql_city)) 
                {
                    die("Failed to insert into city" . mysqli_error($conn));
                }
                else
                {
                    header("Location:homepage.php");
                }
            }
        }
    }

?>